<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tc()
    {
        return view('terms');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function policy()
    {
        return view('privacy');
    }

    /**
     * Display the specified resource.
     */
    public function help()
    {
        return view('help');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Update the specified resource in storage.
     */
    public function delUserData()
    {
        return view('remove_data');
    }

    /**
     * Remove the specified resource from storage.
    */

}
