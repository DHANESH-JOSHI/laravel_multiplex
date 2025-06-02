<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Languages;
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
        $genres = Genre::all();
        $channels = Channel::all()->toArray();
        $languages = Languages::all()->toArray();
        $countries = Country::all()->toArray();
        return view('movie.create', compact('genres', 'channels', 'languages', 'countries'));
    }


    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        // Validate the incoming request
//        $validatedData = $request->validate([
//            'title' => 'required|string|max:255',
//            'description' => 'required|string',
//            'release_date' => 'required|date',
//            'genres' => 'required|array',
//            'language' => 'required|string|max:50',
//            'free_paid' => 'required|in:Free,Paid',
//            'price' => 'required_if:free_paid,Paid|numeric|min:0',
//            'youtube_trailer' => 'nullable|url',
//            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'publish' => 'required|boolean',
//            'download' => 'required|boolean',
//        ]);
//
//        // Handle file uploads
//        $thumbnailPath = $request->file('thumbnail')->store('public/movies/thumbnails');
//        $posterPath = $request->file('poster')->store('public/movies/posters');
//
//        // Create the movie record in the database
//        $movie = Movie::create([
//            'title' => $validatedData['title'],
//            'description' => $validatedData['description'],
//            'release_date' => $validatedData['release_date'],
//            'genres' => json_encode($validatedData['genres']), // Save genres as JSON
//            'language' => $validatedData['language'],
//            'free_paid' => $validatedData['free_paid'],
//            'price' => $validatedData['price'],
//            'youtube_trailer' => $validatedData['youtube_trailer'],
//            'thumbnail' => $thumbnailPath,
//            'poster' => $posterPath,
//            'publish' => $validatedData['publish'],
//            'download' => $validatedData['download'],
//        ]);
//
//        // Redirect with success message
//        return redirect()->route('movie.create')->with('success', 'Movie added successfully!');
//    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'channel_id' => 'required|string',
            'release' => 'nullable|date',
            'price' => 'nullable|numeric',
            'language.*' => 'string',
            'country.*' => 'string',
            'is_paid' => 'nullable|boolean',
            'publication' => 'nullable|boolean',
            'trailer' => 'nullable|file|mimetypes:video/mp4,video/quicktime,string',
            'thumbnail' => 'nullable|image',
            'poster' => 'nullable|image',
            'file' => 'required|file',
            'enable_download' => 'nullable|boolean',
        ]);

        $multipart = [
            ['name' => 'title', 'contents' => $request->title],
            ['name' => 'genre', 'contents' => $request->genre],
            ['name' => 'channel_id', 'contents' => $request->channel_id],
            ['name' => 'release', 'contents' => $request->release],
            ['name' => 'price', 'contents' => $request->price],
            ['name' => 'is_paid', 'contents' => $request->is_paid ? '1' : '0'],
            ['name' => 'publication', 'contents' => $request->publication ? '1' : '0'],
            ['name' => 'enable_download', 'contents' => $request->enable_download ? '1' : '0'],
        ];

        // language (array)
        if ($request->has('language')) {
            foreach ($request->language as $lang) {
                $multipart[] = [
                    'name' => 'language[]',
                    'contents' => $lang,
                ];
            }
        }

        // Countries (array)
        if ($request->has('country')) {
            foreach ($request->country as $country) {
                $multipart[] = [
                    'name' => 'country[]',
                    'contents' => $country,
                ];
            }
        }


        // Files to store locally and send as URL
        $urlFiles = ['trailer', 'thumbnail', 'poster'];
        foreach ($urlFiles as $fileField) {
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store("uploads/{$fileField}", 'public');
                $url = asset('storage/' . $path); // generates public URL like https://yourdomain.com/storage/uploads/thumbnail/abc.jpg
                $multipart[] = [
                    'name' => $fileField,
                    'contents' => $url,
                ];
            }
        }

        // Only 'file' is uploaded as a raw file
        if ($request->hasFile('file')) {
            $multipart[] = [
                'name' => 'file',
                'contents' => fopen($request->file('file')->getRealPath(), 'r'),
                'filename' => $request->file('file')->getClientOriginalName(),
            ];
        }

        try {
            $client = new \GuzzleHttp\Client();

            $response = $client->post('http://localhost:3000/nodeapi/rest-api/v130/movies', [
                'headers' => [
                    'api-key' => 'ec8590cb04e0e37c6706ab6c',
                ],
                'multipart' => $multipart,
            ]);
            dd($response);
            if ($response->getStatusCode() == 200) {
                return redirect()->back()->with('success', 'Movie created successfully via API!');
            } else {
                return redirect()->back()->with('error', 'API Error: ' . $response->getBody());
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(Movie $movieId)
    {
        $movie = Movie::findOrFail($movieId);
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
