<?php

namespace App\Http\Controllers;

use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // 1. Get all non-admin users
            $users = User::where('role', '!=', 'admin')
                ->get(['_id', 'name', 'email', 'created_at']);

            // 2. Extract and convert user IDs to ObjectId
            $userIds = $users->pluck('_id')->map(function ($id) {
                return new ObjectId($id);
            })->toArray();

            // 3. Get all subscriptions for these users
//            $subscriptions = Subscriptions::whereIn('user_id', $userIds)->get()->groupBy(function ($item) {
//                return (string) $item->user_id; // Group by string version of ObjectId
//            });
//
//            // 4. Attach subscriptions to each user
//            $users->transform(function ($user) use ($subscriptions) {
//                $user->subscriptions = $subscriptions;
//                return $user;
//            });
//            dd($users->first(), $subscriptions->first());
//            dd($users);
            // 5. Return response for DataTable
            return DataTables::of($users)
                ->addIndexColumn()
//                ->addColumn('subscription_count', function ($user) {
//                    return $user->subscriptions->count();
//                })
//                ->addColumn('subscription_names', function ($user) {
//                    return $user->subscriptions->pluck('plan_name')->implode(', ');
//                })
                ->rawColumns(['subscription_names'])
                ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
