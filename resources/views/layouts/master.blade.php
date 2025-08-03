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

        /* Enhanced Logo Styles */
        .logo-container {
            position: relative;
            overflow: visible;
        }
        
        .logo-icon {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .logo-icon:hover {
            transform: scale(1.05) rotate(2deg);
        }
        
        .logo-sparkle {
            animation: sparkle 2s ease-in-out infinite;
        }
        
        @keyframes sparkle {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }
        
        .logo-text {
            background: linear-gradient(45deg, #14b8a6, #0d9488, #0f766e);
            background-size: 200% 200%;
            animation: gradient-shift 3s ease infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .logo-badge {
            background: linear-gradient(45deg, #fbbf24, #f59e0b, #d97706);
            background-size: 200% 200%;
            animation: badge-glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes badge-glow {
            0% { background-position: 0% 50%; box-shadow: 0 2px 4px rgba(251, 191, 36, 0.3); }
            100% { background-position: 100% 50%; box-shadow: 0 2px 8px rgba(251, 191, 36, 0.5); }
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

    <!-- Redesigned Attractive Navigation Header -->
<header class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm backdrop-blur-sm bg-opacity-90" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main navbar container with consistent height -->
        <div class="flex items-center justify-between h-16"> <!-- Reduced height from h-20 to h-16 -->
            
            <!-- Left Section: Logo + Navigation with adjusted spacing -->
            <div class="flex items-center space-x-2"> <!-- Reduced from space-x-4 to space-x-2 -->
                <!-- Logo Section with adjusted size -->
                <div class="flex-shrink-0 mr-4"> <!-- Reduced from mr-6 to mr-4 -->
                    <a href="/" class="flex items-center space-x-1.5 group logo-container transform hover:scale-[1.02] transition-transform duration-300"> <!-- Reduced from space-x-2 to space-x-1.5 -->
                        <!-- Logo Icon with adjusted size -->
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-md transition-all duration-200 transform group-hover:rotate-[3deg] logo-icon">
                                <div class="relative">
                                    <i class="ri-shopping-cart-2-line text-white text-lg"></i>
                                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Brand Text with adjusted size -->
                        <div class="flex flex-col">
                            <h1 class="text-xl font-black tracking-tight"> <!-- Reduced from text-2xl -->
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-primary-700 logo-text">Vybe</span>
                                <span class="text-gray-800">Cart</span>
                            </h1>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation with consistent spacing -->
                <nav class="hidden lg:flex items-center space-x-0.5"> <!-- Reduced from space-x-1 to space-x-0.5 -->
                    <!-- Navigation Items with consistent padding -->
                    <a href="/" class="px-2.5 py-2 text-gray-700 hover:text-primary-600 font-medium text-sm transition-all duration-300 rounded-lg hover:bg-gray-50 group"> <!-- Reduced from px-3 to px-2.5 -->
                        <span class="relative inline-flex items-center">
                            <i class="ri-home-line mr-1.5 text-primary-500 group-hover:text-primary-600 transition-colors"></i>
                            Home
                            <span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-primary-500 group-hover:w-full transition-all duration-300"></span>
                        </span>
                    </a>
                    
                    <!-- Categories Dropdown -->
                    <div class="relative group" x-data="{ open: false }">
                        <button @mouseenter="open = true" @mouseleave="open = false" 
                            class="px-2.5 py-2 text-gray-700 hover:text-primary-600 font-medium text-sm transition-all duration-300 rounded-lg hover:bg-gray-50 flex items-center"> <!-- Reduced from px-3 to px-2.5 -->
                            <span class="relative inline-flex items-center">
                                <i class="ri-apps-line mr-1.5 text-primary-500 group-hover:text-primary-600 transition-colors"></i>
                                Categories
                                <i class="ri-arrow-down-s-line ml-1 text-sm transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                                <span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-primary-500 group-hover:w-full transition-all duration-300"></span>
                            </span>
                        </button>
                        <div x-show="open" 
                             @mouseenter="open = true" @mouseleave="open = false"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             class="absolute left-0 mt-0.5 w-56 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-20">
                            @foreach ($categories->take(6) as $category)
                                <a href="{{ route('categoryproducts', $category->id) }}" 
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-colors duration-200">
                                    <i class="ri-folder-line mr-2 text-primary-400"></i>
                                    <span>{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Other nav items with same consistent spacing -->
                    <a href="{{ route('products.all') }}" class="px-2.5 py-2 text-gray-700 hover:text-primary-600 font-medium text-sm transition-all duration-300 rounded-lg hover:bg-gray-50 group"> <!-- Reduced from px-3 to px-2.5 -->
                        <span class="relative inline-flex items-center">
                            <i class="ri-shopping-bag-line mr-1.5 text-primary-500 group-hover:text-primary-600 transition-colors"></i>
                            Products
                            <span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-primary-500 group-hover:w-full transition-all duration-300"></span>
                        </span>
                    </a>
                    
                    <a href="/about" class="px-2.5 py-2 text-gray-700 hover:text-primary-600 font-medium text-sm transition-all duration-300 rounded-lg hover:bg-gray-50 group"> <!-- Reduced from px-3 to px-2.5 -->
                        <span class="relative inline-flex items-center">
                            <i class="ri-information-line mr-1.5 text-primary-500 group-hover:text-primary-600 transition-colors"></i>
                            About
                            <span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-primary-500 group-hover:w-full transition-all duration-300"></span>
                        </span>
                    </a>
                    
                    <a href="/contact" class="px-2.5 py-2 text-gray-700 hover:text-primary-600 font-medium text-sm transition-all duration-300 rounded-lg hover:bg-gray-50 group"> <!-- Reduced from px-3 to px-2.5 -->
                        <span class="relative inline-flex items-center">
                            <i class="ri-mail-line mr-1.5 text-primary-500 group-hover:text-primary-600 transition-colors"></i>
                            Contact
                            <span class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-primary-500 group-hover:w-full transition-all duration-300"></span>
                        </span>
                    </a>
                </nav>
            </div>

            <!-- Center Section: Search Bar -->
            <div class="hidden md:block max-w-[220px]" x-data="searchSuggestions()"> <!-- Reduced from max-w-xs (320px) to 220px -->
                <form action="{{route('search')}}" method="GET" class="relative">
                    <input type="search" name="search" x-model="query" 
                           placeholder="Search products..."
                           x-on:input.debounce.300ms="search()"
                           x-on:focus="showSuggestions = query.length >= 2 && suggestions.length > 0"
                           x-on:blur="setTimeout(() => showSuggestions = false, 200)"
                           x-on:keydown.arrow-down.prevent="navigateDown()"
                           x-on:keydown.arrow-up.prevent="navigateUp()"
                           x-on:keydown.enter.prevent="selectSuggestion()"
                           class="w-full pl-8 pr-4 py-1.5 rounded-lg border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 focus:outline-none transition-all duration-200 text-sm placeholder-gray-400"> <!-- Reduced padding -->
                    <i class="ri-search-2-line absolute left-2.5 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i> <!-- Adjusted position -->
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-primary-500 hover:text-primary-600 transition-colors">
                        <i class="ri-arrow-right-line text-sm"></i> <!-- Made icon smaller -->
                    </button>
                    
                    <!-- Search Suggestions Dropdown -->
                    <div x-show="showSuggestions" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="absolute left-0 right-0 mt-1 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-20 max-h-80 overflow-y-auto">
                        
                        <!-- Loading State -->
                        <template x-if="loading">
                            <div class="px-4 py-3 text-sm text-gray-500 flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-primary-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Searching...</span>
                            </div>
                        </template>
                        
                        <!-- No Results State -->
                        <template x-if="!loading && suggestions.length === 0 && query.length >= 2">
                            <div class="px-4 py-3 text-sm text-gray-500">
                                No results found for "<span x-text="query"></span>"
                            </div>
                        </template>
                        
                        <!-- Suggestion Results -->
                        <template x-for="(suggestion, index) in suggestions" :key="suggestion.id">
                            <div @click="selectSuggestionByIndex(index)"
                                 :class="{'bg-primary-50': selectedIndex === index}"
                                 class="px-4 py-2 hover:bg-primary-50 cursor-pointer transition-colors search-suggestion-item"
                                 :class="{'selected': selectedIndex === index}">
                                <template x-if="suggestion.type === 'product'">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10 bg-gray-100 rounded-md overflow-hidden">
                                            <img :src="suggestion.image" :alt="suggestion.name" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3 flex-1">
                                            <div class="text-sm font-medium text-gray-900" x-html="highlightMatch(suggestion.name)"></div>
                                            <div class="flex items-center text-xs">
                                                <span class="text-primary-600 font-medium" x-text="'$' + suggestion.price"></span>
                                                <template x-if="suggestion.original_price > suggestion.price">
                                                    <span class="ml-1.5 text-gray-400 line-through" x-text="'$' + suggestion.original_price"></span>
                                                </template>
                                                <span class="ml-auto text-gray-500" x-text="suggestion.category"></span>
                                            </div>
                                        </div>
                                        <div x-show="selectedIndex === index" class="ml-2 text-gray-500 text-xs hidden sm:block">
                                            <span class="px-1.5 py-0.5 bg-gray-100 rounded">Enter</span>
                                        </div>
                                    </div>
                                </template>
                                <template x-if="suggestion.type === 'category'">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex-shrink-0 bg-primary-100 rounded-md flex items-center justify-center text-primary-600">
                                            <i class="ri-folder-line"></i>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900" x-html="highlightMatch(suggestion.name)"></div>
                                            <div class="text-xs text-gray-500">Category</div>
                                        </div>
                                        <div x-show="selectedIndex === index" class="ml-auto text-gray-500 text-xs hidden sm:block">
                                            <span class="px-1.5 py-0.5 bg-gray-100 rounded">Enter</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </form>
            </div>

            <!-- Right Section with adjusted spacing -->
            <div class="flex items-center space-x-2"> <!-- Reduced from space-x-3 to space-x-2 -->
                @auth
                    <!-- Action Buttons with consistent size -->
                    <div class="flex items-center space-x-1"> <!-- Reduced from space-x-2 to space-x-1 -->
                        <a href="{{ route('wishlist.index') }}" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition-all duration-200 group relative">
                            <i class="ri-heart-line text-lg group-hover:text-pink-500"></i>
                            @php $userWishlistCount = \App\Models\Wishlist::where('user_id', auth()->id())->count(); @endphp
                            @if($userWishlistCount > 0)
                                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-pink-500 text-xs text-white items-center justify-center">{{ $userWishlistCount }}</span>
                                </span>
                            @endif
                        </a>
                        
                        <a href="{{ route('mycart') }}" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition-all duration-200 group relative">
                            <i class="ri-shopping-cart-2-line text-lg group-hover:text-primary-500"></i>
                            @php $userCartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity'); @endphp
                            @if($userCartCount > 0)
                                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-primary-500 text-xs text-white items-center justify-center">{{ $userCartCount }}</span>
                                </span>
                            @endif
                        </a>
                    </div>

                    <!-- User Menu Button -->
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" 
                            class="flex items-center space-x-1.5 px-2 py-2 rounded-lg hover:bg-gray-100 text-gray-700 transition-all duration-200 group"> <!-- Reduced spacing -->
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center text-white text-sm font-bold shadow-sm group-hover:shadow-md transition-shadow">
                                <i class="ri-user-3-fill"></i>
                            </div>
                            <span class="font-medium text-sm hidden sm:block group-hover:text-primary-600 transition-colors">{{ Str::limit(auth()->user()->name, 8) }}</span> <!-- Reduced limit from 10 to 8 -->
                            <i class="ri-arrow-down-s-line text-sm transition-transform duration-200" :class="{ 'rotate-180': userMenuOpen }"></i>
                        </button>
                        
                        <!-- User Dropdown Menu -->
                        <div x-show="userMenuOpen" 
                             @click.away="userMenuOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-20">
                            
                            <!-- User Profile Header -->
                            <div class="px-4 py-2 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center text-white shadow-sm">
                                        <i class="ri-user-3-fill"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900 text-sm">{{ auth()->user()->name }}</div>
                                        <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Menu Items -->
                            <div class="py-1">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-colors">
                                        <i class="ri-dashboard-line mr-2 text-primary-500"></i> 
                                        <span>Dashboard</span>
                                    </a>
                                @endif
                                
                                <a href="{{ route('myorders') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-colors">
                                    <i class="ri-shopping-bag-line mr-2 text-blue-500"></i> 
                                    <span>My Orders</span>
                                </a>
                                
                                <a href="{{ route('wishlist.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:text-primary-600 hover:bg-primary-50 transition-colors">
                                    <i class="ri-heart-line mr-2 text-pink-500"></i> 
                                    <span>Wishlist</span>
                                    @if($userWishlistCount > 0)
                                        <span class="ml-auto bg-pink-100 text-pink-600 text-xs font-medium px-1.5 py-0.5 rounded-full">
                                            {{ $userWishlistCount }}
                                        </span>
                                    @endif
                                </a>
                            </div>
                            
                            <!-- Sign Out -->
                            <div class="border-t border-gray-100 mt-1 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="ri-logout-box-line mr-2"></i> 
                                        <span>Sign Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Auth Buttons with consistent size -->
                    <div class="flex items-center space-x-1.5"> <!-- Reduced from space-x-2 to space-x-1.5 -->
                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 transition-all duration-200 hover:bg-gray-50 rounded-lg flex items-center"> <!-- Reduced from px-4 to px-3 -->
                            <i class="ri-login-circle-line mr-1 text-primary-500"></i> <!-- Reduced from mr-1.5 to mr-1 -->
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="px-3 py-2 text-sm font-medium text-white bg-gradient-to-r from-primary-500 to-primary-600 rounded-lg hover:from-primary-600 hover:to-primary-700 transition-all duration-200 shadow-sm hover:shadow-md flex items-center"> <!-- Reduced from px-4 to px-3 -->
                            <i class="ri-user-add-line mr-1 text-sm"></i> <!-- Reduced from mr-1.5 to mr-1 -->
                            Sign Up
                        </a>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition-all duration-200 group focus:outline-none"> <!-- Reduced from w-10 h-10 to w-8 h-8 -->
                    <i x-show="!mobileMenuOpen" class="ri-menu-line text-lg group-hover:text-primary-600"></i>
                    <i x-show="mobileMenuOpen" class="ri-close-line text-lg group-hover:text-primary-600"></i>
                </button>
                
                <!-- Mobile Search Button -->
                <button @click="window.location.href = '{{route('search')}}'" class="md:hidden w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition-all duration-200 group focus:outline-none mr-1"> <!-- Reduced from w-10 h-10 to w-8 h-8 -->
                    <i class="ri-search-2-line text-lg group-hover:text-primary-600"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu with Floating Animation -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="lg:hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="px-4 py-4 space-y-3">
            <!-- Mobile Search with Floating Effect -->
            <form action="{{route('search')}}" method="GET" class="relative mb-3" x-data="searchSuggestions()">
                <div class="relative group">
                    <input type="search" name="search" x-model="query" 
                           placeholder="Search products..."
                           x-on:input.debounce.300ms="search()"
                           x-on:focus="showSuggestions = query.length >= 2 && suggestions.length > 0"
                           x-on:blur="setTimeout(() => showSuggestions = false, 200)"
                           x-on:keydown.arrow-down.prevent="navigateDown()"
                           x-on:keydown.arrow-up.prevent="navigateUp()"
                           x-on:keydown.enter.prevent="selectSuggestion()"
                           class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 focus:outline-none transition-all duration-200 text-sm placeholder-gray-400">
                    <i class="ri-search-2-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm group-hover:text-primary-500 transition-colors"></i>
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-primary-500 hover:text-primary-600">
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
                
                <!-- Mobile Search Suggestions Dropdown -->
                <div x-show="showSuggestions" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     class="absolute left-0 right-0 mt-1 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-50 max-h-60 overflow-y-auto">
                    
                    <!-- Loading State -->
                    <template x-if="loading">
                        <div class="px-4 py-3 text-sm text-gray-500 flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-primary-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Searching...</span>
                        </div>
                    </template>
                    
                    <!-- No Results State -->
                    <template x-if="!loading && suggestions.length === 0 && query.length >= 2">
                        <div class="px-4 py-3 text-sm text-gray-500">
                            No results found for "<span x-text="query"></span>"
                        </div>
                    </template>
                    
                    <!-- Suggestion Results -->
                    <template x-for="(suggestion, index) in suggestions" :key="suggestion.id">
                        <div @click="selectSuggestionByIndex(index)"
                             :class="{'bg-primary-50': selectedIndex === index}"
                             class="px-4 py-2 hover:bg-primary-50 cursor-pointer transition-colors search-suggestion-item"
                             :class="{'selected': selectedIndex === index}">
                            <template x-if="suggestion.type === 'product'">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10 bg-gray-100 rounded-md overflow-hidden">
                                        <img :src="suggestion.image" :alt="suggestion.name" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <div class="text-sm font-medium text-gray-900" x-html="highlightMatch(suggestion.name)"></div>
                                        <div class="flex items-center text-xs">
                                            <span class="text-primary-600 font-medium" x-text="'$' + suggestion.price"></span>
                                            <template x-if="suggestion.original_price > suggestion.price">
                                                <span class="ml-1.5 text-gray-400 line-through" x-text="'$' + suggestion.original_price"></span>
                                            </template>
                                            <span class="ml-auto text-gray-500" x-text="suggestion.category"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="suggestion.type === 'category'">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 flex-shrink-0 bg-primary-100 rounded-md flex items-center justify-center text-primary-600">
                                        <i class="ri-folder-line"></i>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900" x-html="highlightMatch(suggestion.name)"></div>
                                        <div class="text-xs text-gray-500">Category</div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </form>
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
                    <div class="flex items-center space-x-3 text-white mb-4 logo-container">
                        <!-- Modern Footer Logo -->
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 rounded-xl flex items-center justify-center shadow-lg logo-icon">
                            <div class="relative">
                                <i class="ri-shopping-cart-2-line text-white text-xl"></i>
                                <!-- Sparkle dots for footer -->
                                <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-yellow-400 rounded-full logo-sparkle"></div>
                                <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-pink-400 rounded-full logo-sparkle" style="animation-delay: 1s;"></div>
                            </div>
                        </div>
                        <div>
                            <span class="font-black text-xl">
                                <span class="text-gradient bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600 bg-clip-text text-transparent">Vybe</span><span class="text-white">Cart</span>
                            </span>
                            <div class="flex items-center mt-1">
                                <div class="px-2 py-0.5 logo-badge text-white text-[8px] font-bold rounded-full tracking-wider">
                                    PRO
                                </div>
                            </div>
                        </div>
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
                        this.showSuggestions = this.suggestions.length > 0;
                    } catch (error) {
                        console.error('Search error:', error);
                        this.suggestions = [];
                    } finally {
                        this.loading = false;
                    }
                },
                
                // Highlight matching text in suggestion names
                highlightMatch(text) {
                    if (!text || !this.query) return text;
                    const regex = new RegExp(`(${this.query.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&')})`, 'gi');
                    return text.replace(regex, '<span class="bg-yellow-100 font-medium">$1</span>');
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
                        this.scrollSuggestionIntoView();
                    }
                },
                
                navigateUp() {
                    if (this.selectedIndex > -1) {
                        this.selectedIndex--;
                        this.scrollSuggestionIntoView();
                    }
                },
                
                // Ensure the selected suggestion is visible in the dropdown
                scrollSuggestionIntoView() {
                    if (this.selectedIndex > -1) {
                        setTimeout(() => {
                            const selected = document.querySelector('.search-suggestion-item.selected');
                            if (selected) {
                                selected.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                            }
                        }, 10);
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