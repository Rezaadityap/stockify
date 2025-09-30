<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-3 px-4 bg-gradient-to-r from-neon-blue to-neon-pink text-white font-medium rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg hover:shadow-neon-blue/30']) }}>
    {{ $slot }}
</button>