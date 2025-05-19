<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontMovieController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id ?? $request->input('user_id');
        //  dd($userId);
        if (!$userId) {
            return redirect()->back()->with('error', 'User ID is required for subscription check.');
        }
//        dd($userId);
        $subCheckUrl = "http://localhost:3000/nodeapi/rest-api/v130/payment/check_user_subscription?user_id={$userId}";

        $subResponse = Http::withHeaders([
            'api-key' => env('NODE_API_KEY'),
            'Accept' => 'application/json',
        ])->get($subCheckUrl);

        //dd($subResponse->json());

        if (!$subResponse->successful()) {
            return redirect()->back()->with('error', 'Failed to verify subscription status.');
        }

        $subData = $subResponse->json();

        // Check subscription's is_active flag inside 'data'
        if (empty($subData['data']) || empty($subData['data']['is_active']) || !$subData['data']['is_active']) {
            return redirect()->back()->with('error', 'Subscription inactive. Please subscribe to access movies.');
        }

        $page = $request->input('page', 1);

        $apiUrl = "http://localhost:3000/nodeapi/rest-api/v130/movies?page={$page}";
        $response = Http::withHeaders([
            'api-key' => env('NODE_API_KEY'),
            'Accept' => 'application/json',
        ])->get($apiUrl);

        if ($response->successful()) {
            $responseData = $response->json();

            $moviesData = $responseData['data'] ?? [];

            $movies = collect($moviesData)->where('is_tvseries', 0)->values();
            $webseries = collect($moviesData)->where('is_tvseries', 1)->values();

            $pagination = [
                'totalCount' => $responseData['totalCount'] ?? 0,
                'pageCount' => $responseData['pageCount'] ?? 0,
                'currentPage' => $responseData['currentPage'] ?? $page,
                'hasNextPage' => $responseData['hasNextPage'] ?? false,
                'hasPreviousPage' => $responseData['hasPreviousPage'] ?? false,
            ];
            return view('FrontendPlayer.index', compact('movies', 'webseries', 'pagination'));
        }
        return redirect()->back()->with('error', 'Failed to fetch movies data.');
    }



}
