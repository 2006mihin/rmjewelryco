<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

@include('layouts.header')

<!-- Banner -->
<section class="relative bg-black text-white text-center">
    <img src="{{ asset('images/aboutbanner.png') }}" 
         alt="Jewelry"
         class="w-full object-cover h-60 sm:h-96 md:h-[600px]" />
</section>

<!-- Highlights -->
<div class="flex flex-col sm:flex-row justify-around my-8 text-center gap-6 sm:gap-0 px-4">
    <div>
        <img src="{{ asset('images/gemstone.png') }}" class="mx-auto w-10 h-10">
        <p class="font-bold mt-2 text-sm sm:text-base">100% NATURAL GEMSTONES</p>
    </div>
    <div>
        <img src="{{ asset('images/delivery.png') }}" class="mx-auto w-10 h-10">
        <p class="font-bold mt-2 text-sm sm:text-base">ISLAND-WIDE DELIVERY</p>
    </div>
    <div>
        <img src="{{ asset('images/verified.png') }}" class="mx-auto w-10 h-10">
        <p class="font-bold mt-2 text-sm sm:text-base">100% ORIGINAL SILVER</p>
    </div>
</div>

<!-- About Us -->
<div class="max-w-4xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-semibold mb-4">ABOUT US!</h2>
    <p class="text-lg leading-relaxed">
        At <strong>R&M JewelryCo</strong>, we believe that every piece of jewelry should tell a story — your story.
        Founded with a passion for elegance and individuality, we specialize in crafting high-quality,
        customized jewelry using genuine gemstones and fine silver.
        From timeless rings to unique pendants and bracelets, each piece is made
        with care, precision, and a touch of personal meaning.
        Whether you're celebrating a special moment or simply treating yourself, our goal is to create jewelry
        that reflects your style and significance.
        With a blend of craftsmanship and creativity,
        <strong>R&M JewelryCo</strong> is where beauty meets authenticity.
    </p>
</div>

<!-- Reviews Section with Dark Card -->
<div class="max-w-6xl mx-auto my-12 px-4">
    <div class="bg-gray-900 text-white rounded-3xl shadow-xl flex flex-col sm:flex-row overflow-hidden">

        <!-- Video Side -->
        <div class="sm:w-1/2 flex justify-center items-center bg-gray-900">
            <video src="{{ asset('images/gem.mp4') }}" autoplay loop muted playsinline
                   class="w-56 h-96 sm:w-[280px] sm:h-[400px] object-cover rounded-xl m-6">
            </video>
        </div>

        <!-- Form Side -->
        @auth
        <div class="sm:w-1/2 p-6 flex flex-col justify-center gap-4 bg-gray-900">
            <h3 class="text-2xl font-semibold mb-4">Leave a Review</h3>
            <form action="{{ route('reviews.store') }}" method="POST" class="flex flex-col gap-3">
                @csrf
                <label class="block text-sm font-medium">Rating</label>
                <select name="rating" class="w-full border rounded-lg p-2 bg-gray-800 text-white" required>
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>

                <label class="block text-sm font-medium">Comment</label>
                <textarea name="comment" class="w-full border rounded-lg p-2 bg-gray-800 text-white" rows="6" placeholder="Share your experience with our jewelry!" required></textarea>

                <button type="submit" class="bg-white text-black px-6 py-2 rounded-lg hover:bg-gray-200 mt-2 w-full">
                    Submit Review
                </button>
            </form>
        </div>
        @endauth

    </div>
</div>
<!-- Reviews List -->
<div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 gap-6">
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
                    <button onclick="openEditForm('{{ $review->_id }}', '{{ $review->rating }}', '{{ $review->comment }}')" 
                            class="text-blue-600 text-sm hover:underline">Edit</button>

                    <form action="{{ route('reviews.destroy', $review->_id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 text-sm hover:underline">Delete</button>
                    </form>
                </div>
            @endif
            @endauth
        </div>
    @endforeach
</div>


<!-- Hidden Edit Form -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-lg font-semibold mb-4">Edit Review</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <select name="rating" id="editRating" class="w-full border rounded-lg p-2 mb-4" required>
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>
            </select>
            <textarea name="comment" id="editComment" class="w-full border rounded-lg p-2 mb-4" rows="4" required></textarea>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditForm()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditForm(id, rating, comment) {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editRating').value = rating;
    document.getElementById('editComment').value = comment;
    document.getElementById('editForm').action = '/reviews/' + id;
}

function closeEditForm() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

</body>
</html>
