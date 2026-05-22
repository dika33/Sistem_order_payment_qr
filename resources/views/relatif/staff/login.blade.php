<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatif - POS Staff Access</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS Compiler -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[#1C110B] text-[#F6DDD4] font-montserrat flex items-center justify-center relative overflow-hidden select-none">

    <!-- Moody Full Screen Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=1200" 
             class="w-full h-full object-cover filter blur-[2px] scale-105" 
             alt="Coffee Background">
        <!-- Figma Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/80"></div>
    </div>

    <!-- Decorative Top Bar -->
    <div class="absolute top-0 left-0 right-0 h-[60px] px-6 flex justify-between items-center z-10 select-none">
        <!-- Left: Network Connection Info -->
        <div class="flex items-center gap-2 text-xs font-semibold text-[#E0C0B2]/60">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <span>Network: Stable</span>
        </div>
        <!-- Right: Battery & Signal Icons -->
        <div class="flex items-center gap-4 text-xs font-semibold text-[#E0C0B2]/60">
            <div class="flex items-center gap-1.5">
                <span>98%</span>
                <!-- Custom SVG Battery Icon -->
                <svg class="w-5 h-3 text-[#E0C0B2]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="2" y="5" width="18" height="14" rx="2" stroke-width="2.5"></rect>
                    <path d="M22 10v4" stroke-width="2.5" stroke-linecap="round"></path>
                    <rect x="4" y="7" width="12" height="10" fill="currentColor" class="text-emerald-500"></rect>
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Content Container Frame -->
    <main class="w-full max-w-[448px] px-4 z-10 transition duration-300">
        
        <!-- CARD 1: LOGIN FORM CARD -->
        <div id="login-form-card" class="w-full bg-[#40312B] border border-[#594238]/60 shadow-[0_40px_80px_rgba(0,0,0,0.9)] rounded p-8 flex flex-col gap-8 relative overflow-hidden transition-all duration-300">
            <!-- Subtle Roasted Beans Overlay Grid (using a beautiful subtle radial shading) -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,#FFB595/3_0%,transparent_70%)] pointer-events-none"></div>

            <!-- Card Header Section -->
            <div class="flex flex-col items-center gap-2 text-center relative z-10">
                <div class="flex items-center gap-3">
                    <h2 class="font-playfair text-[32px] font-semibold text-[#FFB595] tracking-wide">
                        Relatif
                    </h2>
                    <!-- Gold Key/Padlock Icon -->
                    <svg class="w-6 h-6 text-[#FFB595] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-[#E0C0B2]/60 uppercase tracking-[0.2em] mt-1">
                    POS Terminal • Staff Access
                </span>
            </div>

            <!-- Forms Group -->
            <form onsubmit="handleStaffLogin(event)" class="flex flex-col gap-6 relative z-10">
                <!-- Employee ID input -->
                <div class="flex flex-col gap-2">
                    <label for="employee-id" class="text-xs font-bold text-[#E0C0B2]/70 uppercase tracking-widest">
                        Employee ID
                    </label>
                    <div class="relative w-full">
                        <!-- Left Icon: Employee Avatar -->
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#E0C0B2]/40">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <input type="text" id="employee-id" placeholder="e.g. CASHIER01" 
                               class="w-full h-[51px] bg-[#2A1D17] border border-[#594238]/60 focus:border-[#FFB595] text-[#F6DDD4] font-montserrat text-sm py-3 pl-11 pr-4 rounded-md focus:outline-none focus:ring-0 placeholder-[#E0C0B2]/20" 
                               autocomplete="off" required>
                    </div>
                </div>

                <!-- Access PIN input -->
                <div class="flex flex-col gap-2">
                    <label for="access-pin" class="text-xs font-bold text-[#E0C0B2]/70 uppercase tracking-widest">
                        Access PIN
                    </label>
                    <div class="relative w-full">
                        <!-- Left Icon: Padlock -->
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#E0C0B2]/40">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </span>
                        <input type="password" id="access-pin" placeholder="••••" maxlength="6"
                               class="w-full h-[51px] bg-[#2A1D17] border border-[#594238]/60 focus:border-[#FFB595] text-[#F6DDD4] font-mono text-lg tracking-widest py-3 pl-11 pr-4 rounded-md focus:outline-none focus:ring-0 placeholder-[#E0C0B2]/20" 
                               autocomplete="off" required>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-4 mt-2">
                    <button type="submit" 
                            class="w-full h-[48px] bg-[#EE671C] hover:bg-[#d65510] text-[#4C1A00] font-montserrat font-bold text-xs uppercase tracking-widest rounded-sm shadow-[0_4px_12px_rgba(238,103,28,0.2)] active:scale-[0.98] transition duration-200 flex items-center justify-center gap-2">
                        Start Shift / Login
                        <svg class="w-4 h-4 text-[#4C1A00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>

                    <!-- Manager Alert -->
                    <span class="text-[9px] font-bold text-[#E0C0B2]/40 hover:text-[#E0C0B2]/60 text-center tracking-[0.15em] uppercase select-none transition duration-150 cursor-help">
                        Forgot PIN? Contact Manager
                    </span>
                </div>
            </form>

            <div class="border-t border-[#594238]/40 pt-4 flex flex-col gap-2 items-center">
                <!-- Customer Access Backlink -->
                <a href="{{ route('relatif.menu') }}" 
                   class="text-[10px] font-bold text-[#FFB595]/50 hover:text-[#FFB595] transition duration-150 uppercase tracking-widest flex items-center gap-1.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Customer Access? Back to Menu
                </a>
            </div>
        </div>

        <!-- CARD 2: ACTIVE SHIFT CARD (Visible if already logged in) -->
        <div id="active-shift-card" class="w-full bg-[#40312B] border border-[#594238]/60 shadow-[0_40px_80px_rgba(0,0,0,0.9)] rounded p-8 flex flex-col gap-6 relative overflow-hidden transition-all duration-300 hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,#FFB595/3_0%,transparent_70%)] pointer-events-none"></div>

            <div class="flex flex-col items-center gap-3 text-center z-10 relative">
                <div class="w-16 h-16 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 animate-pulse">
                    <!-- Dynamic checkmark -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>
                <h2 class="font-playfair text-[28px] font-semibold text-[#FFB595]">Shift Active</h2>
                <p class="font-montserrat text-sm text-[#E0C0B2] leading-relaxed">
                    You are currently logged in as: <br>
                    <strong id="active-shift-name" class="text-white text-base">Cashier 01</strong>
                </p>
            </div>

            <div class="flex flex-col gap-3 relative z-10">
                <a href="{{ route('relatif.menu') }}" 
                   class="w-full h-[46px] bg-[#EE671C] hover:bg-[#d65510] text-[#4C1A00] font-montserrat font-bold text-xs uppercase tracking-widest rounded-sm flex items-center justify-center gap-2 transition duration-200">
                    Go to Menu Dashboard
                </a>
                <button onclick="handleStaffLogout()" 
                        class="w-full h-[46px] bg-transparent border border-[#594238] text-[#E0C0B2]/60 hover:text-[#FFB595] hover:border-[#FFB595]/50 font-montserrat font-bold text-xs uppercase tracking-widest rounded-sm flex items-center justify-center transition duration-200 active:scale-[0.98]">
                    End Shift / Logout
                </button>
            </div>
        </div>

    </main>

    <!-- Global Footer -->
    <footer class="absolute bottom-6 left-0 right-0 flex justify-center text-[10px] font-bold text-[#E0C0B2]/30 uppercase tracking-[0.2em] z-10">
        System Version 1.0
    </footer>

    <!-- Full-Screen POS Authorization Loader Overlay -->
    <div id="auth-loader-overlay" class="fixed inset-0 z-50 bg-[#1C110B]/98 flex flex-col items-center justify-center p-6 hidden">
        <!-- Pulsing lock circle -->
        <div class="relative w-28 h-28 flex items-center justify-center">
            <div class="absolute inset-0 bg-[#EE671C]/5 rounded-full animate-ping duration-[1200ms]"></div>
            <svg class="w-20 h-20 text-[#EE671C] animate-spin" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="rgba(238,103,28,0.1)" stroke-width="5" fill="none" />
                <path d="M50,10 a40,40 0 0,1 40,40" stroke="currentColor" stroke-width="5" stroke-linecap="round" fill="none" />
            </svg>
            <span class="absolute text-[#FFB595]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </span>
        </div>

        <div class="flex flex-col gap-2.5 text-center mt-8">
            <h3 class="font-playfair text-[24px] font-bold text-[#FFB595] tracking-wide">
                Terminal Authorization
            </h3>
            <p id="auth-loader-subtitle" class="font-montserrat text-xs text-[#E0C0B2]/80 tracking-wider uppercase min-h-[30px]">
                Checking POS terminal credentials...
            </p>
        </div>
    </div>

    <!-- Script Logics -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            checkActiveShift();
        });

        function checkActiveShift() {
            const staffName = localStorage.getItem('relatif_staff_name');
            const loginCard = document.getElementById('login-form-card');
            const shiftCard = document.getElementById('active-shift-card');
            const shiftNameText = document.getElementById('active-shift-name');

            if (staffName) {
                loginCard.classList.add('hidden');
                shiftCard.classList.remove('hidden');
                shiftNameText.textContent = staffName;
            } else {
                loginCard.classList.remove('hidden');
                shiftCard.classList.add('hidden');
            }
        }

        async function handleStaffLogin(event) {
            event.preventDefault();

            const employeeId = document.getElementById('employee-id').value.trim();
            const pin = document.getElementById('access-pin').value.trim();

            if (!employeeId || !pin) {
                alert('Please enter your Employee ID and Access PIN!');
                return;
            }

            const overlay = document.getElementById('auth-loader-overlay');
            const subtitle = document.getElementById('auth-loader-subtitle');

            overlay.classList.remove('hidden');
            subtitle.textContent = "Checking POS terminal credentials...";

            try {
                const res = await fetch('http://127.0.0.1:8001/staff/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        employee_id: employeeId,
                        pin: pin
                    })
                });

                const data = await res.json();

                if (data.status !== 'success') {
                    overlay.classList.add('hidden');
                    alert('Employee ID atau PIN salah!');
                    return;
                }

                setTimeout(() => {
                    subtitle.textContent = "Access Granted! Initializing shift data...";
                }, 800);

                setTimeout(() => {
                    localStorage.setItem('relatif_staff_name', data.staff.name);
                    localStorage.setItem('relatif_staff_id', data.staff.id);
                    localStorage.setItem('relatif_staff_role', data.staff.role);
                    localStorage.removeItem('relatif_member_name');

                    window.dispatchEvent(new Event('relatif_staff_login_state'));
                    window.location.href = "{{ route('relatif.menu') }}";
                }, 1600);

            } catch (error) {
                overlay.classList.add('hidden');
                alert('Error: ' + error.message);
            }
        }
        function handleStaffLogout() {
            if (confirm('Are you sure you want to end your POS shift and logout?')) {
                localStorage.removeItem('relatif_staff_name');
                window.dispatchEvent(new Event('relatif_staff_login_state'));
                checkActiveShift();
            }
        }
    </script>
</body>
</html>
