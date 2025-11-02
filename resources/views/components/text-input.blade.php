@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border border-gray-300 bg-white text-gray-900
                focus:border-orange-500 focus:ring-orange-500 focus:outline-none
                rounded-md shadow-sm transition duration-200 ease-in-out
                placeholder-gray-400'
]) !!}>
