@extends('layouts.relatif')

@section('title', 'Relatif - Menu')

@section('content')
    <!-- Top App Bar / Header -->
    <x-relatif.header />

    <!-- Main Scrollable Content Area -->
    <div class="flex-grow overflow-y-auto px-5 py-6 flex flex-col gap-6 pb-[200px]" style="-ms-overflow-style: none; scrollbar-width: none;">
        <!-- Promo Banner -->
        <section id="promo-banner" class="relative w-full bg-[#EE671C] border border-[#FFB595] rounded-lg p-5 flex justify-between items-center overflow-hidden shrink-0 group shadow-md transition-all duration-300">
            <!-- Subtle Radial Gradient Background -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_right,rgba(255,255,255,0.15),transparent)] pointer-events-none"></div>
            
            <div class="flex flex-col gap-1.5 z-10 max-w-[210px]">
                <h2 id="promo-title" class="font-playfair text-[22px] font-semibold text-[#4C1A00] leading-tight">
                    Claim 20% Member Discount
                </h2>
                <p id="promo-desc" class="font-montserrat text-xs text-[#4C1A00]/80 font-medium">
                    Join the club for exclusive perks.
                </p>
            </div>
            
            <button id="promo-signup-btn" onclick="openMemberModal()" class="bg-[#4C1A00] hover:bg-[#341100] text-[#EE671C] font-montserrat text-xs font-bold px-4 py-2.5 rounded-xl z-10 shadow-md transition duration-200 shrink-0 select-none active:scale-95">
                Sign Up
            </button>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                function updatePromoBanner() {
                    const name = localStorage.getItem('relatif_member_name');
                    const banner = document.getElementById('promo-banner');
                    const title = document.getElementById('promo-title');
                    const desc = document.getElementById('promo-desc');
                    const btn = document.getElementById('promo-signup-btn');
                    
                    if (name && banner && title && desc && btn) {
                        banner.classList.remove('bg-[#EE671C]', 'border-[#FFB595]');
                        banner.classList.add('bg-[#2A1D17]', 'border-[#594238]/60');
                        
                        title.textContent = `Welcome back, ${name.split(' ' )[0]}!`;
                        title.classList.remove('text-[#4C1A00]');
                        title.classList.add('text-[#FFB595]');
                        
                        desc.textContent = "Your 20% VIP Club discount is active.";
                        desc.classList.remove('text-[#4C1A00]/80');
                        desc.classList.add('text-[#E0C0B2]/80');
                        
                        btn.innerHTML = `<span class="flex items-center gap-1 text-[11px] font-bold"><span class="text-[#FFB595]">&#9733;</span> VIP MEMBER</span>`;
                        btn.classList.remove('bg-[#4C1A00]', 'text-[#EE671C]');
                        btn.classList.add('bg-gradient-to-r', 'from-[#EE671C]', 'to-[#D35400]', 'text-[#4C1A00]');
                        btn.onclick = openMemberModal; // Allow clicking it to open details/edit
                    }
                }
                
                updatePromoBanner();
                window.addEventListener('relatif_member_registered', updatePromoBanner);
            });
        </script>

        <!-- Menu Section: Signatures -->
        <section class="flex flex-col gap-4">
            <h2 class="font-playfair text-[28px] font-semibold text-[#FFB595] tracking-wide select-none">
                Signatures
            </h2>
            
            <!-- Items Responsive Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($signatures as $item)
                    <x-relatif.menu-item 
                        :id="$item['id']"
                        :title="$item['title']"
                        :price="$item['price']"
                        :description="$item['description']"
                        :image="$item['image']"
                    />
                @endforeach
            </div>
        </section>
    </div>

    <!-- Floating Cart Footer (Overlaid) -->
    <x-relatif.floating-cart />

    <!-- Bottom Navigation Bar -->
    <x-relatif.bottom-navbar />
@endsection

