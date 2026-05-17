@extends('layouts.relatif')

@section('title', 'Relatif - Your Cart')

@section('content')
    <!-- Top App Bar / Header -->
    <header class="w-full h-[71px] bg-[#1C110B] border-b border-[#594238] flex justify-between items-center px-5 shrink-0 z-30">
        <!-- Back Button -->
        <a href="{{ route('relatif.menu') }}" class="w-8 h-8 rounded-full border border-[#594238]/60 flex items-center justify-center text-[#E0C0B2] hover:bg-[#2A1D17] hover:text-white transition duration-200 active:scale-95">
            <!-- Left Chevron SVG -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>

        <!-- Title -->
        <h1 class="font-playfair text-[26px] font-semibold text-[#FFB595] tracking-wide select-none">
            Cart
        </h1>

        <!-- Balanced Spacer -->
        <div class="w-8 h-8 invisible"></div>
    </header>

    <!-- Main Scrollable Content Area -->
    <div class="flex-grow overflow-y-auto px-5 py-6 pb-[120px] md:pb-6" style="-ms-overflow-style: none; scrollbar-width: none;">
        <!-- Two-Column Responsive POS Split Grid -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 items-start">
            
            <!-- LEFT COLUMN: Items, Notes, & Payments (3/5 on large screen) -->
            <div class="flex flex-col gap-6 md:col-span-3">
                <!-- Cart Items List Container -->
                <section class="flex flex-col gap-3">
                    <h2 class="font-playfair text-xl font-medium text-[#F6DDD4] tracking-wide select-none">
                        Your Order
                    </h2>
                    <div id="cart-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-4">
                        <!-- Dynamically Rendered by JS -->
                    </div>
                </section>

                <!-- Order Note Section -->
                <section class="flex flex-col gap-3">
                    <h2 class="font-playfair text-xl font-medium text-[#F6DDD4] tracking-wide select-none">
                        Order Note
                    </h2>
                    <div class="w-full bg-[#251913] border border-[#594238]/50 rounded-lg p-0.5">
                        <textarea 
                            rows="2" 
                            placeholder="E.g. Less ice, normal sugar, extra hot..." 
                            class="w-full bg-transparent border-0 text-sm text-[#E0C0B2] placeholder-[#594238]/80 p-3 focus:ring-0 focus:outline-none resize-none font-montserrat"
                        ></textarea>
                    </div>
                </section>

                <!-- Payment Method Section -->
                <section class="flex flex-col gap-3">
                    <h2 class="font-playfair text-xl font-medium text-[#F6DDD4] tracking-wide select-none">
                        Payment Method
                    </h2>
                    <div class="grid grid-cols-3 gap-2.5">
                        <!-- QRIS (Active) -->
                        <div onclick="selectPayment('qris')" id="pay-qris" class="flex flex-col items-center justify-center gap-2.5 py-3.5 px-2 bg-[rgba(238,103,28,0.1)] border border-[#FFB595] rounded-lg cursor-pointer hover:border-[#FFB595] transition duration-200 select-none group">
                            <svg class="w-5 h-5 text-[#FFB595]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h.01M16 12h.01M21 12h.01M12 16h.01M12 20h.01M4 8h.01M4 12h.01M4 16h.01M4 20h.01M8 8h.01M8 12h.01M8 16h.01M8 20h.01M16 8h.01M16 16h.01M16 20h.01"></path>
                            </svg>
                            <span class="font-montserrat text-[10px] md:text-xs font-bold text-[#F6DDD4] uppercase tracking-wider text-center">QRIS</span>
                        </div>
                        <!-- E-Wallet -->
                        <div onclick="selectPayment('ewallet')" id="pay-ewallet" class="flex flex-col items-center justify-center gap-2.5 py-3.5 px-2 bg-[#2A1D17] border border-[#594238]/60 rounded-lg cursor-pointer hover:border-[#FFB595]/50 transition duration-200 select-none group">
                            <svg class="w-5 h-5 text-[#E0C0B2] group-hover:text-[#FFB595] transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            <span class="font-montserrat text-[10px] md:text-xs font-semibold text-[#E0C0B2] group-hover:text-[#F6DDD4] uppercase tracking-wider text-center">E-Wallet</span>
                        </div>
                        <!-- Card -->
                        <div onclick="selectPayment('card')" id="pay-card" class="flex flex-col items-center justify-center gap-2.5 py-3.5 px-2 bg-[#2A1D17] border border-[#594238]/60 rounded-lg cursor-pointer hover:border-[#FFB595]/50 transition duration-200 select-none group">
                            <svg class="w-5 h-5 text-[#E0C0B2] group-hover:text-[#FFB595] transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            <span class="font-montserrat text-[10px] md:text-xs font-semibold text-[#E0C0B2] group-hover:text-[#F6DDD4] uppercase tracking-wider text-center">Card</span>
                        </div>
                    </div>
                </section>
            </div>

            <!-- RIGHT COLUMN: Order Summary & Pay Action (2/5 on large screen) -->
            <div class="flex flex-col gap-4 md:col-span-2 md:sticky md:top-0">
                <!-- Order Summary Card -->
                <section class="w-full bg-[#251913] border border-[#594238]/60 rounded-lg p-5 flex flex-col gap-4 shadow-inner">
                    <h3 class="font-montserrat text-[11px] font-bold text-[#E0C0B2] uppercase tracking-widest border-b border-[#594238]/40 pb-2">
                        Order Summary
                    </h3>
                    
                    <div class="flex flex-col gap-3">
                        <!-- Subtotal -->
                        <div class="flex justify-between items-center text-sm font-montserrat">
                            <span class="text-[#E0C0B2]">Subtotal</span>
                            <span class="text-[#F6DDD4] font-medium" id="summary-subtotal">Rp 0</span>
                        </div>
                        
                        <!-- Member Discount -->
                        <div class="flex justify-between items-center text-sm font-montserrat">
                            <span class="text-[#AF8B47] font-medium">Member Discount (20%)</span>
                            <span class="text-[#AF8B47] font-semibold" id="summary-discount">- Rp 0</span>
                        </div>
                        
                        <!-- Tax -->
                        <div class="flex justify-between items-center text-sm font-montserrat">
                            <span class="text-[#E0C0B2]">Tax (11%)</span>
                            <span class="text-[#E0C0B2] font-medium" id="summary-tax">Rp 0</span>
                        </div>

                        <!-- Divider -->
                        <div class="w-full border-t border-[#594238]/30 my-1"></div>

                        <!-- Grand Total -->
                        <div class="flex justify-between items-center font-playfair">
                            <span class="text-lg font-medium text-[#F6DDD4]">Grand Total</span>
                            <span class="text-2xl font-bold text-[#FFB595] tracking-wide" id="summary-total">Rp 0</span>
                        </div>
                    </div>

                    <!-- Pinned Checkout Action Button (Tablet/Desktop Viewport only) -->
                    <div class="hidden md:block mt-2">
                        <button 
                            type="button" 
                            onclick="triggerCheckout()"
                            class="w-full h-[55px] bg-[#EE671C] hover:bg-[#d95316] text-[#4C1A00] rounded-sm font-montserrat text-sm font-bold uppercase tracking-wider flex justify-center items-center gap-3 shadow-lg hover:shadow-orange-950/40 transition duration-300 active:scale-[0.99] select-none"
                        >
                            Pay Now
                            <svg class="w-4 h-4 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <!-- Fixed Bottom Action Area (Mobile Viewport only) -->
    <div class="absolute bottom-0 left-0 w-full h-[104px] bg-[#2A1D17] border-t border-[#594238] px-5 py-4 flex items-center justify-center shadow-[0_-10px_30px_rgba(0,0,0,0.5)] shrink-0 z-30 md:hidden">
        <button 
            type="button" 
            onclick="triggerCheckout()"
            class="w-full h-[63px] bg-[#EE671C] hover:bg-[#d95316] text-[#4C1A00] rounded-sm font-montserrat text-base font-bold uppercase tracking-wider flex justify-center items-center gap-3 shadow-lg hover:shadow-orange-950/40 transition duration-300 active:scale-[0.99] select-none"
        >
            Pay Now
            <svg class="w-4 h-4 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>
    </div>

    <!-- Interactive JS to manage cart state in real-time -->
    <script>
        // Set dynamic state passed from controller
        let cartItems = @json($cartItems);
        let selectedPaymentMethod = 'qris';

        function renderCartItems() {
            const listEl = document.getElementById('cart-list');
            if (cartItems.length === 0) {
                listEl.innerHTML = `
                    <div class="flex flex-col items-center justify-center py-12 gap-4 col-span-full">
                        <svg class="w-16 h-16 text-[#594238]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <p class="font-montserrat text-sm text-[#E0C0B2]">Your cart is empty.</p>
                        <a href="{{ route('relatif.menu') }}" class="px-5 py-2.5 border border-[#594238] rounded-sm text-xs font-semibold text-[#FFB595] hover:bg-[#2A1D17] transition duration-200">
                            Return to Menu
                        </a>
                    </div>
                `;
                updateSummary(0);
                return;
            }

            let html = '';
            cartItems.forEach((item, index) => {
                html += `
                    <article class="w-full bg-[#2A1D17] border border-[#594238]/40 rounded-lg p-4 flex gap-4 transition duration-300 hover:border-[#FFB595]/30">
                        <!-- Image -->
                        <div class="w-20 h-20 bg-[#352721] rounded overflow-hidden shrink-0">
                            <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover">
                        </div>

                        <!-- Details Container -->
                        <div class="flex-grow flex flex-col justify-between gap-2 min-h-[80px]">
                            <!-- Title & Delete -->
                            <div class="flex justify-between items-start gap-2">
                                <div class="flex-grow">
                                    <h3 class="font-playfair text-base font-semibold text-[#F6DDD4] leading-tight">
                                        ${item.title}
                                    </h3>
                                    <p class="font-montserrat text-xs text-[#E0C0B2]/70 mt-1">
                                        ${item.options}
                                    </p>
                                </div>
                                <button onclick="deleteItem(${index})" class="text-[#E0C0B2] hover:text-[#EE671C] transition duration-200 p-1 rounded-full hover:bg-[#1C110B]/50 select-none active:scale-90 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Stepper & Price -->
                            <div class="flex justify-between items-center gap-4 mt-1">
                                <!-- Stepper wrapper -->
                                <div class="flex items-center bg-[#1C110B] border border-[#594238]/50 rounded-lg h-8 px-1 select-none">
                                    <button onclick="changeQty(${index}, -1)" class="w-7 h-6 rounded flex items-center justify-center text-[#E0C0B2] hover:bg-[#2A1D17] active:scale-95 transition duration-150">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="w-8 text-center text-sm font-semibold text-[#F6DDD4] font-montserrat">
                                        ${item.qty}
                                    </span>
                                    <button onclick="changeQty(${index}, 1)" class="w-7 h-6 rounded flex items-center justify-center text-[#E0C0B2] hover:bg-[#2A1D17] active:scale-95 transition duration-150">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Total Item Price -->
                                <span class="font-montserrat text-base font-semibold text-[#FFB595] whitespace-nowrap">
                                    Rp ${(item.price * item.qty).toLocaleString('id-ID')}
                                </span>
                            </div>
                        </div>
                    </article>
                `;
            });
            listEl.innerHTML = html;
            calculateTotals();
        }

        function changeQty(index, delta) {
            cartItems[index].qty += delta;
            if (cartItems[index].qty < 1) {
                cartItems[index].qty = 1;
            }
            renderCartItems();
        }

        function deleteItem(index) {
            cartItems.splice(index, 1);
            renderCartItems();
        }

        function selectPayment(method) {
            selectedPaymentMethod = method;
            
            // Remove active style from all payment options
            ['pay-qris', 'pay-ewallet', 'pay-card'].forEach(id => {
                const el = document.getElementById(id);
                el.classList.remove('bg-[rgba(238,103,28,0.1)]', 'border-[#FFB595]');
                el.classList.add('bg-[#2A1D17]', 'border-[#594238]/60');
                
                const svg = el.querySelector('svg');
                svg.classList.remove('text-[#FFB595]');
                svg.classList.add('text-[#E0C0B2]');

                const text = el.querySelector('span');
                text.classList.remove('font-bold', 'text-[#F6DDD4]');
                text.classList.add('font-semibold', 'text-[#E0C0B2]');
            });

            // Set active style for selected one
            const activeEl = document.getElementById(`pay-${method}`);
            activeEl.classList.remove('bg-[#2A1D17]', 'border-[#594238]/60');
            activeEl.classList.add('bg-[rgba(238,103,28,0.1)]', 'border-[#FFB595]');
            
            const activeSvg = activeEl.querySelector('svg');
            activeSvg.classList.add('text-[#FFB595]');
            activeSvg.classList.remove('text-[#E0C0B2]');

            const activeText = activeEl.querySelector('span');
            activeText.classList.add('font-bold', 'text-[#F6DDD4]');
            activeText.classList.remove('font-semibold', 'text-[#E0C0B2]');
        }

        function calculateTotals() {
            let subtotal = 0;
            cartItems.forEach(item => {
                subtotal += item.price * item.qty;
            });
            updateSummary(subtotal);
        }

        function updateSummary(subtotal) {
            const discount = subtotal * 0.20;
            const taxable = subtotal - discount;
            const tax = taxable * 0.11;
            const total = taxable + tax;

            document.getElementById('summary-subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('summary-discount').textContent = `- Rp ${discount.toLocaleString('id-ID')}`;
            document.getElementById('summary-tax').textContent = `Rp ${Math.round(tax).toLocaleString('id-ID')}`;
            document.getElementById('summary-total').textContent = `Rp ${Math.round(total).toLocaleString('id-ID')}`;
        }

        function triggerCheckout() {
            if (cartItems.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            
            // Build custom order details and save to localStorage
            const grandTotal = document.getElementById('summary-total').textContent;
            const purchaseInfo = {
                order_number: '#ORD-' + Math.floor(Math.random() * 9000 + 1000),
                amount_paid: grandTotal,
                payment_method: selectedPaymentMethod.toUpperCase(),
                items: cartItems.map(item => ({
                    qty: item.qty,
                    title: item.title,
                    options: item.options
                })),
                status: 'Being Prepared by Barista',
                est_time: '5 Min'
            };
            
            localStorage.setItem('relatif_latest_order', JSON.stringify(purchaseInfo));
            
            // Redirect to the Payment Gateway page!
            window.location.href = "{{ route('relatif.payment') }}";
        }

        // Initialize view on load
        renderCartItems();
    </script>
@endsection

