@props(['title', 'price', 'description', 'image', 'id'])

<article class="w-full bg-[#2A1D17] border border-[#594238] rounded-lg overflow-hidden flex flex-col transition duration-300 hover:shadow-lg hover:border-[#FFB595]/50 group">
    <!-- Item Image with Subtle Fade Overlay -->
    <div class="w-full h-[220px] relative overflow-hidden bg-[#40312B] shrink-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-t from-[#2A1D17] to-transparent opacity-60"></div>
    </div>

    <!-- Content Area -->
    <div class="p-4 flex flex-col flex-grow justify-between gap-4">
        <!-- Text details -->
        <div class="flex flex-col gap-2">
            <!-- Header (Title & Price) -->
            <div class="flex justify-between items-start gap-4">
                <h3 class="font-playfair text-[20px] font-medium text-[#F6DDD4] leading-tight group-hover:text-white transition duration-200">
                    {{ $title }}
                </h3>
                <span class="font-montserrat text-lg font-semibold text-[#FFB595] whitespace-nowrap">
                    Rp {{ number_format($price, 0, ',', '.') }}
                </span>
            </div>
            
            <!-- Description -->
            <p class="font-montserrat text-sm text-[#E0C0B2] leading-relaxed line-clamp-3">
                {{ $description }}
            </p>
        </div>

        <!-- Add To Cart Button -->
        <button 
            type="button"
            class="w-full py-2.5 border border-[#594238] rounded-sm text-xs font-semibold text-[#F6DDD4] hover:bg-[#EE671C] hover:border-[#EE671C] hover:text-[#4C1A00] transition duration-300 flex items-center justify-center gap-2 select-none active:scale-[0.98]"
            onclick="addToCart({{ $id }}, '{{ $title }}', {{ $price }})"
        >
            <!-- Plus Icon -->
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
            </svg>
            Add to Cart
        </button>
    </div>
</article>

