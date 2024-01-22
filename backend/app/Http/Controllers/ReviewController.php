<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews()
    {
        return  Review::all();
    }

    public function getReview($id){

        $review = Review::find($id);

        if (!$review){
            return response('Review not Found',404);
        }
        return $review;
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'rating' =>'required|numeric',
            'comment' => 'string',
            'user_id' => 'required|exists:App\Models\User,id',
            'product_id' => 'required|exists:App\Models\Product,id',

        ]);

        Review::create($request->all());

        return response('Review created successfully');
    }

    public function updateReview(Request $request, $id)
    {
        $request->validate([
            'rating' =>'sometimes|required|numeric',
            'comment' => 'sometimes|string',
            'user_id' => 'exists:App\Models\User,id',
            'product_id' => 'exists:App\Models\Product,id',
        ]);

        $review = Review::find($id);

        if (!$review){
            return response('Review not Found',404);
        }
        $review->update($request->all());
        return response('Review updated successfully');
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);

        if($review){
            $review->delete();
            return response('Review deleted successfully');
        }
        return response('Review not Found',404);
    }
}
