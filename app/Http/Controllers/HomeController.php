<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;

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
                $TotalCollectedPayments = Subscriptions::all()->sum('amount');
                $TotalMonthlyPayments = Subscriptions::all()->sum('amount');
                $channelCount = Channel::all()->count();
                $movieCount = Movie::all()->count();
                $genreCount =  Genre::all()->count();
                $userCount = User::all()->count();
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

