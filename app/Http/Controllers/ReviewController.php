<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function addReview(Request $request){

        $review = $request->review;

        $create = Review::create([
            'user_id' => auth()->user()->id,
            'review' => $review,
        ]);

        if(!$review){
            return response()->json([
                'error' => 1,
                'message' => 'حدث خطأ , حاول لاحقا',
            ]);
        }

        return response()->json([
            'error' => 0,
            'message' => 'شكرا لك على تقييمك',
        ]);  
    }
}
