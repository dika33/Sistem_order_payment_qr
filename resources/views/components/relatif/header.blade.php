<header class="w-full h-[110px] bg-[#1C110B] border-b border-[#594238] flex justify-between items-center px-5 py-4 shrink-0">
    <!-- Brand Name -->
    <div class="flex items-center gap-2">
        <h1 class="font-playfair text-[28px] font-semibold text-[#FFB595] leading-tight select-none">
            Relatif
        </h1>
    </div>

    <!-- Table & Actions -->
    <div class="flex items-center gap-4">
        <!-- Table Number -->
        <div class="flex items-center gap-1">
            <span class="font-montserrat text-sm text-[#E0C0B2] leading-tight text-right">
                Table<br><strong class="font-semibold text-[#FFB595]">04</strong>
            </span>
            <!-- Small Indicator Icon -->
            <svg class="w-2.5 h-3 text-[#EE671C] animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
            </svg>
        </div>

        <!-- Login Button -->
        <a id="header-member-btn" href="{{ route('relatif.login') }}" class="px-4 py-1.5 border border-[#594238] rounded-sm text-xs font-semibold text-[#E0C0B2] hover:bg-[#2A1D17] hover:text-white transition duration-200 uppercase tracking-wider select-none active:scale-95 text-center flex items-center justify-center">
            Login
        </a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function updateHeaderMember() {
            const btn = document.getElementById('header-member-btn');
            if (!btn) return;
            
            const staffName = localStorage.getItem('relatif_staff_name');
            const memberName = localStorage.getItem('relatif_member_name');
            
            if (staffName) {
                btn.innerHTML = `<span class="text-[#FFB595] font-bold mr-1">&#9733; STAFF</span>&nbsp;${staffName}`;
                btn.classList.add('border-[#FFB595]/50');
                btn.href = "{{ route('relatif.login') }}";
            } else if (memberName) {
                btn.innerHTML = `<span class="text-[#FFB595] font-bold mr-1">&#9733; VIP</span>&nbsp;${memberName.split(' ')[0]}`;
                btn.classList.add('border-[#FFB595]/50');
                btn.href = "#";
            } else {
                btn.textContent = 'Login';
                btn.classList.remove('border-[#FFB595]/50');
                btn.href = "{{ route('relatif.login') }}";
            }
        }
        
        updateHeaderMember();
        window.addEventListener('relatif_member_registered', updateHeaderMember);
        window.addEventListener('relatif_staff_login_state', updateHeaderMember);
    });
</script>

