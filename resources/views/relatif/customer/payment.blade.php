@extends('layouts.relatif')

@section('title', 'Relatif - Secure Payment')

@section('content')
    <!-- Top Header Navigation -->
    <header class="w-full h-[78px] bg-[#1C110B] border-b border-[#594238] flex items-center justify-center relative shrink-0">
        <!-- Back Button -->
        <a href="{{ route('relatif.cart') }}" class="absolute left-4 p-2 rounded-full hover:bg-white/5 text-[#E0C0B2] hover:text-[#FFB595] active:scale-95 transition duration-150 select-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>

        <!-- Title -->
        <div class="flex flex-col items-center">
            <h1 class="font-playfair text-[24px] font-semibold text-[#FFB595] leading-tight select-none">
                Relatif
            </h1>
            <span class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest leading-none mt-0.5 select-none">
                Secure Checkout
            </span>
        </div>
    </header>

    <!-- Main Scrollable Canvas -->
    <div class="flex-grow overflow-y-auto px-5 py-6 flex flex-col gap-6 pb-[120px]" style="-ms-overflow-style: none; scrollbar-width: none;">
        
        <!-- Order Summary Card -->
        <section class="w-full bg-[#2A1D17]/40 border border-[#594238]/60 rounded-xl p-5 flex flex-col gap-4 shadow-md">
            <div class="flex justify-between items-center pb-3 border-b border-[#594238]/60">
                <span class="font-montserrat text-sm font-semibold text-[#E0C0B2]">Order Total</span>
                <span id="payment-amount" class="font-playfair text-2xl font-bold text-[#FFB595]">Rp 102.120</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-montserrat text-xs text-[#E0C0B2]/70 font-medium">Payment Method</span>
                <span id="payment-method-badge" class="px-3 py-1 bg-[#EE671C]/10 border border-[#EE671C]/30 text-[#EE671C] rounded-full font-montserrat text-xs font-bold uppercase tracking-wider select-none">
                    QRIS
                </span>
            </div>
        </section>

        <!-- DYNAMIC CONTENT VIEWPORTS -->
        
        <!-- 1. QRIS/E-Wallet View (Visible when QRIS or E-WALLET is chosen) -->
        <section id="qris-payment-section" class="w-full bg-[#2A1D17] border border-[#594238] rounded-xl p-6 flex flex-col gap-6 items-center shadow-lg relative overflow-hidden">
            <!-- Subtle Radial Amber Glow behind QR -->
            <div class="absolute w-[200px] h-[200px] bg-[#FFB595]/5 blur-[60px] rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

            <div class="flex flex-col gap-1.5 items-center text-center z-10">
                <h2 class="font-playfair text-[22px] font-semibold text-[#FFB595] select-none">Scan to Pay</h2>
                <p class="font-montserrat text-xs text-[#E0C0B2] leading-relaxed max-w-[260px]">
                    Open your M-Banking or E-Wallet app and scan the QR code below.
                </p>
            </div>

            <!-- QR Container Frame -->
            <div class="relative p-4 bg-white rounded-xl shadow-2xl z-10 transform hover:scale-[1.02] transition duration-200">
                <!-- SVG High-Tech Mock QR Code -->
                <svg class="w-[200px] h-[200px] text-[#1C110B]" viewBox="0 0 100 100" fill="currentColor">
                    <!-- Outer borders -->
                    <path d="M5,5 h30 v30 h-30 z M10,10 h20 v20 h-20 z" />
                    <path d="M65,5 h30 v30 h-30 z M70,10 h20 v20 h-20 z" />
                    <path d="M5,65 h30 v30 h-30 z M10,70 h20 v20 h-20 z" />
                    <!-- Random QR bits vectors -->
                    <path d="M15,15 h5 v5 h-5 z M25,25 h5 v5 h-5 z M75,15 h5 v5 h-5 z M85,25 h5 v5 h-5 z M15,75 h5 v5 h-5 z M25,85 h5 v5 h-5 z" />
                    <!-- Center and inner blocks -->
                    <path d="M40,5 h10 v5 h-10 z M45,15 h15 v5 h-15 z M40,25 h5 v10 h-5 z M50,30 h10 v5 h-10 z" />
                    <path d="M5,40 h15 v5 h-15 z M10,50 h5 v15 h-5 z M25,40 h10 v5 h-10 z M30,55 h10 v10 h-10 z" />
                    <path d="M40,40 h10 v10 h-10 z M55,40 h15 v5 h-15 z M60,50 h10 v5 h-10 z M40,55 h15 v5 h-15 z" />
                    <path d="M75,40 h20 v5 h-20 z M80,50 h5 v15 h-5 z M90,55 h5 v10 h-5 z" />
                    <path d="M40,70 h15 v5 h-15 z M45,80 h10 v10 h-10 z M60,65 h5 v25 h-5 z M75,70 h10 v5 h-10 z M85,80 h10 v10 h-10 z" />
                    <!-- Center Brand Logo Mockup Spot -->
                    <rect x="42" y="42" width="16" height="16" rx="3" fill="#EE671C" />
                    <path d="M47,47 h6 v6 h-6 z" fill="#FFFFFF" />
                </svg>
            </div>

            <!-- Awaiting payment pulse pill -->
            <div class="flex items-center gap-2 px-5 py-2.5 bg-[#1C110B] border border-[#594238] rounded-full text-xs font-semibold text-[#E0C0B2] shadow-inner select-none animate-pulse z-10">
                <span class="w-2.5 h-2.5 rounded-full bg-[#EE671C] animate-ping"></span>
                <span>Awaiting Payment...</span>
            </div>
        </section>

        <!-- 2. CARD Form View (Visible when CARD is chosen) -->
        <section id="card-payment-section" class="w-full flex flex-col gap-6 hidden">
            
            <!-- Beautiful Credit Card Graphic -->
            <div class="relative w-full aspect-[1.586/1] bg-gradient-to-br from-[#EE671C] via-[#d35400] to-[#4C1A00] border border-[#FFB595]/30 rounded-2xl p-6 flex flex-col justify-between shadow-xl overflow-hidden group select-none">
                <!-- Abstract Waves in Card Graphic -->
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_bottom_left,white_20%,transparent_60%)] pointer-events-none"></div>
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full blur-2xl group-hover:scale-110 transition duration-300 pointer-events-none"></div>

                <!-- Top Row: Chip & Contactless -->
                <div class="flex justify-between items-start z-10">
                    <!-- Mock Card Chip -->
                    <div class="w-12 h-9 bg-gradient-to-r from-amber-200 to-yellow-500 rounded-md border border-amber-300 shadow-inner flex flex-col justify-around p-1">
                        <div class="w-full h-0.5 bg-black/10"></div>
                        <div class="w-full h-0.5 bg-black/10"></div>
                    </div>
                    <!-- Contactless Icon -->
                    <svg class="w-8 h-8 text-[#FFB595]/80" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3a9 9 0 0 0-9 9M9 6a6 6 0 0 0-6 6M6 9a3 3 0 0 0-3 3M15 0a12 12 0 0 0-12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>

                <!-- Middle Row: Card Number Mock -->
                <div class="z-10">
                    <span id="card-graphic-number" class="font-mono text-xl md:text-2xl text-white tracking-[0.18em] drop-shadow-md">
                        •••• •••• •••• ••••
                    </span>
                </div>

                <!-- Bottom Row: Holder & Expiry -->
                <div class="flex justify-between items-end z-10">
                    <div class="flex flex-col">
                        <span class="text-[8px] font-bold text-[#E0C0B2] uppercase tracking-wider">Cardholder Name</span>
                        <span id="card-graphic-name" class="font-montserrat text-sm font-semibold text-white tracking-wide truncate max-w-[180px]">
                            John Doe
                        </span>
                    </div>
                    <div class="flex flex-col text-right">
                        <span class="text-[8px] font-bold text-[#E0C0B2] uppercase tracking-wider">Expires</span>
                        <span id="card-graphic-expiry" class="font-mono text-sm font-semibold text-white tracking-widest">
                            MM/YY
                        </span>
                    </div>
                </div>
            </div>

            <!-- Card Interactive Form Fields -->
            <div class="w-full bg-[#2A1D17]/40 border border-[#594238]/60 rounded-xl p-6 flex flex-col gap-4 shadow-md">
                
                <!-- Cardholder Name Field -->
                <div class="flex flex-col gap-1.5">
                    <label for="card-holder-name" class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">
                        CARDHOLDER NAME
                    </label>
                    <input type="text" id="card-holder-name" placeholder="John Doe" class="w-full bg-[#1C110B] border border-[#594238] focus:border-[#FFB595] text-[#F6DDD4] font-montserrat text-sm rounded-lg focus:outline-none focus:ring-0 py-3 px-4 placeholder-[#E0C0B2]/20" autocomplete="off" required>
                </div>

                <!-- Card Number Field -->
                <div class="flex flex-col gap-1.5">
                    <label for="card-number" class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">
                        CARD NUMBER
                    </label>
                    <input type="text" id="card-number" placeholder="4111 2222 3333 4444" maxlength="19" class="w-full bg-[#1C110B] border border-[#594238] focus:border-[#FFB595] text-[#F6DDD4] font-mono text-sm rounded-lg focus:outline-none focus:ring-0 py-3 px-4 placeholder-[#E0C0B2]/20" autocomplete="off" required>
                </div>

                <!-- Expiry & CVV Twin Fields -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label for="card-expiry" class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">
                            EXPIRATION
                        </label>
                        <input type="text" id="card-expiry" placeholder="MM/YY" maxlength="5" class="w-full bg-[#1C110B] border border-[#594238] focus:border-[#FFB595] text-[#F6DDD4] font-mono text-sm rounded-lg focus:outline-none focus:ring-0 py-3 px-4 placeholder-[#E0C0B2]/20 text-center" autocomplete="off" required>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="card-cvv" class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">
                            CVV
                        </label>
                        <input type="password" id="card-cvv" placeholder="•••" maxlength="3" class="w-full bg-[#1C110B] border border-[#594238] focus:border-[#FFB595] text-[#F6DDD4] font-mono text-sm rounded-lg focus:outline-none focus:ring-0 py-3 px-4 placeholder-[#E0C0B2]/20 text-center" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Pinned Bottom Simulate Action Area -->
    <div class="absolute bottom-0 left-0 right-0 h-[104px] bg-[#2A1D17] border-t border-[#594238] px-5 py-4 flex items-center justify-center shadow-[0_-10px_30px_rgba(0,0,0,0.5)] z-20 shrink-0">
        <button onclick="simulateSuccessfulPayment()" id="payment-submit-btn" class="w-full h-14 bg-[#EE671C] hover:bg-[#d65510] text-[#4C1A00] font-playfair font-bold text-[20px] rounded-lg shadow-[0_4px_14px_rgba(238,103,28,0.3)] active:scale-[0.98] transition duration-200 flex items-center justify-center gap-2 select-none">
            Simulate Successful Payment
            <svg class="w-5 h-5 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4"></path>
            </svg>
        </button>
    </div>

    <!-- Full-Screen Verifying Payment Loader Overlay (Hidden by Default) -->
    <div id="payment-loader-overlay" class="fixed inset-0 z-50 bg-[#1C110B]/95 flex flex-col items-center justify-center p-6 hidden select-none">
        <!-- Giant Rotating Spinner -->
        <div class="relative w-24 h-24 flex items-center justify-center">
            <!-- Background pulse -->
            <div class="absolute inset-0 bg-[#EE671C]/5 rounded-full animate-ping duration-1000"></div>
            <!-- Spinner -->
            <svg class="w-20 h-20 text-[#EE671C] animate-spin" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="rgba(238,103,28,0.1)" stroke-width="6" fill="none" />
                <path d="M50,10 a40,40 0 0,1 40,40" stroke="currentColor" stroke-width="6" stroke-linecap="round" fill="none" />
            </svg>
        </div>

        <!-- Verification Message Logs -->
        <div class="flex flex-col gap-2.5 text-center mt-8">
            <h3 id="loader-title" class="font-playfair text-[26px] font-bold text-[#FFB595]">
                Verifying Payment
            </h3>
            <p id="loader-subtitle" class="font-montserrat text-sm text-[#E0C0B2]/80 leading-relaxed min-h-[40px]">
                Initiating secure verification protocol...
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Load details from localStorage
            const orderDataRaw = localStorage.getItem('relatif_latest_order');
            
            let grandTotal = 'Rp 102.120';
            let method = 'QRIS';

            if (orderDataRaw) {
                const orderData = JSON.parse(orderDataRaw);
                grandTotal = orderData.amount_paid;
                method = orderData.payment_method || 'QRIS';
            }

            // Set content details
            document.getElementById('payment-amount').textContent = grandTotal;
            
            const badge = document.getElementById('payment-method-badge');
            badge.textContent = method;

            // Conditional view switching depending on card vs scan
            const qrisSection = document.getElementById('qris-payment-section');
            const cardSection = document.getElementById('card-payment-section');
            const submitBtn = document.getElementById('payment-submit-btn');

            if (method.toUpperCase() === 'CARD') {
                qrisSection.classList.add('hidden');
                cardSection.classList.remove('hidden');
                submitBtn.innerHTML = `Pay Securely <svg class="w-5 h-5 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>`;
            }

            // Card Interactive Sync Listeners
            const nameInput = document.getElementById('card-holder-name');
            const numberInput = document.getElementById('card-number');
            const expiryInput = document.getElementById('card-expiry');

            if (nameInput) {
                nameInput.addEventListener('input', (e) => {
                    const val = e.target.value.trim();
                    document.getElementById('card-graphic-name').textContent = val.length > 0 ? val : 'John Doe';
                });
            }

            if (numberInput) {
                numberInput.addEventListener('input', (e) => {
                    let val = e.target.value.replace(/\D/g, '');
                    // Format into blocks of 4
                    let formatted = val.match(/.{1,4}/g);
                    e.target.value = formatted ? formatted.join(' ') : '';
                    
                    document.getElementById('card-graphic-number').textContent = e.target.value.length > 0 ? e.target.value : '•••• •••• •••• ••••';
                });
            }

            if (expiryInput) {
                expiryInput.addEventListener('input', (e) => {
                    let val = e.target.value.replace(/\D/g, '');
                    if (val.length > 2) {
                        val = val.slice(0, 2) + '/' + val.slice(2, 4);
                    }
                    e.target.value = val;
                    document.getElementById('card-graphic-expiry').textContent = val.length > 0 ? val : 'MM/YY';
                });
            }
        });

        // Trigger secure transactional simulation loader
        function simulateSuccessfulPayment() {
            const methodBadge = document.getElementById('payment-method-badge').textContent.toUpperCase();
            
            // If card method is active, perform simple input validations
            if (methodBadge === 'CARD') {
                const name = document.getElementById('card-holder-name').value.trim();
                const num = document.getElementById('card-number').value.replace(/\s/g, '');
                const exp = document.getElementById('card-expiry').value.trim();
                const cvv = document.getElementById('card-cvv').value.trim();

                if (name.length < 2 || num.length !== 16 || exp.length !== 5 || cvv.length !== 3) {
                    alert('Please enter valid credit card details to complete payment!');
                    return;
                }
            }

            const loader = document.getElementById('payment-loader-overlay');
            const subtitle = document.getElementById('loader-subtitle');
            
            // Show loader
            loader.classList.remove('hidden');

            // Phase messages sequence
            setTimeout(() => {
                subtitle.textContent = "Connecting to secure banking gateway...";
            }, 600);

            setTimeout(() => {
                subtitle.textContent = "Processing and approving transaction...";
            }, 1200);

            setTimeout(() => {
                subtitle.textContent = "Payment approved! Finalizing order sequence...";
            }, 1800);

            // Redirect
            setTimeout(() => {
                window.location.href = "{{ route('relatif.orders') }}";
            }, 2400);
        }
    </script>
@endsection
