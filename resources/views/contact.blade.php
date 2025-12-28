{--
    =====================================================
    VybeCart - Contact Us
    =====================================================
    Description: Contact form and customer support information
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}
{{--
    =====================================================
    VybeCart - Contact Us
    =====================================================
    Description: Contact form and support information
    Features: Contact form, location, support details
    Author: VybeCart Team
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-purple-800 text-white py-32">
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-gradient-to-br from-white/10 to-white/5 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full">
            <div class="w-full h-full bg-grid-white/[0.02] bg-grid-pattern"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold mb-6">
                    <i class="ri-customer-service-2-line mr-2"></i>
                    CONTACT US
                </div>
                <h1 class="text-5xl md:text-7xl font-black mb-6">
                    Get in <span class="text-gradient bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Touch</span>
                </h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                    We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">24/7</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Support Available</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">&lt;1h</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Response Time</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-yellow-300">99%</div>
                        <div class="text-white/70 text-sm uppercase tracking-wider">Happy Customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-32">
        <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <div data-aos="fade-right" data-aos-duration="800">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                        <i class="ri-message-3-line mr-2"></i>
                        SEND MESSAGE
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 leading-tight">
                        Let's Start a <span class="text-gradient">Conversation</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-10">
                        Have a question, suggestion, or just want to say hello? We're here to help and would love to hear from you.
                    </p>
                    
                    <form class="space-y-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-3">Your Name *</label>
                                <input type="text" id="name" name="name" 
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-gray-900 placeholder-gray-400"
                                       placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-3">Email Address *</label>
                                <input type="email" id="email" name="email" 
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-gray-900 placeholder-gray-400"
                                       placeholder="your@email.com">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="block text-sm font-bold text-gray-700 mb-3">Subject *</label>
                            <input type="text" id="subject" name="subject" 
                                   class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-gray-900 placeholder-gray-400"
                                   placeholder="What's this about?">
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="block text-sm font-bold text-gray-700 mb-3">Message *</label>
                            <textarea id="message" name="message" rows="6" 
                                      class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:ring-4 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-300 text-gray-900 placeholder-gray-400 resize-none"
                                      placeholder="Tell us what's on your mind..."></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold py-4 px-8 rounded-2xl 
                                       hover:from-primary-600 hover:to-primary-700 transform hover:-translate-y-1 hover:shadow-xl 
                                       transition-all duration-300 flex items-center justify-center group">
                            <i class="ri-send-plane-2-line mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            Send Message
                        </button>
                    </form>
                </div>
                
                <div class="lg:pl-8" data-aos="fade-left" data-aos-duration="800">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                        <i class="ri-information-line mr-2"></i>
                        CONTACT INFO
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 leading-tight">
                        Other Ways to <span class="text-gradient">Reach Us</span>
                    </h2>
                    
                    <div class="space-y-6 mb-12">
                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex items-start">
                                <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center text-white mr-6 flex-shrink-0">
                                    <i class="ri-map-pin-2-line text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Our Location</h4>
                                    <p class="text-gray-600 leading-relaxed">123 Shopping Street<br>Kathmandu, Nepal<br>44600</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                            <div class="flex items-start">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center text-white mr-6 flex-shrink-0">
                                    <i class="ri-phone-line text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Call Us</h4>
                                    <p class="text-gray-600 leading-relaxed">
                                        <a href="tel:+9779876543210" class="hover:text-primary-600 transition-colors">+977 987-654-3210</a><br>
                                        <span class="text-sm text-gray-500">Mon-Fri: 9AM-5PM</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                            <div class="flex items-start">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center text-white mr-6 flex-shrink-0">
                                    <i class="ri-mail-line text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Email Us</h4>
                                    <p class="text-gray-600 leading-relaxed">
                                        <a href="mailto:support@vybecart.com" class="hover:text-primary-600 transition-colors">support@vybecart.com</a><br>
                                        <span class="text-sm text-gray-500">We'll respond within 24 hours</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                            <div class="flex items-start">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center text-white mr-6 flex-shrink-0">
                                    <i class="ri-time-line text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900 mb-2">Business Hours</h4>
                                    <div class="text-gray-600 leading-relaxed space-y-1">
                                        <p><span class="font-medium">Monday - Friday:</span> 9:00 AM - 5:00 PM</p>
                                        <p><span class="font-medium">Saturday:</span> 10:00 AM - 2:00 PM</p>
                                        <p><span class="font-medium">Sunday:</span> Closed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-primary-50 to-purple-50 rounded-3xl p-8 border border-primary-100" data-aos="fade-up" data-aos-delay="500">
                        <h4 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="ri-share-line text-primary-500 mr-3"></i>
                            Connect With Us
                        </h4>
                        <p class="text-gray-600 mb-6">Follow us on social media for updates, deals, and more!</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <i class="ri-facebook-fill text-xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-gradient-to-r from-sky-400 to-sky-500 rounded-2xl flex items-center justify-center text-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <i class="ri-twitter-fill text-xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center text-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <i class="ri-instagram-line text-xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-gradient-to-r from-red-500 to-red-600 rounded-2xl flex items-center justify-center text-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <i class="ri-youtube-fill text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="relative py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-question-line mr-2"></i>
                    FREQUENTLY ASKED
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Quick <span class="text-gradient">Answers</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Find quick answers to common questions about our services and policies
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="space-y-6">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">What are your shipping times?</h3>
                        <p class="text-gray-600">We typically ship within 1-2 business days and delivery takes 3-7 business days depending on your location.</p>
                    </div>
                    
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Do you accept returns?</h3>
                        <p class="text-gray-600">Yes! We accept returns within 30 days of delivery. Items must be in original condition with tags attached.</p>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">How can I track my order?</h3>
                        <p class="text-gray-600">Once shipped, you'll receive a tracking number via email. You can also check your order status in the "My Orders" section.</p>
                    </div>
                    
                    <div class="card-stack bg-white rounded-3xl shadow-lg p-8 transform hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">What payment methods do you accept?</h3>
                        <p class="text-gray-600">We accept all major credit cards, PayPal, and various local payment methods for your convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection