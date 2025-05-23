<?php

use App\Http\Controllers\FrontendPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MovieController;
use \App\Http\Controllers\WebseriesController;
use \App\Http\Controllers\PlanController;
use \App\Http\Controllers\ChannelController;
use \App\Http\Controllers\GenreController;
use \App\Http\Controllers\BannerController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\TransactionLogController;
use \App\Http\Controllers\NotificationController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FrontMovieController;




//LoginAuth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('user-login', [AuthController::class, 'showUserLoginForm'])->name('user-login');
Route::get('verify', [AuthController::class, 'showOtpForm'])->name('verify');
Route::post('user-send-otp', [AuthController::class, 'sendOtpToUser'])->name('user-send-otp');
Route::post('user-verify-otp', [AuthController::class, 'verifyOtp'])->name('user-verify-otp');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


//Frontend Page Routes
Route::get('about', [FrontendPageController::class, 'about'])->name('about');
Route::get('tc', [FrontendPageController::class, 'tc'])->name('tc');
Route::get('policy', [FrontendPageController::class, 'policy'])->name('policy');
Route::get('help', [FrontendPageController::class, 'help'])->name('help');
Route::get('contact', [FrontendPageController::class, 'contact'])->name('contact');
Route::get('user-data', [FrontendPageController::class, 'delUserData'])->name('user-data');

//Route::get('user-login', [FrontendPageController::class, 'userLogin'])->name('user-login');
//Route::get('channel-login', [FrontendPageController::class, 'channelLogin'])->name('channel-login');
//Route::get('register', [FrontendPageController::class, 'RegisterUser'])->name('register');
//Route::get('userLogin', [FrontendPageController::class, 'about'])->name('about');

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/front-movies', [FrontMovieController::class, 'index'])->name('frontmovies.index');
Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    //movies
    Route::resource('movies', MovieController::class)->only([
        'index', 'store', 'create', 'edit', 'update', 'destroy', 'show'
    ])->parameters(['movies' => 'movie:slug']);;

    //webSeries
    Route::resource('webseries', WebseriesController::class);

    //package Plan
    Route::resource('plan', PlanController::class);

    //package Plan
    Route::resource('channels', ChannelController::class);

    //Genre
    Route::resource('genre', GenreController::class);

    //Banner
    Route::resource('banner', BannerController::class);

    //users
    Route::resource('users', UserController::class);

    //Transaction Logs
    Route::resource('tlogs', TransactionLogController::class);

    //Notifications
    Route::resource('notify', NotificationController::class);
});











































//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/', function () {
////    return view('welcome');
//    try {
//        $users = \App\Models\User::all(); // Fetch all users
//        dd($users);
//        return response()->json([
//            'status' => 'success',
//            'data' => $users
//        ]);
//    } catch (\Exception $e) {
//        return response()->json([
//            'status' => 'error',
//            'message' => 'DB Connection Failed',
//            'error' => $e->getMessage()
//        ]);
//    }
//});

//Route::get('/', function () {
//    try {
//        $model = new \App\Models\User();
//
//        Log::info('Collection being used: ' . $model->getTable());
//        dd((new \App\Models\User()));
//
//        // Insert test data
////        \App\Models\MongoUser::create([
////            'name' => 'Dhanesh Joshi',
////            'email' => 'dhanesh@example.com',
////        ]);
//        return 'Check logs!';
//        // Fetch all data
////        $data = \App\Models\MongoUser::all();
//
////        return response()->json([
////            'status' => 'MongoDB is connected 🎉',
////            'data' => $data
////        ]);
//
//    } catch (\Exception $e) {
//        return response()->json([
//            'status' => 'MongoDB connection failed ❌',
//            'error' => $e->getMessage()
//        ]);
//    }
//});




