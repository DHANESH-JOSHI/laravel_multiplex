<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get(); // fetch from MongoDB

        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slider_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image_link' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'action_type' => 'nullable|string',
            'action_btn_text' => 'nullable|string|max:255',
            'video_link' => 'nullable|url',
            'order' => 'required|integer',
            'publication' => 'required|boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('image_link')) {
            $file = $request->file('image_link');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('banners', $filename, 'public');
            $validated['image_link'] = '/storage/' . $path;
        }

        Slider::create($validated);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
