<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Callback;
use App\Models\Feedback;
use App\Models\Review;

class AdminController extends Controller
{
    public function getDashboard() {
        $newCallbacks = Callback::where('attention','1')->orderBy('created_at','desc')->get();
        $newFeedbacks = Feedback::where('attention','1')->orderBy('created_at','desc')->get();
        $newReviews = Review::where('public','0')->orderBy('created_at','desc')->get();
        return view('admin.dashboard',[
            'newCallbacks' => $newCallbacks,
            'newFeedbacks' => $newFeedbacks,
            'newReviews' => $newReviews,
        ]);
    }
}
