<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        return  ReviewResource::collection(Review::all());
    }

    public function show($id){

        return new ReviewResource(Review::findOrFail($id));
    }

    public function store(StoreOrderRequest $request)
    {
       $review = Review::create($request->validated());
        return new ReviewResource($review);
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->validated());
        return new ReviewResource($review);
    }

    public function delete(Review $review)
    {
        $review->delete();
        return ReviewResource::collection(Review::all());

    }
}
