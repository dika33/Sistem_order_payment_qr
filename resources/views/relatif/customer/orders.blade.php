@extends('layouts.relatif')

@section('title', 'Relatif - Track Order')

@section('content')
    <!-- Header component -->
    <x-relatif.header />

    <!-- Main Scrollable Content Area -->
    <div class="flex-grow overflow-y-auto px-5 py-6 flex flex-col gap-6 items-center pb-[120px]" style="-ms-overflow-style: none; scrollbar-width: none;">
        
        <!-- Success Indicator Container -->
        <section class="flex flex-col items-center text-center gap-4 mt-2">
            <!-- Pulsing checkmark badge -->
            <div class="w-20 h-20 bg-[rgba(238,103,28,0.08)] border border-[#FFB595]/30 rounded-full flex items-center justify-center text-[#FFB595] shadow-lg shadow-orange-950/20 relative">
                <div class="absolute inset-0 bg-[#FFB595]/5 animate-ping rounded-full duration-1000"></div>
                <svg class="w-9 h-9 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4"></path>
                </svg>
            </div>

            <div class="flex flex-col gap-2">
                <h1 class="font-playfair text-[26px] font-semibold text-[#F6DDD4] tracking-wide select-none">
                    Payment Successful
                </h1>
                <p class="font-montserrat text-sm text-[#E0C0B2] leading-relaxed max-w-[290px] mx-auto select-none">
                    Your order has been received and sent to the baristas.
                </p>
            </div>
        </section>

        <!-- Order Tracking Card -->
        <section class="w-full bg-[#2A1D17] border border-[#594238]/40 rounded-lg shadow-lg relative flex flex-col overflow-hidden">
            <!-- Top Gradient Border Accent -->
            <div class="h-[4px] w-full bg-gradient-to-r from-[#1C110B] via-[#FFB595] to-[#1C110B]"></div>

            <div class="p-5 flex flex-col gap-5">
                <!-- Info Grid (Order Number & Total Paid) -->
                <div class="flex justify-between items-start border-b border-[#594238]/30 pb-4">
                    <div class="flex flex-col gap-0.5">
                        <span class="font-montserrat text-[11px] font-bold text-[#E0C0B2]/70 uppercase tracking-wider select-none">Order Number</span>
                        <h2 class="font-playfair text-xl font-medium text-[#FFB595] tracking-wide" id="track-order-number">
                            {{ $defaultOrder['order_number'] }}
                        </h2>
                    </div>
                    <div class="flex flex-col gap-0.5 items-end">
                        <span class="font-montserrat text-[11px] font-bold text-[#E0C0B2]/70 uppercase tracking-wider select-none">Amount Paid</span>
                        <h2 class="font-montserrat text-lg font-semibold text-[#F6DDD4]" id="track-amount-paid">
                            Rp {{ number_format($defaultOrder['amount_paid'], 0, ',', '.') }}
                        </h2>
                    </div>
                </div>

                <!-- Status Pill (Prep status) -->
                <div class="w-full bg-[rgba(175,139,71,0.15)] border border-[rgba(175,139,71,0.4)] rounded-lg p-3.5 flex justify-between items-center select-none shadow-inner">
                    <div class="flex items-center gap-3">
                        <!-- Brewing loading spinner -->
                        <div class="w-6 h-6 rounded-full flex items-center justify-center bg-[rgba(175,139,71,0.1)]">
                            <svg class="w-4 h-4 animate-spin text-[#E9C176]" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </div>
                        <span class="font-montserrat text-sm font-semibold text-[#E9C176] tracking-wide" id="track-status">
                            {{ $defaultOrder['status'] }}
                        </span>
                    </div>
                    <span class="font-montserrat text-xs font-medium text-[#E9C176]/90" id="track-time">
                        (Est. {{ $defaultOrder['est_time'] }})
                    </span>
                </div>

                <!-- Details Section -->
                <div class="flex flex-col gap-3">
                    <h3 class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest select-none">
                        Order Details
                    </h3>
                    <div id="track-items-list" class="flex flex-col gap-3.5">
                        <!-- Dynamically Rendered by JS -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Back to Menu button (In-content Action) -->
        <a href="{{ route('relatif.menu') }}" class="w-full h-[52px] border border-[#594238]/60 hover:border-[#FFB595]/50 bg-[#2A1D17] hover:bg-[#1C110B] rounded-sm text-sm font-bold font-montserrat text-[#FFB595] uppercase tracking-wider flex justify-center items-center gap-2.5 transition duration-300 active:scale-[0.99] select-none mt-2 shadow">
            Back to Menu
            <svg class="w-3.5 h-3.5 text-[#FFB595]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

    </div>

    <!-- Pinned Bottom Navigation Bar -->
    <x-relatif.bottom-navbar />

    <!-- Interactive JS to link checkout state to tracking card -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Read active order from localStorage
            const stored = localStorage.getItem('relatif_latest_order');
            let order = null;
            
            if (stored) {
                try {
                    order = JSON.parse(stored);
                } catch (e) {
                    console.error('Error parsing stored order:', e);
                }
            }

            // Fallback mock order if none exists
            if (!order) {
                order = {
                    order_number: "#ORD-4829",
                    amount_paid: "Rp 102.120",
                    items: [
                        { qty: 2, title: "Cortado", options: "Oat Milk" },
                        { qty: 1, title: "Almond Croissant", options: "Warm" }
                    ],
                    status: "Being Prepared by Barista",
                    est_time: "5 Min"
                };
            }

            // Set UI details
            document.getElementById('track-order-number').textContent = order.order_number;
            document.getElementById('track-amount-paid').textContent = order.amount_paid;
            document.getElementById('track-status').textContent = order.status;
            document.getElementById('track-time').textContent = `(Est. ${order.est_time})`;

            // Render items
            const itemsListEl = document.getElementById('track-items-list');
            let html = '';
            
            order.items.forEach((item, index) => {
                html += `
                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-start">
                            <span class="font-montserrat text-[15px] font-semibold text-[#F6DDD4] tracking-wide">
                                ${item.qty}x ${item.title}
                             </span>
                             <span class="font-montserrat text-xs text-[#E0C0B2]/60">
                                 ${item.options || 'Standard'}
                             </span>
                         </div>
                 `;
                 
                 // Add border divider if not last item
                 if (index < order.items.length - 1) {
                     html += `
                         <div class="w-full border-t border-[#594238]/30 my-0.5"></div>
                     `;
                 }
                 
                 html += `</div>`;
             });
             
             itemsListEl.innerHTML = html;
         });
     </script>
 @endsection
