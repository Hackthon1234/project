@extends('layouts.master')
@section('title', 'About Us')
@section('content')
    <!-- Enhanced Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-purple-800 text-white py-32">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-gradient-to-br from-white/10 to-white/5 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full">
            <div class="w-full h-full bg-grid-white/[0.02] bg-grid-pattern"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold mb-6">
                    <i class="ri-information-line mr-2"></i>
                    LEARN ABOUT US
                </div>
                <h1 class="text-5xl md:text-7xl font-black mb-6">
                    About <span class="text-gradient bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">VybeCart</span>
                </h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                    Discover our journey, mission, and the passionate team behind your favorite shopping experience
                </p>
                
                <!-- Floating Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">10K+</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Happy Customers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">5K+</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Products</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">99%</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Our Story Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-32">
        <!-- Background Decorations -->
        <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div data-aos="fade-right" data-aos-duration="800">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                        <i class="ri-book-open-line mr-2"></i>
                        OUR STORY
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 leading-tight">
                        Crafting Excellence Since <span class="text-gradient">2022</span>
                    </h2>
                    <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
                        <p>
                            VybeCart was born from a simple yet powerful vision: to revolutionize online shopping by combining 
                            <span class="font-semibold text-primary-600">exceptional quality</span>, 
                            <span class="font-semibold text-primary-600">unbeatable prices</span>, and 
                            <span class="font-semibold text-primary-600">extraordinary customer service</span>.
                        </p>
                        <p>
                            What began as a passionate project has evolved into a trusted e-commerce destination serving 
                            thousands of satisfied customers worldwide. Our journey is fueled by innovation, dedication, 
                            and an unwavering commitment to your shopping satisfaction.
                        </p>
                        <p>
                            Every product in our catalog is carefully curated by our expert team, ensuring that you receive 
                            only the finest quality items that enhance your lifestyle and exceed your expectations.
                        </p>
                    </div>
                    
                    <!-- Mission Statement -->
                    <div class="mt-12 p-8 bg-gradient-to-r from-primary-50 to-purple-50 rounded-3xl border border-primary-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="ri-target-line text-primary-500 mr-3"></i>
                            Our Mission
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            To democratize premium shopping experiences by making high-quality products accessible to everyone, 
                            while building lasting relationships through trust, innovation, and exceptional service.
                        </p>
                    </div>
                </div>
                
                <!-- Enhanced Image Section -->
                <div class="relative" data-aos="fade-left" data-aos-duration="800">
                    <div class="relative">
                        <!-- Main Image -->
                        <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1573164574572-cb89e39749b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="About VybeCart Team" 
                                 class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Floating Achievement Cards -->
                        <div class="absolute -top-8 -left-8 bg-white rounded-2xl shadow-xl p-6 max-w-xs" data-aos="fade-up" data-aos-delay="400">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-500 rounded-xl flex items-center justify-center">
                                    <i class="ri-award-line text-white text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-2xl font-black text-gray-900">2022</div>
                                    <div class="text-sm text-gray-500">Founded</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute -bottom-8 -right-8 bg-white rounded-2xl shadow-xl p-6 max-w-xs" data-aos="fade-up" data-aos-delay="600">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-500 rounded-xl flex items-center justify-center">
                                    <i class="ri-global-line text-white text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-2xl font-black text-gray-900">50+</div>
                                    <div class="text-sm text-gray-500">Countries Served</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Values Section -->
    <div class="relative py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-heart-line mr-2"></i>
                    OUR VALUES
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    What Drives <span class="text-gradient">Us Forward</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our core values shape every decision we make and every interaction we have with our customers
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Customer First -->
                <div class="group text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-customer-service-2-line text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer First</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Every decision we make starts with one question: "How does this benefit our customers?" 
                            Your satisfaction is our ultimate success metric.
                        </p>
                    </div>
                </div>
                
                <!-- Quality Excellence -->
                <div class="group text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-shield-check-line text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Quality Excellence</h3>
                        <p class="text-gray-600 leading-relaxed">
                            We believe quality is non-negotiable. Every product undergoes rigorous testing and evaluation 
                            to ensure it meets our exacting standards.
                        </p>
                    </div>
                </div>
                
                <!-- Innovation -->
                <div class="group text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-lightbulb-line text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Innovation</h3>
                        <p class="text-gray-600 leading-relaxed">
                            We constantly evolve and adapt, embracing new technologies and ideas to enhance your 
                            shopping experience and stay ahead of trends.
                        </p>
                    </div>
                </div>
                
                <!-- Integrity -->
                <div class="group text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-hand-heart-line text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Integrity</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Honesty and transparency guide everything we do. We build trust through consistent actions 
                            and genuine care for our customers and community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Team Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-32">
        <div class="absolute top-20 left-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-team-line mr-2"></i>
                    OUR TEAM
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Meet the <span class="text-gradient">Dream Team</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Passionate individuals working together to create exceptional shopping experiences
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- CEO -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 alt="CEO" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-primary-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            CEO
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">John Smith</h3>
                    <p class="text-gray-600 mb-4">Chief Executive Officer</p>
                    <p class="text-sm text-gray-500">Leading with vision and passion for customer excellence.</p>
                </div>
                
                <!-- CTO -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47b?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 alt="CTO" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            CTO
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Sarah Johnson</h3>
                    <p class="text-gray-600 mb-4">Chief Technology Officer</p>
                    <p class="text-sm text-gray-500">Driving innovation and technical excellence.</p>
                </div>
                
                <!-- Head of Customer Success -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                 alt="Head of Customer Success" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            HEAD CS
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mike Davis</h3>
                    <p class="text-gray-600 mb-4">Head of Customer Success</p>
                    <p class="text-sm text-gray-500">Ensuring every customer has an amazing experience.</p>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="inline-flex flex-col sm:flex-row gap-4">
                    <a href="/" class="btn-primary inline-flex items-center px-8 py-4">
                        <i class="ri-shopping-bag-line mr-2"></i>
                        Start Shopping
                    </a>
                    <a href="/contact" class="btn-secondary inline-flex items-center px-8 py-4">
                        <i class="ri-message-3-line mr-2"></i>
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection