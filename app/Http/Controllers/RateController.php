<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Store;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $rater = $request->ip();
        $rate = $request->input('rate');
        $storeId = $request->input('id');

        $oldRating = Rate::where('rater', $rater)->where('store_id', $storeId)->first();
        if ($oldRating) {
            $oldRating->rating = $rate;
            $isSaved = $oldRating->save();
            session()->flash('messageRateingUpdate');
            if ($isSaved) {
                $store = Store::where('id', $storeId)->first();
                $new_avg = Rate::where('store_id', $storeId)->avg('rating');
                if ($new_avg > $store->avarge_rating) {
                    $store->status += 1;
                } elseif ($new_avg < $store->avarge_rating) {
                    $store->status -= 1;
                }
                $store->avarge_rating = $new_avg;

                $store->save();
            }
        } else {
            $rate1 = new Rate();
            $rate1->rater = $rater;
            $rate1->rating = $rate;
            $rate1->store_id = $storeId;
            $isSaved = $rate1->save();
            session()->flash('messageRateing');
            if ($isSaved) {
                $store1 = Store::where('id', $storeId)->first();
                $new_avg = Rate::where('store_id', $storeId)->avg('rating');
                if ($new_avg > $store1->avarge_rating) {
                    $store1->status += 1;
                } elseif ($new_avg < $store1->avarge_rating) {
                    $store1->status -= 1;
                }

                $store1->avarge_rating = $new_avg;
                $store1->ratings_number += 1;
                $store1->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
