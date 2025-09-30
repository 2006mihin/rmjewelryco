<header class="bg-gray-200 text-gray-800 shadow sticky top-0 z-50">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
      integrity="sha512-pap9c3n6EhxyU3fB/..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div class="container mx-auto flex justify-between items-center px-4 py-4">
    <!-- Logo -->
    <a href="{{ url('/home') }}">
      <img src="{{ asset('images/NLogo.png') }}" alt="Logo" class="h-10" />
    </a>

    <!-- Hamburger for mobile -->
    <button id="menu-toggle" class="md:hidden text-2xl focus:outline-none">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center space-x-6">
      <a href="{{ url('/home') }}" class="hover:text-gray-600">HOME</a>
      <a href="{{ url('/about') }}" class="hover:text-gray-600">ABOUT</a>
      <div class="relative group">
        <button class="hover:text-gray-600 flex items-center">JEWELRIES <i class="fa fa-caret-down ml-1"></i></button>
        <div class="absolute hidden group-hover:block bg-white shadow-lg mt-1 rounded w-40 z-10">
          <a href="{{ route('products.rings') }}" class="block px-4 py-2 hover:bg-gray-200">Rings</a>
          <a href="{{ route('products.pendants') }}" class="block px-4 py-2 hover:bg-gray-200">Pendants</a>
          <a href="{{ route('products.earrings') }}" class="block px-4 py-2 hover:bg-gray-200">Earrings</a>
          <a href="{{ route('products.bracelets') }}" class="block px-4 py-2 hover:bg-gray-200">Bracelets</a>
        </div>
      </div>
      <a href="{{ url('/cart') }}" class="hover:text-gray-600">CART</a>
    </nav>

    <!-- Auth Links -->
    <div class="hidden md:flex items-center space-x-4">
      @auth
        <a href="{{ route('profile.show') }}" class="hover:text-gray-600 flex items-center space-x-1">
          <i class="fa fa-user text-xl"></i>
          <span>Profile</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="hover:text-red-600">Logout</button>
        </form>
      @else
        <a href="{{ route('user.login') }}" class="block py-2 hover:text-gray-600">Sign In</a>
        <a href="{{ route('user.register') }}" class="block py-2 hover:text-gray-600">Sign Up</a>
      @endauth
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 bg-gray-100">
    <a href="{{ url('/home') }}" class="block py-2 hover:text-gray-600">HOME</a>
    <a href="{{ url('/about') }}" class="block py-2 hover:text-gray-600">ABOUT</a>

    <details class="bg-gray-100">
      <summary class="py-2 cursor-pointer hover:text-gray-600">JEWELRIES</summary>
      <a href="{{ route('products.rings') }}" class="block py-1 hover:text-gray-600">Rings</a>
      <a href="{{ route('products.pendants') }}" class="block py-1 hover:text-gray-600">Pendants</a>
      <a href="{{ route('products.earrings') }}" class="block py-1 hover:text-gray-600">Earrings</a>
      <a href="{{ route('products.bracelets') }}" class="block py-1 hover:text-gray-600">Bracelets</a>
    </details>

    <a href="{{ url('/cart') }}" class="block py-2 hover:text-gray-600">CART</a>

    @auth
      <a href="{{ route('profile.show') }}" class="block py-2 hover:text-gray-600 flex items-center space-x-1">
        <i class="fa fa-user text-xl"></i>
        <span>Profile</span>
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left py-2 hover:text-red-600">Logout</button>
      </form>
    @else
      <a href="{{ route('user.login') }}" class="hover:text-gray-600">Sign In</a>
      <a href="{{ route('user.register') }}" class="hover:text-gray-600">Sign Up</a>
    @endauth
  </div>
</header>

<script>
  document.getElementById('menu-toggle')?.addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
