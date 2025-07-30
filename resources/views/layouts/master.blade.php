<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title', 'Online Shopping')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'slide-in-right': 'slideInRight 0.5s ease-out',
                        'slide-in-left': 'slideInLeft 0.5s ease-out',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'scale-in': 'scaleIn 0.3s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' }
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        slideInLeft: {
                            '0%': { transform: 'translateX(-100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        fadeInUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.9)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        
        /* Modern Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Enhanced Buttons */
        .btn-primary {
            @apply px-8 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-full hover:from-primary-600 hover:to-primary-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 hover:scale-105;
        }
        
        .btn-secondary {
            @apply px-8 py-3 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-all duration-300 font-semibold shadow-md hover:shadow-lg border border-gray-200 hover:border-gray-300 transform hover:-translate-y-0.5;
        }
        
        .btn-ghost {
            @apply px-6 py-2.5 text-primary-600 rounded-full hover:bg-primary-50 transition-all duration-300 font-medium border border-primary-200 hover:border-primary-300;
        }
        
        /* Enhanced Cards */
        .card {
            @apply bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-1;
        }
        
        .card-hover {
            @apply transition-all duration-300 transform hover:scale-105 hover:rotate-1;
        }
        
        /* Text Gradients */
        .text-gradient {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 50%, #0f766e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Modern Hover Effects */
        .hover-lift {
            @apply transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl;
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(20, 184, 166, 0.3);
        }
        
        /* Loading Animations */
        .loading-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .skeleton {
            @apply animate-pulse bg-gray-200 rounded;
        }
        
        /* Interactive Elements */
        .interactive {
            @apply cursor-pointer transition-all duration-200 hover:scale-110 active:scale-95;
        }
        
        /* Modern Inputs */
        .input-modern {
            @apply w-full px-4 py-3 bg-white border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-transparent transition-all duration-200 placeholder-gray-400;
        }
        
        .input-modern:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(20, 184, 166, 0.1);
        }
        
        /* Scroll Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        .scale-in {
            animation: scaleIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #0d9488, #0f766e);
        }
        
        /* Custom Selection */
        ::selection {
            background-color: rgba(20, 184, 166, 0.2);
            color: #0f766e;
        }
        
        /* Floating Action Button */
        .fab {
            @apply fixed bottom-6 right-6 w-14 h-14 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center text-xl z-50 hover:scale-110;
        }
        
        /* Loading Spinner */
        .spinner {
            border: 3px solid rgba(20, 184, 166, 0.1);
            border-radius: 50%;
            border-top: 3px solid #14b8a6;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Notification Badge */
        .badge {
            @apply absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium;
        }
        
        /* Progress Bar */
        .progress-bar {
            @apply h-2 bg-gray-200 rounded-full overflow-hidden;
        }
        
        .progress-fill {
            @apply h-full bg-gradient-to-r from-primary-500 to-primary-600 transition-all duration-500 ease-out;
        }
        
        /* Modern Toggle */
        .toggle-checkbox:checked {
            @apply bg-primary-500 border-primary-500;
        }
        
        .toggle-checkbox:checked + .toggle-label {
            @apply text-primary-600;
        }
        
        /* Tooltip */
        .tooltip {
            @apply absolute bottom-full left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs rounded-lg px-3 py-2 opacity-0 pointer-events-none transition-opacity duration-200;
        }
        
        .tooltip-trigger:hover .tooltip {
            @apply opacity-100;
        }
        
        /* Modern Card Stack Effect */
        .card-stack {
            position: relative;
            transform-style: preserve-3d;
        }
        
        .card-stack::before,
        .card-stack::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            border-radius: 1.5rem;
            border: 1px solid #e5e7eb;
            z-index: -1;
        }
        
        .card-stack::before {
            transform: translateX(4px) translateY(4px);
            opacity: 0.3;
        }
        
        .card-stack::after {
            transform: translateX(8px) translateY(8px);
            opacity: 0.1;
        }

        /* Cart Animation Styles */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
            20%, 40%, 60%, 80% { transform: translateX(2px); }
        }

        @keyframes floatUp {
            0% { 
                opacity: 0; 
                transform: scale(0.8) translateY(0px); 
            }
            50% { 
                opacity: 1; 
                transform: scale(1.2) translateY(-10px); 
            }
            100% { 
                opacity: 0; 
                transform: scale(0.8) translateY(-30px); 
            }
        }

        .cart-float-animation {
            animation: floatUp 1.5s ease-out forwards;
        }

        @keyframes cartShake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }

        @keyframes cartGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
        }

        .cart-success-glow {
            animation: cartGlow 2s ease-in-out;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(2.4);
                opacity: 0;
            }
        }

        .pulse-ring {
            animation: pulse-ring 1.5s ease-out infinite;
        }

        /* Alpine.js cloak to prevent flash of unstyled content */
        [x-cloak] {
            display: none !important;
        }

        /* Ensure dropdowns are hidden by default */
        .dropdown-hidden {
            display: none;
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
    @include('layouts.alert')
    @php
        $categories = \App\Models\Category::orderBy('order', 'asc')->get();
    @endphp

    <!-- Announcement Bar -->
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center text-sm font-medium py-3 relative">
                <div class="animate-pulse-slow">
                    <i class="ri-gift-line mr-2"></i> 
                    <span class="font-semibold">FREE SHIPPING</span> on orders above $100! 
                    <span class="ml-2 px-2 py-1 bg-white/20 rounded-full text-xs">LIMITED TIME</span>
                </div>
                <!-- Floating particles effect -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="absolute top-1 left-1/4 w-1 h-1 bg-white/30 rounded-full animate-float"></div>
                    <div class="absolute top-2 right-1/3 w-1 h-1 bg-white/20 rounded-full animate-float" style="animation-delay: 1s;"></div>
                    <div class="absolute top-1 right-1/4 w-1 h-1 bg-white/40 rounded-full animate-float" style="animation-delay: 2s;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Navigation Header -->
    <header class="glass sticky top-0 z-50 border-b border-white/20" x-data="{ mobileMenuOpen: false, searchOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo with animation -->
                <a href="/" class="flex items-center space-x-3 group px-2">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300">
                            <i class="ri-shopping-bag-3-line text-xl text-white"></i>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                    </div>
                    <div class="flex flex-col px-2">
                        <span class="font-bold text-xl text-gray-900">Vybe<span class="text-gradient">Cart</span></span>
                        <div class="text-[10px] text-gray-500 font-medium tracking-wider py-1 -mt-1.5">PREMIUM STORE</div>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 flex items-center">
                            Categories
                            <i class="ri-arrow-down-s-line ml-1 transform group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-gray-100 py-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            @foreach ($categories->take(6) as $category)
                                <a href="{{ route('categoryproducts', $category->id) }}" 
                                   class="flex items-center px-6 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-colors duration-200">
                                    <i class="ri-arrow-right-s-line text-primary-400 mr-2"></i>
                                    {{ $category->name }}
                                </a>
                            @endforeach
                            @if($categories->count() > 6)
                                <div class="border-t border-gray-100 mt-2 pt-2">
                                    <a href="/categories" class="flex items-center px-6 py-2 text-primary-600 hover:bg-primary-50 font-medium transition-colors duration-200">
                                        <i class="ri-grid-line mr-2"></i>
                                        View All Categories
                                    </a>
                                </div>  
                            @endif
                        </div>
                    </div>
                    <a href="/about" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/contact" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>

                <!-- Search Bar (Desktop) -->
                <div class="hidden lg:flex flex-1 max-w-xl mx-8" x-data="searchSuggestions()">
                    <form action="{{route('search')}}" method="GET" class="relative w-full group">
                        <input type="search" name="search" value="{{request('search')}}" 
                               placeholder=""
                               class="w-full pl-12 pr-4 py-3 rounded-2xl border-2 border-transparent focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none transition-all duration-300 bg-white/80 backdrop-blur-sm shadow-sm text-center"
                               minlength="2" required
                               x-model="query"
                               @input.debounce.300ms="search()"
                               @focus="showSuggestions = true"
                               @keydown.escape="showSuggestions = false"
                               @keydown.arrow-down.prevent="navigateDown()"
                               @keydown.arrow-up.prevent="navigateUp()"
                               @keydown.enter.prevent="selectSuggestion()">
                        <i class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-primary-500 transition-colors duration-200"></i>
                        <button type="submit"
                                class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-200 text-sm font-semibold shadow-md hover:shadow-lg hover:scale-105">
                            Search
                        </button>
                        
                        <!-- Search Suggestions Dropdown -->
                        <div x-show="showSuggestions && suggestions.length > 0" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform translate-y-2"
                             @click.away="showSuggestions = false"
                             class="absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-gray-200 z-50 max-h-96 overflow-y-auto">
                            <template x-for="(suggestion, index) in suggestions" :key="suggestion.id + suggestion.type">
                                <div :class="{'bg-primary-50': selectedIndex === index}"
                                     @click="selectSuggestionByIndex(index)"
                                     @mouseenter="selectedIndex = index"
                                     class="cursor-pointer hover:bg-primary-50 transition-colors duration-200">
                                    <!-- Product Suggestion -->
                                    <div x-show="suggestion.type === 'product'" class="flex items-center p-4 border-b border-gray-100 last:border-b-0">
                                        <img :src="suggestion.image" :alt="suggestion.name" class="w-12 h-12 object-cover rounded-lg mr-4">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 text-sm line-clamp-1" x-text="suggestion.name"></h4>
                                            <p class="text-xs text-gray-500" x-text="suggestion.category"></p>
                                            <div class="flex items-center space-x-2 mt-1">
                                                <span class="font-bold text-primary-600" x-text="'$' + suggestion.price"></span>
                                                <span x-show="suggestion.original_price !== suggestion.price" 
                                                      class="text-xs text-gray-400 line-through" 
                                                      x-text="'$' + suggestion.original_price"></span>
                                            </div>
                                        </div>
                                        <i class="ri-arrow-right-line text-gray-400"></i>
                                    </div>
                                    <!-- Category Suggestion -->
                                    <div x-show="suggestion.type === 'category'" class="flex items-center p-4 border-b border-gray-100 last:border-b-0">
                                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="ri-folder-line text-primary-600"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 text-sm" x-text="suggestion.name"></h4>
                                            <p class="text-xs text-gray-500">Browse category</p>
                                        </div>
                                        <i class="ri-arrow-right-line text-gray-400"></i>
                                    </div>
                                </div>
                            </template>
                            
                            <!-- No Results -->
                            <div x-show="suggestions.length === 0 && query.length >= 2 && !loading" class="p-4 text-center text-gray-500">
                                <i class="ri-search-line text-2xl mb-2"></i>
                                <p class="text-sm">No suggestions found</p>
                            </div>
                            
                            <!-- Loading -->
                            <div x-show="loading" class="p-4 text-center">
                                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary-500 mx-auto"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- User Actions -->
                <div class="flex items-center space-x-3">
                    @auth
                        <!-- Cart Count Display next to User Account -->
                        @php
                            $userCartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                        @endphp
                        <div class="relative group">
                            <a href="{{ route('mycart') }}" 
                               class="flex items-center space-x-2 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white rounded-full px-4 py-2.5 font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 hover:-translate-y-0.5">
                                <i class="ri-shopping-cart-2-line text-lg"></i>
                                <span class="text-sm font-semibold">Cart</span>
                                <!-- Cart Count Badge -->
                                <div id="user-cart-count" 
                                     class="flex items-center justify-center min-w-[24px] h-6 bg-white text-primary-600 rounded-full text-xs font-bold px-2 ml-1"
                                     data-count="{{ $userCartCount }}">
                                    {{ $userCartCount }}
                                </div>
                            </a>
                            
                            <!-- Floating cart info tooltip -->
                            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-3 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none">
                                @if($userCartCount > 0)
                                    {{ $userCartCount }} {{ $userCartCount == 1 ? 'item' : 'items' }} in cart
                                @else
                                    Your cart is empty
                                @endif
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
                            </div>
                        </div>

                        <div class="relative" x-data="{ userMenuOpen: false }" @click.away="userMenuOpen = false">
                            <button @click="userMenuOpen = !userMenuOpen" 
                                    class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-colors duration-200 bg-white/80 backdrop-blur-sm rounded-full px-3 py-2 border border-gray-200 hover:border-primary-300 hover:shadow-md">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=14b8a6&color=fff" 
                                     alt="Profile" 
                                     class="w-8 h-8 rounded-full ring-2 ring-primary-100">
                                <span class="hidden sm:block font-medium text-sm">{{ auth()->user()->name }}</span>
                                <i class="ri-arrow-down-s-line transform transition-transform duration-200" 
                                   :class="{ 'rotate-180': userMenuOpen }"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div x-show="userMenuOpen" 
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 @click.away="userMenuOpen = false"
                                 class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 overflow-hidden"
                                 style="display: none;"
                                 x-init="$el.style.display = 'none'">
                                
                                <!-- User Info Header -->
                                <div class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-primary-50 to-primary-100">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=14b8a6&color=fff" 
                                             alt="Profile" 
                                             class="w-10 h-10 rounded-full">
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">{{ auth()->user()->name }}</p>
                                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Menu Items -->
                                <div class="py-1">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('dashboard') }}" 
                                           class="flex items-center px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 group">
                                            <i class="ri-dashboard-line w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-500"></i> 
                                            <span class="font-medium">Admin Dashboard</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('myorders') }}" 
                                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200 group">
                                        <i class="ri-shopping-bag-line w-5 h-5 mr-3 text-gray-400 group-hover:text-primary-500"></i> 
                                        <span class="font-medium">My Orders</span>
                                        @php
                                            $pendingOrdersCount = \App\Models\Order::where('user_id', auth()->id())->where('status', 'pending')->count();
                                        @endphp
                                        @if($pendingOrdersCount > 0)
                                            <span class="ml-auto bg-primary-100 text-primary-600 text-xs px-2 py-1 rounded-full font-medium">
                                                {{ $pendingOrdersCount }}
                                            </span>
                                        @endif
                                    </a>
                                </div>

                                <!-- Divider -->
                                <div class="border-t border-gray-100 my-1"></div>

                                <!-- Settings & Logout -->
                                <div class="py-1">
                                    <a href="#" 
                                       class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200 group">
                                        <i class="ri-settings-3-line w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600"></i> 
                                        <span class="font-medium">Settings</span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" 
                                                class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200 group">
                                            <i class="ri-logout-box-line w-5 h-5 mr-3 text-gray-400 group-hover:text-red-500"></i> 
                                            <span class="font-medium">Sign Out</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-primary-600 transition-colors duration-200 flex items-center bg-white/80 backdrop-blur-sm rounded-full px-4 py-2 border border-gray-200 hover:border-primary-300 hover:shadow-md font-medium">
                            <i class="ri-user-line mr-2"></i> Sign In
                        </a>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="lg:hidden text-gray-700 hover:text-primary-600 transition-colors duration-200 bg-white/80 backdrop-blur-sm rounded-full p-3 border border-gray-200 hover:border-primary-300 hover:shadow-md">
                        <i class="ri-menu-line text-xl" :class="{ 'ri-close-line': mobileMenuOpen, 'ri-menu-line': !mobileMenuOpen }"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-4"
                 class="lg:hidden border-t border-gray-200 bg-white/95 backdrop-blur-md">
                <div class="px-4 py-6 space-y-4">
                    <!-- Mobile Search -->
                    <div x-data="searchSuggestions()" class="mb-6">
                        <form action="{{route('search')}}" method="GET" class="relative">
                            <input type="search" name="search" value="{{request('search')}}" 
                                   placeholder=""
                                   class="w-full pl-12 pr-4 py-3 rounded-2xl border-2 border-transparent focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none transition-all duration-300 bg-white shadow-sm text-center"
                                   minlength="2" required
                                   x-model="query"
                                   @input.debounce.300ms="search()"
                                   @focus="showSuggestions = true"
                                   @keydown.escape="showSuggestions = false">
                            <i class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="submit"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-200 text-sm font-semibold shadow-md hover:shadow-lg hover:scale-105">
                                Search
                            </button>
                            
                            <!-- Mobile Search Suggestions -->
                            <div x-show="showSuggestions && suggestions.length > 0" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 @click.away="showSuggestions = false"
                                 class="absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-gray-200 z-50 max-h-80 overflow-y-auto">
                                <template x-for="suggestion in suggestions" :key="suggestion.id + suggestion.type">
                                    <div @click="window.location.href = suggestion.url" class="cursor-pointer hover:bg-primary-50 transition-colors duration-200">
                                        <!-- Mobile Product Suggestion -->
                                        <div x-show="suggestion.type === 'product'" class="flex items-center p-3 border-b border-gray-100 last:border-b-0">
                                            <img :src="suggestion.image" :alt="suggestion.name" class="w-10 h-10 object-cover rounded-lg mr-3">
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-gray-900 text-sm truncate" x-text="suggestion.name"></h4>
                                                <p class="text-xs text-gray-500" x-text="suggestion.category"></p>
                                                <span class="font-bold text-primary-600 text-sm" x-text="'$' + suggestion.price"></span>
                                            </div>
                                        </div>
                                        <!-- Mobile Category Suggestion -->
                                        <div x-show="suggestion.type === 'category'" class="flex items-center p-3 border-b border-gray-100 last:border-b-0">
                                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="ri-folder-line text-primary-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-900 text-sm" x-text="suggestion.name"></h4>
                                                <p class="text-xs text-gray-500">Browse category</p>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </form>
                    </div>

                    <!-- Mobile Navigation Links -->
                    <nav class="space-y-2">
                        <a href="/" class="flex items-center px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200 font-medium">
                            <i class="ri-home-line mr-3"></i> Home
                        </a>
                        
                        <div x-data="{ categoriesOpen: false }" @click.away="categoriesOpen = false">
                            <button @click="categoriesOpen = !categoriesOpen" 
                                    class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200 font-medium">
                                <span class="flex items-center">
                                    <i class="ri-grid-line mr-3"></i> Categories
                                </span>
                                <i class="ri-arrow-down-s-line transform transition-transform duration-200" 
                                   :class="{ 'rotate-180': categoriesOpen }"></i>
                            </button>
                            <div x-show="categoriesOpen" 
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="ml-4 mt-2 space-y-1"
                                 style="display: none;">
                                @foreach ($categories->take(6) as $category)
                                    <a href="{{ route('categoryproducts', $category->id) }}" 
                                       class="flex items-center px-4 py-2 text-gray-600 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200">
                                        <i class="ri-arrow-right-s-line text-primary-400 mr-2 text-sm"></i>
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        
                        <a href="/about" class="flex items-center px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200 font-medium">
                            <i class="ri-information-line mr-3"></i> About
                        </a>
                        <a href="/contact" class="flex items-center px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200 font-medium">
                            <i class="ri-mail-line mr-3"></i> Contact
                        </a>
                    </nav>

                    <!-- Mobile User Actions -->
                    @auth
                        <div class="border-t border-gray-200 pt-4 mt-6">
                            <div class="flex items-center space-x-3 mb-4 px-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=14b8a6&color=fff" 
                                     alt="Profile" 
                                     class="w-10 h-10 rounded-full ring-2 ring-primary-100">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <nav class="space-y-1">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200">
                                        <i class="ri-dashboard-line mr-3"></i> Admin Dashboard
                                    </a>
                                @endif
                                <a href="{{ route('myorders') }}" class="flex items-center px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200">
                                    <i class="ri-shopping-bag-line mr-3"></i> My Orders
                                </a>
                                <a href="{{ route('mycart') }}" class="flex items-center justify-between px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors duration-200">
                                    <div class="flex items-center">
                                        <i class="ri-shopping-cart-2-line mr-3"></i> 
                                        <span>My Cart</span>
                                    </div>
                                    @php
                                        $mobileCartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                                    @endphp
                                    <div id="mobile-cart-count" 
                                         class="flex items-center justify-center min-w-[24px] h-6 bg-primary-100 text-primary-600 rounded-full text-xs font-bold px-2 {{ $mobileCartCount > 0 ? '' : 'opacity-50' }}"
                                         data-count="{{ $mobileCartCount }}">
                                        {{ $mobileCartCount }}
                                    </div>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center px-4 py-3 text-gray-700 hover:text-red-600 hover:bg-red-50 rounded-xl transition-colors duration-200">
                                        <i class="ri-logout-box-line mr-3"></i> Sign Out
                                    </button>
                                </form>
                            </nav>
                        </div>
                    @else
                        <div class="border-t border-gray-200 pt-4 mt-6">
                            <a href="/login" class="flex items-center justify-center px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl hover:from-primary-600 hover:to-primary-700 transition-all duration-200 font-medium">
                                <i class="ri-user-line mr-2"></i> Sign In
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
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
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="ri-facebook-fill text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="ri-twitter-fill text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="ri-instagram-line text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/about" class="hover:text-white transition-colors flex items-center">
                            <i class="ri-arrow-right-s-line mr-2"></i>About Us
                        </a></li>
                        <li><a href="/contact" class="hover:text-white transition-colors flex items-center">
                            <i class="ri-arrow-right-s-line mr-2"></i>Contact
                        </a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center">
                            <i class="ri-arrow-right-s-line mr-2"></i>FAQs
                        </a></li>
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
                        <input type="email" 
                               placeholder="Enter your email" 
                               class="w-full px-4 py-2.5 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button type="submit" 
                                class="w-full px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
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

    <!-- Floating Action Button for Cart -->
    @auth
    <div class="fab group relative" onclick="window.location.href='{{ route('mycart') }}'" id="floating-cart-button">
        <i class="ri-shopping-cart-2-line group-hover:animate-wiggle"></i>
        @php
            $fabCartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
        @endphp
        @if($fabCartCount > 0)
            <div class="badge" id="fab-cart-badge" data-count="{{ $fabCartCount }}">
                {{ $fabCartCount }}
            </div>
        @else
            <div class="badge opacity-50" id="fab-cart-badge" data-count="0">0</div>
        @endif
        
        <!-- Shopping animation effect -->
        <div class="absolute -top-2 -right-2 opacity-0 pointer-events-none transition-all duration-700 transform" id="fab-shopping-effect">
            <div class="w-4 h-4 bg-green-400 rounded-full animate-ping"></div>
        </div>
    </div>
    @endauth

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-20 right-6 w-12 h-12 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-40">
        <i class="ri-arrow-up-line text-xl"></i>
    </button>

    <!-- Scripts -->
    <script>
        // Search Suggestions Alpine.js Component
        function searchSuggestions() {
            return {
                query: '{{ request("search") ?? "" }}',
                suggestions: [],
                showSuggestions: false,
                loading: false,
                selectedIndex: -1,
                
                async search() {
                    if (this.query.length < 2) {
                        this.suggestions = [];
                        this.showSuggestions = false;
                        return;
                    }
                    
                    this.loading = true;
                    this.selectedIndex = -1;
                    
                    try {
                        const response = await fetch(`{{ route('search.suggestions') }}?query=${encodeURIComponent(this.query)}`);
                        const data = await response.json();
                        this.suggestions = data;
                        this.showSuggestions = true;
                    } catch (error) {
                        console.error('Search error:', error);
                        this.suggestions = [];
                    } finally {
                        this.loading = false;
                    }
                },
                
                selectSuggestion() {
                    if (this.selectedIndex >= 0 && this.selectedIndex < this.suggestions.length) {
                        window.location.href = this.suggestions[this.selectedIndex].url;
                    } else if (this.query.length >= 2) {
                        // Submit the form for regular search
                        this.$el.closest('form').submit();
                    }
                },
                
                selectSuggestionByIndex(index) {
                    if (this.suggestions[index]) {
                        window.location.href = this.suggestions[index].url;
                    }
                },
                
                navigateDown() {
                    if (this.selectedIndex < this.suggestions.length - 1) {
                        this.selectedIndex++;
                    }
                },
                
                navigateUp() {
                    if (this.selectedIndex > -1) {
                        this.selectedIndex--;
                    }
                }
            }
        }

        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100
        });

        // Close all dropdowns when navigating to new pages
        document.addEventListener('DOMContentLoaded', function() {
            // Force close any open dropdowns on page load
            if (window.Alpine) {
                // Wait for Alpine to be ready
                Alpine.start();
            }
            
            // Close dropdowns on any link click
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    // Close user dropdown
                    const userDropdown = document.querySelector('[x-data*="userMenuOpen"]');
                    if (userDropdown && userDropdown.__x) {
                        userDropdown.__x.$data.userMenuOpen = false;
                    }
                    
                    // Close mobile menu
                    const mobileMenu = document.querySelector('[x-data*="mobileMenuOpen"]');
                    if (mobileMenu && mobileMenu.__x) {
                        mobileMenu.__x.$data.mobileMenuOpen = false;
                    }
                });
            });
        });

        // Back to Top functionality
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Loading animation for images
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    img.classList.add('animate-fade-in-up');
                });
            });
        });

        // Add to cart animation with dynamic count update
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch current cart count on page load
            fetchCartCount();
            
            const addToCartButtons = document.querySelectorAll('form[action*="cart.store"] button');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Add ripple effect
                    const ripple = document.createElement('span');
                    ripple.classList.add('absolute', 'rounded-full', 'bg-white/30', 'transform', 'scale-0', 'animate-ping');
                    ripple.style.left = '50%';
                    ripple.style.top = '50%';
                    ripple.style.width = '100px';
                    ripple.style.height = '100px';
                    ripple.style.marginLeft = '-50px';
                    ripple.style.marginTop = '-50px';
                    
                    button.style.position = 'relative';
                    button.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);

                    // Add cart animation effect and fetch updated count
                    setTimeout(() => {
                        fetchCartCount();
                        animateCartAdd();
                    }, 1000);
                });
            });
        });

        // Function to fetch cart count from server
        function fetchCartCount() {
            @auth
            fetch('{{ route("cart.count") }}')
                .then(response => response.json())
                .then(data => {
                    updateCartCount(data.cart_count);
                })
                .catch(error => {
                    console.log('Error fetching cart count:', error);
                });
            @endauth
        }

        // Function to animate cart addition
        function animateCartAdd() {
            // Get current cart count
            const cartBadge = document.getElementById('cart-count-badge');
            const fabBadge = document.getElementById('fab-cart-badge');
            const floatNumber = document.getElementById('cart-float-number');
            const shoppingEffect = document.getElementById('fab-shopping-effect');
            
            if (cartBadge && fabBadge) {
                const currentCount = parseInt(cartBadge.dataset.count) || 0;
                const newCount = currentCount + 1;
                
                // Update cart counts
                updateCartCount(newCount);
                
                // Animate floating +1 number
                if (floatNumber) {
                    floatNumber.style.opacity = '1';
                    floatNumber.style.transform = 'scale(1) translateY(-20px)';
                    
                    setTimeout(() => {
                        floatNumber.style.opacity = '0';
                        floatNumber.style.transform = 'scale(0) translateY(-40px)';
                    }, 1500);
                }
                
                // Animate shopping effect on FAB
                if (shoppingEffect) {
                    shoppingEffect.style.opacity = '1';
                    shoppingEffect.style.transform = 'scale(1.5)';
                    
                    setTimeout(() => {
                        shoppingEffect.style.opacity = '0';
                        shoppingEffect.style.transform = 'scale(1)';
                    }, 700);
                }
                
                // Shake animation for main cart button
                const mainCartButton = document.getElementById('main-cart-button');
                if (mainCartButton) {
                    mainCartButton.classList.add('animate-bounce');
                    setTimeout(() => {
                        mainCartButton.classList.remove('animate-bounce');
                    }, 500);
                }
                
                // Pulse animation for FAB
                const fabButton = document.getElementById('floating-cart-button');
                if (fabButton) {
                    fabButton.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        fabButton.style.transform = 'scale(1)';
                    }, 200);
                }
            }
        }

        // Function to update cart count display
        function updateCartCount(newCount) {
            const cartBadge = document.getElementById('cart-count-badge');
            const fabBadge = document.getElementById('fab-cart-badge');
            const userCartCount = document.getElementById('user-cart-count');
            const mobileCartCount = document.getElementById('mobile-cart-count');
            
            // Update main cart button badge
            if (cartBadge) {
                cartBadge.dataset.count = newCount;
                
                if (newCount > 0) {
                    cartBadge.innerHTML = `
                        <span class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 rounded-full"></span>
                        <span class="relative z-10">${newCount}</span>
                    `;
                    cartBadge.classList.remove('opacity-60');
                } else {
                    cartBadge.innerHTML = `
                        <span class="absolute inset-0 bg-gray-400 rounded-full opacity-60"></span>
                        <span class="relative z-10">0</span>
                    `;
                }
            }
            
            // Update FAB badge
            if (fabBadge) {
                fabBadge.dataset.count = newCount;
                fabBadge.textContent = newCount;
                
                if (newCount > 0) {
                    fabBadge.classList.remove('opacity-50');
                    
                    // Remove any existing pulsing ring effects
                    const fabButton = document.getElementById('floating-cart-button');
                    const pulseRing = fabButton?.querySelector('.animate-ping');
                    if (pulseRing) {
                        pulseRing.remove();
                    }
                } else {
                    fabBadge.classList.add('opacity-50');
                }
            }
            
            // Update user cart count badge
            if (userCartCount) {
                userCartCount.dataset.count = newCount;
                userCartCount.textContent = newCount;
                
                if (newCount > 0) {
                    userCartCount.classList.remove('opacity-50');
                } else {
                    userCartCount.classList.add('opacity-50');
                }
            }
            
            // Update mobile cart count badge
            if (mobileCartCount) {
                mobileCartCount.dataset.count = newCount;
                mobileCartCount.textContent = newCount;
                
                if (newCount > 0) {
                    mobileCartCount.classList.remove('opacity-50');
                } else {
                    mobileCartCount.classList.add('opacity-50');
                }
            }
        }

        // Function to animate cart removal (for delete operations)
        function animateCartRemove() {
            const cartBadge = document.getElementById('cart-count-badge');
            const fabBadge = document.getElementById('fab-cart-badge');
            
            if (cartBadge && fabBadge) {
                const currentCount = parseInt(cartBadge.dataset.count) || 0;
                const newCount = Math.max(0, currentCount - 1);
                updateCartCount(newCount);
                
                // Add shake animation for removal
                const mainCartButton = document.getElementById('main-cart-button');
                if (mainCartButton) {
                    mainCartButton.style.animation = 'shake 0.5s ease-in-out';
                    setTimeout(() => {
                        mainCartButton.style.animation = '';
                    }, 500);
                }
            }
        }

        // Listen for storage events to sync cart count across tabs
        window.addEventListener('storage', function(e) {
            if (e.key === 'cartCount') {
                updateCartCount(parseInt(e.newValue) || 0);
            }
        });

        // Update localStorage when cart changes
        function syncCartCount(count) {
            localStorage.setItem('cartCount', count);
        }

        // Progressive image loading
        function lazyLoadImages() {
            const images = document.querySelectorAll('img[data-src]');
            const imageArray = Array.from(images);

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove('lazy');
                            imageObserver.unobserve(image);
                        }
                    });
                });

                imageArray.forEach(image => imageObserver.observe(image));
            }
        }

        // Initialize lazy loading
        document.addEventListener('DOMContentLoaded', lazyLoadImages);

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>