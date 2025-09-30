<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class Reviews extends Component
{
    public $rating = 5;
    public $comment = '';
    public $editId = null;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ];

    protected $listeners = ['reviewAdded' => '$refresh'];

    // Add or update review
    public function submitReview()
    {
        $this->validate();

        if ($this->editId) {
            $review = Review::find($this->editId);

            if ($review && $review->user_id == Auth::id()) {
                $review->update([
                    'rating' => $this->rating,
                    'comment' => $this->comment,
                    'date' => now(),
                ]);
            }

            $this->editId = null;
        } else {
            Review::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'rating' => $this->rating,
                'comment' => $this->comment,
                'date' => now(),
            ]);
        }

        $this->reset(['rating', 'comment']);
    }

    // Load review into edit form
    public function editReview($id)
    {
        $review = Review::find($id);

        if ($review && $review->user_id == Auth::id()) {
            $this->editId = $id;
            $this->rating = $review->rating;
            $this->comment = $review->comment;
        }
    }

    // Delete review
    public function deleteReview($id)
    {
        $review = Review::find($id);

        if ($review && $review->user_id == Auth::id()) {
            $review->delete();
        }
    }

    public function render()
    {
        $reviews = Review::orderBy('date', 'desc')->get();
        return view('livewire.reviews', compact('reviews'));
    }
}
