<?php

namespace App\Http\Controllers;

use App\Models\Subscriptions;
use Illuminate\Http\Request;

class TransactionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscriptions::all();

        $successTransactions = [];
        $failedTransactions = [];

        foreach ($subscriptions as $subscription) {
            $data = $subscription->toArray();

            if (!empty($data['payment_info'])) {
                foreach ($data['payment_info'] as $infoJson) {
                    // 🔐 Fix: decode only if it's a string
                    if (is_string($infoJson)) {
                        $info = json_decode($infoJson, true);
                    } elseif (is_array($infoJson)) {
                        $info = $infoJson;
                    } else {
                        continue; // skip invalid formats
                    }

                    if ($info && isset($info['status'])) {
                        // Add additional context to each transaction
                        $info['subscription_id'] = (string) $data['_id'];
                        $info['user_id'] = $data['user_id'];
                        $info['plan_id'] = $data['plan_id'];

                        if ($info['status'] === 'paid') {
                            $successTransactions[] = $info;
                        } else {
                            $failedTransactions[] = $info;
                        }
                    }
                }
            }
        }

        dd($successTransactions);
        return view('transaction_log.index', [
            'successTransactions' => $successTransactions,
            'failedTransactions' => $failedTransactions,
        ]);

//        return view('transaction_log.index');
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
