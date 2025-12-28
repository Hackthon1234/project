{{--
    =====================================================
    VybeCart - Auth Session Status
    =====================================================
    Description: Display authentication session status messages
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
