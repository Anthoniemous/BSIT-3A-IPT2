<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'px-6 py-2 bg-yellow-500 text-black font-semibold rounded-md 
                hover:bg-yellow-600 focus:outline-none focus:ring-2 
                focus:ring-offset-2 focus:ring-yellow-400'
]) }}>
    {{ $slot }}
</button>

