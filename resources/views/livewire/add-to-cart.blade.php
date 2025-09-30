<div>
    <button wire:click="addToCart"
            class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Add to Cart
    </button>

    @if(session()->has('success'))
        <div class="bg-green-200 p-2 mt-2 rounded text-sm text-center">
            {{ session('success') }}
        </div>
    @endif
</div>
