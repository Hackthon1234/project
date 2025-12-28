{--
    =====================================================
    VybeCart - Checkout Page
    =====================================================
    Description: Order checkout and payment processing
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}
{{--
    =====================================================
    VybeCart - Checkout Page
    =====================================================
    Description: Order checkout and payment processing
    Features: Order summary, payment options, order placement
    Author: VybeCart Team
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-purple-800 text-white py-20">
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-white/10 to-white/5 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full mix-blend-overlay filter blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold mb-6">
                    <i class="ri-secure-payment-line mr-2"></i>
                    SECURE CHECKOUT
                </div>
                <h1 class="text-4xl md:text-5xl font-black mb-4">
                    Complete Your <span class="text-gradient bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Order</span>
                </h1>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">
                    Review your items and choose your preferred payment method
                </p>
            </div>
        </div>
    </div>

    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-16">
        <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12" data-aos="fade-up">
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                        <span class="ml-3 text-primary-600 font-semibold">Cart</span>
                    </div>
                    <div class="flex-1 h-1 bg-primary-200"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold">
                            <i class="ri-credit-card-line"></i>
                        </div>
                        <span class="ml-3 text-primary-600 font-semibold">Payment</span>
                    </div>
                    <div class="flex-1 h-1 bg-gray-200"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 font-bold">
                            <i class="ri-check-line"></i>
                        </div>
                        <span class="ml-3 text-gray-500 font-semibold">Complete</span>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div data-aos="fade-right" data-aos-duration="800">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                        <i class="ri-file-list-3-line mr-2"></i>
                        ORDER SUMMARY
                    </div>
                    
                    <div class="card-stack bg-white rounded-3xl shadow-lg overflow-hidden">
                        <div class="p-8">
                            <a href="{{ route('viewproduct', $cart->product_id) }}" class="group block">
                                <div class="flex items-start space-x-6">
                                    <div class="relative flex-shrink-0">
                                        <img src="{{ asset('images/products/' . $cart->product->photopath) }}" 
                                             alt="{{ $cart->product->name }}"
                                             class="w-24 h-24 object-cover rounded-2xl group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute -top-2 -right-2 bg-primary-500 text-white text-xs font-bold rounded-full w-8 h-8 flex items-center justify-center">
                                            {{ $cart->quantity }}
                                        </div>
                                    </div>
                                    
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors mb-2">
                                            {{ $cart->product->name }}
                                        </h3>
                                        
                                        
                                        <div class="flex items-center space-x-3 mb-3">
                                            @if ($cart->product->discounted_price != '')
                                                <span class="text-2xl font-black text-gray-900">Rs. {{ $cart->product->discounted_price }}</span>
                                                <span class="text-lg text-gray-400 line-through">Rs. {{ $cart->product->price }}</span>
                                                <span class="text-xs font-bold text-white bg-red-500 px-2 py-1 rounded-full">
                                                    SAVE {{ number_format((($cart->product->price - $cart->product->discounted_price) / $cart->product->price) * 100) }}%
                                                </span>
                                            @else
                                                <span class="text-2xl font-black text-gray-900">Rs. {{ $cart->product->price }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="ri-shopping-bag-line mr-2"></i>
                                            <span>Quantity: {{ $cart->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="border-t border-gray-100 p-8 bg-gray-50">
                            <div class="space-y-4">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span>Rs. {{ $cart->product->discounted_price != '' ? $cart->product->discounted_price * $cart->quantity : $cart->product->price * $cart->quantity }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Shipping</span>
                                    <span class="text-green-600 font-semibold">FREE</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Tax</span>
                                    <span>Rs. 0.00</span>
                                </div>
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex justify-between text-xl font-black text-gray-900">
                                        <span>Total</span>
                                        <span class="text-primary-600">Rs. {{ $cart->product->discounted_price != '' ? $cart->product->discounted_price * $cart->quantity : $cart->product->price * $cart->quantity }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-duration="800">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                        <i class="ri-bank-card-line mr-2"></i>
                        PAYMENT METHOD
                    </div>
                    
                    <div class="space-y-6">
                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 border-2 border-transparent hover:border-primary-200 transition-all duration-300">
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-500 rounded-2xl flex items-center justify-center mr-4">
                                        <i class="ri-hand-coin-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Cash on Delivery</h3>
                                        <p class="text-gray-600 text-sm">Pay when your order arrives</p>
                                    </div>
                                </div>
                                <div class="text-green-500 font-bold text-sm bg-green-50 px-3 py-1 rounded-full">RECOMMENDED</div>
                            </div>
                            
                            <div class="mb-6">
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                                    <i class="ri-check-line text-green-500"></i>
                                    <span>No processing fees</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                                    <i class="ri-check-line text-green-500"></i>
                                    <span>Secure and convenient</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <i class="ri-check-line text-green-500"></i>
                                    <span>Pay with cash or card at delivery</span>
                                </div>
                            </div>
                            
                            <form action="{{route('order.store')}}" method="post" class="w-full">
                                @csrf
                                <input type="hidden" name="cartid" value="{{ $cart->id}}">
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-4 px-8 rounded-2xl 
                                               hover:from-green-600 hover:to-green-700 transform hover:-translate-y-1 hover:shadow-xl 
                                               transition-all duration-300 flex items-center justify-center group">
                                    <i class="ri-truck-line mr-2 group-hover:animate-bounce"></i>
                                    Order with Cash on Delivery
                                </button>
                            </form>
                        </div>

                        <div class="card-stack bg-white rounded-3xl shadow-lg p-8 border-2 border-transparent hover:border-primary-200 transition-all duration-300">
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-2xl flex items-center justify-center mr-4">
                                        <i class="ri-wallet-3-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">eSewa Payment</h3>
                                        <p class="text-gray-600 text-sm">Pay securely with eSewa</p>
                                    </div>
                                </div>
                                <div class="text-red-500 font-bold text-sm bg-red-50 px-3 py-1 rounded-full">INSTANT</div>
                            </div>
                            
                            <div class="mb-6">
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                                    <i class="ri-check-line text-red-500"></i>
                                    <span>Instant payment confirmation</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                                    <i class="ri-check-line text-red-500"></i>
                                    <span>Bank-grade security</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <i class="ri-check-line text-red-500"></i>
                                    <span>Easy refund process</span>
                                </div>
                            </div>
                            
                            <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="w-full">
                                <input type="hidden" id="amount" name="amount" value="100" required>
                                <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                                <input type="hidden" id="total_amount" name="total_amount" value="110" required>
                                <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
                                <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                                <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                                <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                                <input type="hidden" id="success_url" name="success_url" value="{{route('order.esewa',$cart->id)}}" required>
                                <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
                                <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                                <input type="hidden" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME=" required>
                                
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-4 px-8 rounded-2xl 
                                               hover:from-red-600 hover:to-red-700 transform hover:-translate-y-1 hover:shadow-xl 
                                               transition-all duration-300 flex items-center justify-center group">
                                    <i class="ri-secure-payment-line mr-2 group-hover:animate-pulse"></i>
                                    Pay with eSewa
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-6 bg-gradient-to-r from-primary-50 to-purple-50 rounded-2xl border border-primary-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center text-white mr-4 flex-shrink-0">
                                <i class="ri-shield-check-line text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Secure Checkout</h4>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Your payment information is encrypted and secure. We never store your payment details on our servers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $totalamount =
            $cart->product->discounted_price != ''
                ? $cart->product->discounted_price * $cart->quantity
                : $cart->product->price * $cart->quantity;
        $transaction_uuid = time() . rand(1000, 9999);
        $message = "total_amount=$totalamount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $secret = '8gBm/:&EnhH.1/q';
        $signature = hash_hmac('sha256', $message, $secret, true);
        $signature = base64_encode($signature);
    @endphp
    <script>
        document.getElementById('amount').value = '{{ $totalamount }}';
        document.getElementById('total_amount').value = '{{ $totalamount }}';
        document.getElementById('transaction_uuid').value = '{{ $transaction_uuid }}';
        document.getElementById('signature').value = '{{ $signature }}';
    </script>
@endsection
