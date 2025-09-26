<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

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

    <div class="flex justify-center my-8">
        <img src="{{ asset('images/a1.png') }}" alt="Gemstones" class="w-1/2">
    </div>

    <!-- ================== Reviews Section ================== -->
    <div class="bg-gray-100 py-12 px-6 sm:px-12 mt-12">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-semibold text-center mb-6">What Our Customers Say</h2>

            <!-- Review Form -->
            <form class="bg-white shadow-lg rounded-2xl p-6 mb-8">
                <h3 class="text-lg font-semibold mb-4">Leave a Review</h3>

                <!-- Rating -->
                <label class="block text-sm font-medium mb-1">Rating</label>
                <select class="w-full border rounded-lg p-2 mb-4">
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>

                <!-- Comment -->
                <label class="block text-sm font-medium mb-1">Comment</label>
                <textarea class="w-full border rounded-lg p-2 mb-4" rows="4" placeholder="Write your review..."></textarea>

                <!-- Submit Button -->
                <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800">
                    Submit Review
                </button>
            </form>

            <!-- Reviews List -->
            <div class="space-y-4">
                <!-- Example Review -->
                <div class="bg-white shadow rounded-xl p-4">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Jane Doe</span>
                        <span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="text-gray-700 mt-2">Absolutely loved my custom necklace. Great service!</p>
                    <p class="text-xs text-gray-500 mt-1">Posted on Sep 25, 2025</p>

                    <!-- Edit/Delete buttons (only visible to the user who posted) -->
                    <div class="flex gap-2 mt-2">
                        <button class="text-blue-600 text-sm hover:underline">Edit</button>
                        <button class="text-red-600 text-sm hover:underline">Delete</button>
                    </div>
                </div>

             
            </div>
        </div>
    </div>
 

</body>
</html>
