@php
    $isMenu = request()->routeIs('relatif.menu');
    $isCart = request()->routeIs('relatif.cart');
    $isOrders = request()->routeIs('relatif.orders');
@endphp

<nav class="absolute bottom-0 left-0 w-full h-[80px] bg-[#2A1D17] border-t border-[#594238] flex justify-between items-center px-9 py-3 shadow-[0_-4px_10px_rgba(0,0,0,0.4)] shrink-0 z-30">
    <!-- Menu -->
    <a href="{{ route('relatif.menu') }}" class="flex flex-col items-center justify-center h-11 px-4 py-1 {{ $isMenu ? 'bg-[#EE671C] rounded-xl text-[#4C1A00]' : 'text-[#E0C0B2] hover:text-[#FFB595]' }} transition duration-200 active:scale-95 group">
        <!-- Menu/Coffee Icon -->
        <svg class="w-5 h-5 {{ $isMenu ? 'text-[#4C1A00]' : 'text-[#E0C0B2] group-hover:text-[#FFB595]' }} transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
        <span class="font-montserrat text-[10px] {{ $isMenu ? 'font-bold' : 'font-semibold' }} uppercase tracking-wider leading-none mt-0.5">Menu</span>
    </a>

    <!-- Cart -->
    <a href="{{ route('relatif.cart') }}" class="flex flex-col items-center justify-center h-11 px-4 py-1 {{ $isCart ? 'bg-[#EE671C] rounded-xl text-[#4C1A00]' : 'text-[#E0C0B2] hover:text-[#FFB595]' }} transition duration-200 active:scale-95 group">
        <!-- Shopping Bag Icon -->
        <svg class="w-5 h-5 {{ $isCart ? 'text-[#4C1A00]' : 'text-[#E0C0B2] group-hover:text-[#FFB595]' }} transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
        </svg>
        <span class="font-montserrat text-[10px] {{ $isCart ? 'font-bold' : 'font-semibold' }} uppercase tracking-wider leading-none mt-0.5">Cart</span>
    </a>

    <!-- Orders -->
    <a href="{{ route('relatif.orders') }}" class="flex flex-col items-center justify-center h-11 px-4 py-1 {{ $isOrders ? 'bg-[#EE671C] rounded-xl text-[#4C1A00]' : 'text-[#E0C0B2] hover:text-[#FFB595]' }} transition duration-200 active:scale-95 group">
        <!-- Receipt Icon -->
        <svg class="w-5 h-5 {{ $isOrders ? 'text-[#4C1A00]' : 'text-[#E0C0B2] group-hover:text-[#FFB595]' }} transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
        </svg>
        <span class="font-montserrat text-[10px] {{ $isOrders ? 'font-bold' : 'font-semibold' }} uppercase tracking-wider leading-none mt-0.5">Orders</span>
    </a>

    <!-- Profile -->
    <a href="#" class="flex flex-col items-center justify-between h-9 text-[#E0C0B2] hover:text-[#FFB595] transition duration-200 active:scale-95 group">
        <!-- User Icon -->
        <svg class="w-5 h-5 text-[#E0C0B2] group-hover:text-[#FFB595] transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
        <span class="font-montserrat text-[10px] font-semibold uppercase tracking-wider leading-none mt-0.5">Profile</span>
    </a>
</nav>

