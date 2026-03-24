<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gold border border-transparent rounded-lg font-bold text-sm text-white tracking-widest hover:bg-gold-600 focus:bg-gold-600 active:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition ease-in-out duration-150 shadow-md']) }}>
    {{ $slot }}
</button>
