<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Show about page with all reviews
    public function index()
    {
        $reviews = Review::orderBy('date', 'desc')->get();
        return view('about', compact('reviews'));
    }

    // Store new review
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date' => now()
        ]);

        return redirect()->back()->with('success', 'Review submitted!');
    }

    // Update review
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        // Only owner can update
        if ($review->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date' => now()
        ]);

        return redirect()->back()->with('success', 'Review updated!');
    }

    // Delete review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Only owner can delete
        if ($review->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();
        return redirect()->back()->with('success', 'Review deleted!');
    }
}
