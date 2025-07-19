<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title', 'Online Shopping')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('layouts.alert')
    @php
        $categories = \App\Models\Category::orderBy('order', 'asc')->get();
    @endphp

    <!-- Announcement Bar -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-center text-sm font-medium py-2">
                <i class="ri-gift-line mr-2"></i> Free delivery on orders above $100!
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Top Bar -->
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2">
                    <i class="ri-shopping-bag-line text-2xl text-blue-600"></i>
                    <span class="font-bold text-xl">Vybe<span class="text-blue-600">Cart</span></span>
                </a>

                <!-- Search Bar -->
                <form action="{{route('search')}}" method="GET" class="hidden md:flex flex-1 max-w-lg mx-8">
                    <div class="relative w-full">
                        <input type="search" name="search" value="{{request('search')}}" placeholder="Search for products..."
                            class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-200 focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all"
                            minlength="2" required>
                        <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    </div>
                    <button type="submit"
                            class="ml-2 px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors flex items-center">
                        Search
                    </button>
                </form>

                <!-- User Actions -->
                <div class="flex items-center space-x-6">
                    @auth
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition-colors">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=3b82f6&color=fff"
                                     alt="Profile"
                                     class="w-8 h-8 rounded-full">
                                <span class="hidden sm:block font-medium">{{ auth()->user()->name }}</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 hidden group-hover:block border border-gray-100">
                                <a href="{{ route('myorders') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                    <i class="ri-shopping-bag-line w-5 h-5 mr-2"></i> My Orders
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                        <i class="ri-logout-box-line w-5 h-5 mr-2"></i> Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-blue-600 transition-colors flex items-center">
                            <i class="ri-user-line mr-1"></i> Sign In
                        </a>
                    @endauth

                    <!-- Cart Button -->
                    <a href="{{ route('mycart') }}" class="relative group">
                        <i class="ri-shopping-cart-2-line text-2xl text-gray-700 group-hover:text-blue-600 transition-colors"></i>
                        <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                            0
                        </span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-700 hover:text-blue-600 transition-colors">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                </div>
            </div>

            <!-- Category Navigation -->
            <nav class="hidden md:block border-t border-gray-100">
                <div class="flex space-x-8 py-3">
                    <a href="/" class="text-gray-500 hover:text-blue-600 transition-colors">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('categoryproducts', $category->id) }}"
                           class="text-gray-500 hover:text-blue-600 transition-colors">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="bg-gray-900 text-gray-400">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Section -->
                <div>
                    <div class="flex items-center space-x-2 text-white mb-4">
                        <i class="ri-shopping-bag-line text-2xl"></i>
                        <span class="font-bold text-xl">VybeCart</span>
                    </div>
                    <p class="text-sm">Your trusted shopping destination for quality products and amazing deals.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQs</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <i class="ri-map-pin-line mr-2"></i> Kathmandu, Nepal
                        </li>
                        <li class="flex items-center">
                            <i class="ri-phone-line mr-2"></i> +977 987-654-3210
                        </li>
                        <li class="flex items-center">
                            <i class="ri-mail-line mr-2"></i> support@vybecart.com
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Newsletter</h3>
                    <form class="space-y-2">
                        <input type="email" placeholder="Enter your email"
                               class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} VybeCart. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
