{{--
    =====================================================
    VybeCart - Input Error Component
    =====================================================
    Description: Display validation error messages for form fields
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
