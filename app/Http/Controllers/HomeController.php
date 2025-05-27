<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Genre;
use App\Models\HomeBanner;
use App\Models\Movie;
use App\Models\Subscriptions;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use MongoDB\BSON\UTCDateTime;
use MongoDB\BSON\ObjectID;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $user = auth()->user();

        switch ($user->role) {
            case 'admin':
                $user = User::count();
                $totalAmount = Subscriptions::sum('amount');
                $totalPaidAmount = Subscriptions::sum('paid_amount');
                $TotalCollectedPayments = $totalAmount + $totalPaidAmount;

                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->addMonth()->startOfMonth();

                $from = $start->timestamp;
                $to = $end->timestamp;

                $currentMonthAmount = Subscriptions::where('created_at', '>=', $from)->where('created_at', '<', $to)->sum('amount');

                $loginWebId = new ObjectID(
                    collect(session()->all())->filter(function ($value, $key) {
                        return str_starts_with($key, 'login_web_');
                    })
                ->first());
//                dd($loginWebId);
                $AdminchannelAmountTotal = Subscriptions::where('admin_channel_id', $loginWebId)->sum('amount');
//                dd($channelAmountTotal);
                $TotalMonthlyPayments = $currentMonthAmount ; // - $channelAmountTotal
//                $TotalMonthlyPayments = Subscriptions::all()->sum('amount');
                $channelCount = Channel::count();


                $movieCount = Movie::count();
                $genreCount =  Genre::count();
                $userCount = User::count();
                return view('dashboard',compact('user', 'TotalCollectedPayments', 'TotalMonthlyPayments', 'channelCount', 'movieCount', 'genreCount', 'userCount'));
            case 'channel':
                return view('channel.dashboard');
            case 'user':
            default:
                return view('FrontendPlayer.index');
        }
    //        return view('dashboard');
    }
}

