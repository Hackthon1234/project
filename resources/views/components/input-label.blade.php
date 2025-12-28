{{--
    =====================================================
    VybeCart - Input Label Component
    =====================================================
    Description: Styled label component for form inputs
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
