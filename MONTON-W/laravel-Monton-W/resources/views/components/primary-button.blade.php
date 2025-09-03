<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#3358D7] text-white p-3 font-medium rounded-xl flex items-center justify-center ']) }}
    style="width: 300px;">
    {{ $slot }}

</button>
