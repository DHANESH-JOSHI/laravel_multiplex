<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showUserLoginForm()
    {
        return view('auth.UserLogin');
    }

    public function sendOtpToUser(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20'
        ]);

        // Step 1: Send user data to API to request OTP
        $response = Http::withHeaders([
            'api-key' => env('NODE_API_KEY'),
            'Accept' => 'application/json',
        ])->post('http://localhost:3000/nodeapi/rest-api/v130/reguser', [
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Step 2: Check if OTP sent
        if ($response->successful() && isset($response['user']['otp'])) {
            $otp = $response['user']['otp'];
            $user_id = $response['user']['user_id'] ?? null;

            // Optional: Store data in session (recommended for verification step)
            session([
                'user_id' => $user_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'otp' => $otp,
            ]);

            // Redirect to OTP page
            return redirect()->route('verify')->with('success', 'OTP sent successfully!');
        }

        return back()->with('error', 'Unable to send OTP. Please try again.');
    }


    public function showOtpForm(){
        return view('auth.otp');
    }
    public function verifyOtp(Request $request)
    {
        // Step 1: Merge OTP boxes into one string
        $otp = is_array($request->otp) ? implode('', $request->otp) : $request->otp;

        // Step 2: Send OTP + phone/email to API
        $response = Http::withHeaders([
            'api-key' => env('NODE_API_KEY'),
            'Accept' => 'application/json',
        ])->post('http://localhost:3000/nodeapi/rest-api/v130/reguser/verify-otp', [
            'otp' => $otp,
            'user_id' => $request->user_id,
        ]);


        // Step 3: Check response
        if ($response->successful() && isset($response['userId'])) {
            $user = $response['userId'];

            Auth::loginUsingId($user);
            return redirect()->intended('/front-movies');
//            return view('FrontendPlayer.index', compact('user'));
        }else{
            return back()->with('error', $response['message']);
        }

        return back()->with('error', 'OTP verification failed.');
    }



    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !md5($request->password, $user->password)) {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }

        if ($user->role === 'admin') {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }

        if ($user->role === 'channel') {
            switch ($user->status) {
                case 'approve':
                    Auth::login($user);
                    return redirect()->intended('/dashboard');

                case 'pending':
                    return redirect()->back()->withErrors(['email' => 'Your account is pending approval. Please wait for admin confirmation.']);

                case 'rejected':
                    return redirect()->back()->withErrors(['email' => 'Your account has been rejected. Contact support for more information.']);

                case 'block':
                    return redirect()->back()->withErrors(['email' => 'Your account has been blocked. Please contact admin.']);

                default:
                    return redirect()->back()->withErrors(['email' => 'Unknown account status.']);
            }
        }
        return redirect()->back()->withErrors(['email' => 'You are  not authorized']);
    }


    public function UserLogin(Request $request)
    {
        $credentials = $request->only('phone');
        //        dd(   $credentials);
        // Check if email exists and compare password using MD5
        $user = User::where('phone', $request->phone)->first();
        //        dd($user->toArray());
        //        $user = User::all();
        //        dd($user->toArray());

        if ($user && $request->otp == $user->otp) {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle Registration Request
    //    public function register(Request $request)
    //    {
    ////        dd($request->toArray());
    //        $this->validateRegistration($request);
    //
    //        $user = User::create([
    //            'email' => $request->email,
    //            'password' => md5($request->password), // Use MD5 hashing for password
    //        ]);
    //        Auth::login($user);
    //
    //        return redirect('/dashboard');
    //    }

    public function register(Request $request)
    {
        // Validate input fields including the file
        $request->validate([
            'channel_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'organization_address' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // max 5MB, allowed file types
        ]);

        $isChannel = $request->filled('channel_name');
        $role = $isChannel ? 'channel' : 'user';

        // Handle file upload
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('channel_documents', 'public');
        }

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->mobile,
            'password' => md5($request->password),
            'role' => $role,
            'join_date' => now(),
            'status' => $isChannel ? 'pending' : 'approve',
        ]);

        // If channel registration, create Channel record with document path
        if ($isChannel) {
            Channel::create([
                'channel_name' => $request->channel_name,
                'user_id' => (string) $user->_id, // Assuming MongoDB _id, cast to string
                'mobile_number' => $request->mobile,
                'address' => $request->address,
                'organization_name' => $request->organization_name,
                'organization_address' => $request->organization_address,
                'status' => 'pending',
                'img' => 'https://multiplexplay.com/office/uploads/cuser_image/11.jpg', // default image
                'document_path' => $documentPath,  // Save file path here
                'join_date' => now(),
                'last_login' => now(),
            ]);
        }

        // Login the user after registration
        Auth::login($user);

        return redirect('/dashboard');
    }



    // Handle Logout Request
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Custom Validation for Registration
    //    private function validateRegistration(Request $request)
    //    {
    //        $validator = Validator::make($request->all(), [
    //            'email' => 'required|email|unique:users,email',
    //            'password' => 'required|min:6|confirmed',
    //        ]);
    //
    //        $validator->validate();
    //    }

}
