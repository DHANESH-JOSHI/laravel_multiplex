<?php

namespace App\Http\Controllers;

use App\Models\Seasons;
use App\Models\WebSeries;
use Illuminate\Http\Request;

class WebseriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webseries = WebSeries::all();
        return view('webseries.index', compact('webseries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('webseries.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image = $request->file('image_url');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('uploads/webseries', $imageName, 'public');

        $imageUrl = asset('storage/' . $imagePath); // Full URL path

        $webSeries = new WebSeries;
        $webSeries->title = $request->title;
        $webSeries->description = $request->description;
        $webSeries->image_url = $imageUrl;
        $webSeries->seasonsId = $request->seasonsId;
        $webSeries->save();

        return redirect()->route('webseries.index')->with('success', 'Web Series created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $webseries = WebSeries::findOrFail($id);
        return view('webseries.show', compact('webseries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $webseries = WebSeries::findOrFail($id);
        $seasons = Season::all();
        return view('webseries.edit', compact('webseries', 'seasons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $webseries = WebSeries::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'seasonsId' => 'required|array',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/webseries', $imageName, 'public');
            $webseries->image_url = asset('storage/' . $imagePath);
        }

        $webseries->title = $request->title;
        $webseries->description = $request->description;
        $webseries->seasonsId = $request->seasonsId;
        $webseries->save();

        return redirect()->route('webseries.index')->with('success', 'Web Series updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $webseries = WebSeries::findOrFail($id);
        $webseries->delete();
        return redirect()->route('webseries.index')->with('success', 'Web Series deleted successfully.');
    }
}
