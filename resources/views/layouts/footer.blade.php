
<footer class="bg-gray-200 text-gray-700 py-8 mt-10">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-6 text-center md:text-left items-center md:items-start">

        <div>
            <img src="{{ asset('images/Logo.png') }}" class="h-32 mx-auto md:mx-0" />
        </div>

        <div>
            <h4 class="font-bold mb-2">CATALOG</h4>
            <ul class="catalog-list">
                <li><a href="{{ route('products.pendants') }}" class="catalog-link">Pendants</a></li>
                <li><a href="{{ route('products.earrings') }}" class="catalog-link">Earrings</a></li>
                <li><a href="{{ route('products.rings') }}" class="catalog-link">Rings</a></li>
                <li><a href="{{ route('products.bracelets') }}" class="catalog-link">Bracelets</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold mb-2">CONTACT</h4>
            <p>Address: Kandy Road, Kandy</p>
            <p>Phone: +94767481234</p>
            <p>Email: rmjewelleryco@gmail.com</p>
        </div>

        <div>
            <h4 class="font-bold mb-2">FOLLOW</h4>
            <div class="flex justify-center md:justify-start space-x-4">
                <a href="https://www.facebook.com/share/1AEi3ru2Cm/?mibextid=wwXIfr" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>

                <a href="https://www.instagram.com/rnm_jewelryco?igsh=MTB1cm5maHc0dzUwOQ%3D%3D&utm_source=qr" target="_blank" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>

    </div>
</footer>
