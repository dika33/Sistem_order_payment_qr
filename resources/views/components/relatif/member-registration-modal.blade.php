<!-- Member Registration Modal Overlay -->
<div id="member-registration-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <!-- Backdrop Blur with dark moody coffee image -->
    <div class="absolute inset-0 bg-[#1C110B]/90 backdrop-blur-[6px] transition-opacity duration-300">
        <!-- Blurred background texture -->
        <div class="absolute inset-0 bg-cover bg-center opacity-30 mix-blend-overlay filter blur-[4px]" style="background-image: url('https://images.unsplash.com/photo-1498804103079-a6351b050096?auto=format&fit=crop&q=80&w=800');"></div>
    </div>

    <!-- Modal Content Card -->
    <div class="relative w-full max-w-[360px] bg-[#2A1D17] border border-[#594238] rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.9)] overflow-hidden transform scale-95 opacity-0 transition-all duration-300 z-10" id="member-modal-card">
        <!-- Subtle Top Gradient Border Accent -->
        <div class="h-[4px] w-full bg-gradient-to-r from-[#1C110B] via-[#FFB595] to-[#1C110B]"></div>

        <!-- Close button top-right -->
        <button onclick="closeMemberModal()" class="absolute top-4 right-4 text-[#E0C0B2]/60 hover:text-[#FFB595] p-1.5 rounded-full hover:bg-white/5 active:scale-95 transition duration-150 select-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Initial Form State -->
        <div id="modal-form-content" class="p-8 flex flex-col gap-6">
            <!-- Header Section -->
            <div class="flex flex-col gap-2.5 mt-2">
                <h2 class="font-playfair text-[38px] font-bold text-[#FFB595] leading-none text-center select-none">
                    Join the Club
                </h2>
                <p class="font-montserrat text-sm text-[#E0C0B2] text-center leading-relaxed">
                    Enter your name to claim your 20% member discount.
                </p>
            </div>

            <!-- Input Field Group -->
            <div class="flex flex-col gap-1.5 mt-2">
                <label for="member-input-name" class="font-montserrat text-[10px] font-bold text-[#E0C0B2]/70 uppercase tracking-widest select-none">
                    NAME
                </label>
                <div class="border-b border-[#594238] focus-within:border-[#FFB595] transition duration-200">
                    <input type="text" id="member-input-name" placeholder="e.g. John Doe" class="w-full bg-transparent border-none text-[#F6DDD4] font-montserrat text-base focus:outline-none focus:ring-0 py-2.5 px-0 placeholder-[#E0C0B2]/30" autocomplete="off" required>
                </div>
                <p id="member-error-text" class="text-red-400 font-montserrat text-[10px] hidden select-none mt-1">Please enter a valid name.</p>
            </div>

            <!-- Action Button -->
            <button onclick="submitMemberRegistration()" class="w-full h-14 bg-[#EE671C] hover:bg-[#d65510] text-[#4C1A00] rounded-sm font-playfair font-bold text-lg flex items-center justify-center gap-2 transition duration-200 shadow-[0_4px_14px_rgba(238,103,28,0.3)] active:scale-[0.98] mt-2">
                Claim Voucher
                <svg class="w-5 h-5 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>

            <!-- Bottom Agreement Terms -->
            <p class="font-montserrat text-[10px] text-center text-[#E0C0B2]/50 leading-relaxed max-w-[240px] mx-auto select-none mt-2">
                By joining, you agree to our terms of service and privacy policy.
            </p>
        </div>

        <!-- Success Result State (Hidden Initially) -->
        <div id="modal-success-content" class="p-8 flex flex-col gap-6 items-center text-center hidden">
            <!-- Pulsing Checkmark -->
            <div class="w-20 h-20 bg-[rgba(238,103,28,0.08)] border border-[#FFB595]/30 rounded-full flex items-center justify-center text-[#FFB595] shadow-lg shadow-orange-950/20 relative mt-4 select-none">
                <div class="absolute inset-0 bg-[#FFB595]/5 animate-ping rounded-full duration-1000"></div>
                <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4"></path>
                </svg>
            </div>

            <div class="flex flex-col gap-2">
                <h3 class="font-playfair text-[32px] font-semibold text-[#FFB595] leading-tight">
                    Welcome!
                </h3>
                <p class="font-montserrat text-sm text-[#E0C0B2] leading-relaxed">
                    Welcome to the club, <strong id="success-member-name" class="text-[#F6DDD4]">John Doe</strong>!<br>
                    Your <strong class="text-[#EE671C]">20% VIP Discount</strong> is now active on all orders.
                </p>
            </div>

            <button onclick="closeMemberModal()" class="w-full h-12 bg-transparent hover:bg-white/5 border border-[#594238] text-[#FFB595] font-montserrat font-bold text-xs uppercase tracking-wider rounded-sm transition duration-200 mt-4 active:scale-95">
                Awesome, Let's Order
            </button>
        </div>
    </div>
</div>

<script>
    // Global opens & closes modal controllers
    function openMemberModal() {
        const modal = document.getElementById('member-registration-modal');
        const card = document.getElementById('member-modal-card');
        
        // Reset state
        document.getElementById('member-input-name').value = '';
        document.getElementById('member-error-text').classList.add('hidden');
        document.getElementById('modal-form-content').classList.remove('hidden');
        document.getElementById('modal-success-content').classList.add('hidden');

        // Reveal
        modal.classList.remove('hidden');
        setTimeout(() => {
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeMemberModal() {
        const modal = document.getElementById('member-registration-modal');
        const card = document.getElementById('member-modal-card');
        
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function submitMemberRegistration() {
        const nameInput = document.getElementById('member-input-name');
        const errorText = document.getElementById('member-error-text');
        const name = nameInput.value.trim();

        if (name.length < 2) {
            errorText.classList.remove('hidden');
            return;
        }

        errorText.classList.add('hidden');

        // Save member details in localStorage
        localStorage.setItem('relatif_member_name', name);
        localStorage.setItem('relatif_is_member', 'true');

        // Display Success State
        document.getElementById('success-member-name').textContent = name;
        document.getElementById('modal-form-content').classList.add('hidden');
        document.getElementById('modal-success-content').classList.remove('hidden');

        // Dispatch Custom Event to update pages instantly in real-time
        window.dispatchEvent(new Event('relatif_member_registered'));
    }

    // Auto-focus input when modal opens
    document.getElementById('member-registration-modal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('member-registration-modal')) {
            closeMemberModal();
        }
    });
</script>

