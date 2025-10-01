<div class="space-y-6">

    <!--Review Form-->
    @auth
    <div class="bg-gray-900 text-white p-6 rounded-3xl flex flex-col sm:flex-row gap-6">

       
        <div class="sm:w-1/2 flex justify-center items-center">
            <video src="{{ asset('images/gem.mp4') }}" autoplay loop muted playsinline
                   class="w-56 h-80 sm:w-64 sm:h-96 object-cover rounded-xl">
            </video>
        </div>

        <form wire:submit.prevent="submitReview" class="flex flex-col gap-3 sm:w-1/2">
            <h3 class="text-2xl font-semibold mb-2">
                {{ $editId ? 'Edit Your Review' : 'Leave a Review' }}
            </h3>

            <label class="text-sm font-medium">Rating</label>
            <select wire:model="rating" class="w-full border rounded-lg p-2 bg-gray-800 text-white">
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>
            </select>

            <label class="text-sm font-medium">Comment</label>
            <textarea wire:model="comment" rows="6" 
                      class="w-full border rounded-lg p-2 bg-gray-800 text-white" 
                      placeholder="Share your experience with our jewelry!"></textarea>

            @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button type="submit" class="bg-white text-black px-6 py-2 rounded-lg hover:bg-gray-200 mt-2 w-full">
                {{ $editId ? 'Update Review' : 'Submit Review' }}
            </button>
        </form>

    </div>
    @endauth

    <!-- Reviews List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
        @foreach($reviews as $review)
            <div class="bg-white shadow rounded-xl p-4">
                <div class="flex justify-between items-center">
                    <span class="font-semibold">{{ $review->name }}</span>
                    <span class="text-yellow-500">
                        @for ($i = 0; $i < $review->rating; $i++) ⭐ @endfor
                    </span>
                </div>
                <p class="text-gray-700 mt-2">{{ $review->comment }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($review->date)->format('M d, Y') }}</p>

                @auth
                @if(Auth::id() == $review->user_id)
                    <div class="flex gap-2 mt-2">
                        <button wire:click="editReview('{{ $review->_id }}')" 
                                class="text-blue-600 text-sm hover:underline">Edit</button>

                        <button wire:click="deleteReview('{{ $review->_id }}')" 
                                class="text-red-600 text-sm hover:underline"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                            Delete
                        </button>
                    </div>
                @endif
                @endauth
            </div>
        @endforeach
    </div>

</div>
