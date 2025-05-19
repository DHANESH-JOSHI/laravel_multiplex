<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies  = Movie::paginate(10);
    //  $movies = $allMovies->toArray();
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'genres' => 'required|array',
            'language' => 'required|string|max:50',
            'free_paid' => 'required|in:Free,Paid',
            'price' => 'required_if:free_paid,Paid|numeric|min:0',
            'youtube_trailer' => 'nullable|url',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish' => 'required|boolean',
            'download' => 'required|boolean',
        ]);

        // Handle file uploads
        $thumbnailPath = $request->file('thumbnail')->store('public/movies/thumbnails');
        $posterPath = $request->file('poster')->store('public/movies/posters');

        // Create the movie record in the database
        $movie = Movie::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'release_date' => $validatedData['release_date'],
            'genres' => json_encode($validatedData['genres']), // Save genres as JSON
            'language' => $validatedData['language'],
            'free_paid' => $validatedData['free_paid'],
            'price' => $validatedData['price'],
            'youtube_trailer' => $validatedData['youtube_trailer'],
            'thumbnail' => $thumbnailPath,
            'poster' => $posterPath,
            'publish' => $validatedData['publish'],
            'download' => $validatedData['download'],
        ]);

        // Redirect with success message
        return redirect()->route('movie.create')->with('success', 'Movie added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));

//        dd("hello");
//        return view('movie.show', compact('movie'), [
//            'movies' => Movie::where('_id', )->get()
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
