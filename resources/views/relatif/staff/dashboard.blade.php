<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatif - POS Cashier Dashboard</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS Compiler -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[#1C110B] text-[#F6DDD4] font-montserrat flex flex-col overflow-hidden">

    <!-- Dashboard Master Wrapper -->
    <div class="w-full h-full flex flex-col md:flex-row">
        
        <!-- SIDEBAR: Cashier Control & Shift Panel -->
        <aside class="w-full md:w-[280px] bg-[#251913] border-b md:border-b-0 md:border-r border-[#594238]/60 p-6 flex flex-col justify-between shrink-0 select-none">
            
            <!-- Top brand & navigation items -->
            <div class="flex flex-col gap-8">
                <!-- Brand Title with Gold Badge -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#EE671C]/15 border border-[#FFB595]/30 flex items-center justify-center text-[#FFB595]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-playfair text-[22px] font-bold text-[#FFB595] leading-tight">Relatif</span>
                        <span class="text-[9px] font-bold text-[#E0C0B2]/55 uppercase tracking-wider">POS Terminal</span>
                    </div>
                </div>

                <!-- Sidebar Nav Menu Links -->
                <nav class="flex flex-col gap-2">
                    <button class="w-full flex items-center gap-3 px-4 py-3 bg-[#EE671C]/10 border border-[#EE671C]/30 rounded text-left text-xs font-bold text-[#FFB595] tracking-wide uppercase transition duration-150">
                        <svg class="w-4.5 h-4.5 text-[#EE671C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span>Active Orders</span>
                    </button>
                    
                    <button class="w-full flex items-center gap-3 px-4 py-3 bg-transparent hover:bg-white/5 border border-transparent rounded text-left text-xs font-semibold text-[#E0C0B2]/75 hover:text-white tracking-wide uppercase transition duration-150">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2"></path>
                        </svg>
                        <span>Sales Report</span>
                    </button>

                    <button class="w-full flex items-center gap-3 px-4 py-3 bg-transparent hover:bg-white/5 border border-transparent rounded text-left text-xs font-semibold text-[#E0C0B2]/75 hover:text-white tracking-wide uppercase transition duration-150">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Settings</span>
                    </button>
                </nav>
            </div>

            <!-- Bottom cashier active identity information -->
            <div class="flex flex-col gap-4 border-t border-[#594238]/40 pt-5 mt-6 md:mt-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#AF8B47]/20 border border-[#AF8B47]/50 flex items-center justify-center font-bold text-[#FFB595] text-sm">
                        C1
                    </div>
                    <div class="flex flex-col">
                        <span id="cashier-active-name" class="font-montserrat text-xs font-bold text-white tracking-wide uppercase">
                            Cashier 01
                        </span>
                        <span class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest flex items-center gap-1.5 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Shift Active
                        </span>
                    </div>
                </div>

                <button onclick="endCashierShift()" class="w-full h-10 border border-[#594238] hover:border-[#EE671C] text-[#E0C0B2]/60 hover:text-white rounded text-[10px] font-bold uppercase tracking-wider transition duration-200">
                    End Shift
                </button>
            </div>
        </aside>

        <!-- MAIN AREA: Dashboard Canvas -->
        <main class="flex-grow p-6 flex flex-col gap-6 overflow-y-auto">
            
            <!-- SECTION 1: HEADER & LIVE STATUS -->
            <header class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 select-none">
                <div class="flex flex-col">
                    <h1 class="font-playfair text-[28px] font-bold text-[#FFB595] tracking-wide">
                        Terminal Dashboard
                    </h1>
                    <p class="font-montserrat text-xs text-[#E0C0B2]/70 mt-1">
                        Monitoring live customer transaction queue and barista brewing slots.
                    </p>
                </div>

                <div class="flex items-center gap-4 text-xs font-semibold text-[#E0C0B2]/60 bg-[#251913] border border-[#594238]/40 rounded-lg py-2 px-4 shadow-inner">
                    <div class="flex items-center gap-1.5 border-r border-[#594238]/30 pr-4">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span id="latency-text">POS Latency: 4ms</span>
                    </div>
                    <div id="live-clock" class="font-mono text-[#F6DDD4]/80">
                        <!-- Filled by JS -->
                    </div>
                </div>
            </header>

            <!-- SECTION 2: METRICS KPI SUMMARY BAR -->
            <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 select-none">
                <div class="bg-[#251913]/80 border border-[#594238]/50 rounded-xl p-4.5 flex flex-col justify-between shadow-md relative overflow-hidden group">
                    <span class="text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">Today's Sales</span>
                    <h3 id="sales-kpi" class="font-playfair text-2xl font-bold text-[#FFB595] mt-2">Rp 172.120</h3>
                    <p class="text-[9px] font-bold text-[#AF8B47] uppercase tracking-wider mt-1.5">Includes Member Disc.</p>
                </div>

                <div class="bg-[#251913]/80 border border-[#594238]/50 rounded-xl p-4.5 flex flex-col justify-between shadow-md relative overflow-hidden group">
                    <span class="text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">Pending Orders</span>
                    <h3 id="pending-kpi" class="font-playfair text-2xl font-bold text-[#E9C176] mt-2">1 Order</h3>
                    <p id="pending-kpi-sub" class="text-[9px] font-bold text-[#E0C0B2]/40 uppercase tracking-wider mt-1.5">Awaiting Acceptance</p>
                </div>

                <div class="bg-[#251913]/80 border border-[#594238]/50 rounded-xl p-4.5 flex flex-col justify-between shadow-md relative overflow-hidden group">
                    <span class="text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">Brewing / Preparing</span>
                    <h3 id="brewing-kpi" class="font-playfair text-2xl font-bold text-[#EE671C] mt-2">1 Order</h3>
                    <p class="text-[9px] font-bold text-[#E0C0B2]/40 uppercase tracking-wider mt-1.5">In Barista Queue</p>
                </div>

                <div class="bg-[#251913]/80 border border-[#594238]/50 rounded-xl p-4.5 flex flex-col justify-between shadow-md relative overflow-hidden group">
                    <span class="text-[10px] font-bold text-[#E0C0B2]/60 uppercase tracking-widest">Completed Today</span>
                    <h3 id="completed-kpi" class="font-playfair text-2xl font-bold text-emerald-400 mt-2">0 Served</h3>
                    <p class="text-[9px] font-bold text-[#E0C0B2]/40 uppercase tracking-wider mt-1.5">Transactions Closed</p>
                </div>
            </section>

            <!-- Mobile View Only Column Toggles -->
            <div class="flex md:hidden bg-[#251913] border border-[#594238]/40 rounded-lg p-1.5 justify-around w-full select-none z-10">
                <button onclick="toggleMobileColumn('pending')" id="tab-pending" class="flex-grow py-2 text-center text-xs font-bold text-[#FFB595] bg-[#EE671C]/10 border border-[#EE671C]/20 rounded tracking-wider uppercase">
                    Pending
                </button>
                <button onclick="toggleMobileColumn('brewing')" id="tab-brewing" class="flex-grow py-2 text-center text-xs font-semibold text-[#E0C0B2]/70 tracking-wider uppercase">
                    Brewing
                </button>
                <button onclick="toggleMobileColumn('completed')" id="tab-completed" class="flex-grow py-2 text-center text-xs font-semibold text-[#E0C0B2]/70 tracking-wider uppercase">
                    Completed
                </button>
            </div>

            <!-- SECTION 3: THREE-COLUMN ORDER WORKSPACE FEED GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start flex-grow">
                
                <!-- COLUMN 1: PENDING ORDERS (Meja Pelanggan) -->
                <section id="col-pending" class="flex flex-col gap-4.5 bg-[#251913]/40 border border-[#594238]/40 rounded-xl p-4.5 min-h-[500px] overflow-y-auto">
                    <div class="flex justify-between items-center border-b border-[#594238]/30 pb-3 select-none">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#E9C176]"></span>
                            <h2 class="font-playfair text-[17px] font-semibold text-white tracking-wide">
                                Pending Approvals
                            </h2>
                        </div>
                        <span id="pending-count-badge" class="px-2 py-0.5 bg-[#E9C176]/10 border border-[#E9C176]/30 text-[#E9C176] rounded text-[10px] font-bold">1</span>
                    </div>

                    <div id="pending-list" class="flex flex-col gap-4">
                        <!-- Dynamic JS Injection -->
                    </div>
                </section>

                <!-- COLUMN 2: BREWING & ACTIVE PREPARATION -->
                <section id="col-brewing" class="hidden md:flex flex-col gap-4.5 bg-[#251913]/40 border border-[#594238]/40 rounded-xl p-4.5 min-h-[500px] overflow-y-auto">
                    <div class="flex justify-between items-center border-b border-[#594238]/30 pb-3 select-none">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#EE671C] animate-ping"></span>
                            <h2 class="font-playfair text-[17px] font-semibold text-white tracking-wide">
                                Active Brewing
                            </h2>
                        </div>
                        <span id="brewing-count-badge" class="px-2 py-0.5 bg-[#EE671C]/10 border border-[#EE671C]/30 text-[#EE671C] rounded text-[10px] font-bold">1</span>
                    </div>

                    <div id="brewing-list" class="flex flex-col gap-4">
                        <!-- Dynamic JS Injection -->
                    </div>
                </section>

                <!-- COLUMN 3: HISTORICAL COMPLETED / SERVED -->
                <section id="col-completed" class="hidden md:flex flex-col gap-4.5 bg-[#251913]/40 border border-[#594238]/40 rounded-xl p-4.5 min-h-[500px] overflow-y-auto">
                    <div class="flex justify-between items-center border-b border-[#594238]/30 pb-3 select-none">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <h2 class="font-playfair text-[17px] font-semibold text-white tracking-wide">
                                Served History
                            </h2>
                        </div>
                        <span id="completed-count-badge" class="px-2 py-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded text-[10px] font-bold">0</span>
                    </div>

                    <div id="completed-list" class="flex flex-col gap-4">
                        <!-- Dynamic JS Injection -->
                    </div>
                </section>

            </div>

        </main>
    </div>

    <!-- DYNAMIC DASHBOARD STATE ENGINE SCRIPT -->
    <script>
        let orders = @json($activeOrders);
        let currentMobileView = 'pending';

        document.addEventListener('DOMContentLoaded', () => {
            let currentStaff = localStorage.getItem('relatif_staff_name');
            if (!currentStaff) {
                currentStaff = 'CASHIER 01';
                localStorage.setItem('relatif_staff_name', currentStaff);
            }
            document.getElementById('cashier-active-name').textContent = currentStaff;

            initClock();
            syncCustomerOrders();
            renderWorkspace();

            setInterval(updateLatencySimulation, 4000);
        });

        function updateLatencySimulation() {
            const latencies = ['4ms', '3ms', '5ms', '4ms', '6ms'];
            const randomLat = latencies[Math.floor(Math.random() * latencies.length)];
            document.getElementById('latency-text').textContent = `POS Latency: ${randomLat}`;
        }

        function initClock() {
            const clockEl = document.getElementById('live-clock');
            function update() {
                const now = new Date();
                const optDate = { weekday: 'short', day: '2-digit', month: 'short' };
                const dateStr = now.toLocaleDateString('en-US', optDate).toUpperCase();
                const timeStr = now.toTimeString().split(' ')[0];
                clockEl.textContent = `${dateStr}  •  ${timeStr}`;
            }
            update();
            setInterval(update, 1000);
        }

        function syncCustomerOrders() {
            const rawCustomerOrder = localStorage.getItem('relatif_latest_order');
            if (rawCustomerOrder) {
                try {
                    const parsed = JSON.parse(rawCustomerOrder);
                    const exists = orders.some(o => o.order_number === parsed.order_number);
                    if (!exists) {
                        const cleanOrder = {
                            order_number: parsed.order_number,
                            table: '04',
                            amount_paid: parseInt(parsed.amount_paid.replace(/[^0-9]/g, '')),
                            payment_method: parsed.payment_method || 'QRIS',
                            items: parsed.items || [],
                            status: parsed.status === 'Being Prepared by Barista' ? 'Preparing' : (parsed.status === 'Order Completed / Ready to Pick Up' ? 'Completed' : 'Pending'),
                            est_time: parsed.est_time || '5 Min'
                        };
                        orders.unshift(cleanOrder);
                    }
                } catch(e) {
                    console.error("Local order sync failed:", e);
                }
            }

            window.addEventListener('storage', (e) => {
                if (e.key === 'relatif_latest_order') {
                    syncCustomerOrders();
                    renderWorkspace();
                }
            });
        }

        function renderWorkspace() {
            const pendList = document.getElementById('pending-list');
            const brewList = document.getElementById('brewing-list');
            const compList = document.getElementById('completed-list');

            let pendHtml = '';
            let brewHtml = '';
            let compHtml = '';

            let pendCount = 0;
            let brewCount = 0;
            let compCount = 0;
            let totalRevenue = 0;

            orders.forEach((o, index) => {
                let itemsHtml = '';
                o.items.forEach(it => {
                    itemsHtml += `
                        <div class="flex justify-between items-center text-xs font-semibold text-[#E0C0B2]">
                            <span>${it.qty}x ${it.title}</span>
                            <span class="text-[10px] text-[#E0C0B2]/60">${it.options || 'Standard'}</span>
                        </div>
                    `;
                });

                const payBadgeStyle = o.payment_method.toUpperCase() === 'QRIS' 
                    ? 'bg-[#EE671C]/10 border-[#EE671C]/30 text-[#EE671C]' 
                    : 'bg-amber-500/10 border-amber-500/30 text-[#E9C176]';

                const cardHtml = `
                    <article class="bg-[#2A1D17] border border-[#594238]/60 hover:border-[#FFB595]/30 rounded-lg p-4 flex flex-col gap-3.5 shadow-inner transition duration-300">
                        <div class="flex justify-between items-start pb-2.5 border-b border-[#594238]/30">
                            <div class="flex flex-col">
                                <h4 class="font-playfair text-[15px] font-bold text-[#FFB595]">${o.order_number}</h4>
                                <span class="text-[9px] text-[#E0C0B2]/50 font-bold uppercase tracking-wider mt-0.5">Table ${o.table}</span>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full border ${payBadgeStyle} font-mono text-[9px] font-bold">
                                ${o.payment_method}
                            </span>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            ${itemsHtml}
                        </div>

                        <div class="flex flex-col gap-3 pt-2.5 border-t border-[#594238]/30">
                            <div class="flex justify-between items-center">
                                <span class="text-[10px] text-[#E0C0B2]/50 font-bold uppercase tracking-wide">Total Amount</span>
                                <span class="font-montserrat text-sm font-bold text-white">Rp ${o.amount_paid.toLocaleString('id-ID')}</span>
                            </div>

                            ${o.status === 'Pending' ? `
                                <button onclick="advanceOrderStatus(${index}, 'Preparing')" class="w-full h-8.5 bg-[#EE671C] hover:bg-[#d65510] text-[#4C1A00] rounded font-montserrat text-[11px] font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 transition duration-200">
                                    Accept Order
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            ` : o.status === 'Preparing' ? `
                                <button onclick="advanceOrderStatus(${index}, 'Completed')" class="w-full h-8.5 bg-[#AF8B47] hover:bg-[#96773a] text-[#4C1A00] rounded font-montserrat text-[11px] font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 transition duration-200">
                                    Ready to Serve
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                            ` : `
                                <span class="w-full h-8.5 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded font-montserrat text-[10px] font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 select-none">
                                    Served & Closed
                                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                            `}
                        </div>
                    </article>
                `;

                if (o.status === 'Pending') {
                    pendHtml += cardHtml;
                    pendCount++;
                } else if (o.status === 'Preparing') {
                    brewHtml += cardHtml;
                    brewCount++;
                } else if (o.status === 'Completed') {
                    compHtml += cardHtml;
                    compCount++;
                }

                totalRevenue += o.amount_paid;
            });

            const emptyState = (msg) => `
                <div class="flex flex-col items-center justify-center py-12 text-center select-none">
                    <svg class="w-12 h-12 text-[#594238]/40 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="font-montserrat text-xs text-[#E0C0B2]/50">${msg}</p>
                </div>
            `;

            pendList.innerHTML = pendCount > 0 ? pendHtml : emptyState('No incoming pending approvals.');
            brewList.innerHTML = brewCount > 0 ? brewHtml : emptyState('No active barista orders brewing.');
            compList.innerHTML = compCount > 0 ? compHtml : emptyState('No orders completed in this shift.');

            document.getElementById('pending-count-badge').textContent = pendCount;
            document.getElementById('brewing-count-badge').textContent = brewCount;
            document.getElementById('completed-count-badge').textContent = compCount;

            document.getElementById('sales-kpi').textContent = `Rp ${totalRevenue.toLocaleString('id-ID')}`;
            document.getElementById('pending-kpi').textContent = `${pendCount} Order${pendCount !== 1 ? 's' : ''}`;
            document.getElementById('brewing-kpi').textContent = `${brewCount} Order${brewCount !== 1 ? 's' : ''}`;
            document.getElementById('completed-kpi').textContent = `${compCount} Served`;

            document.getElementById('pending-kpi-sub').textContent = pendCount > 0 ? 'Awaiting Acceptance' : 'Queue is Pristine';
        }

        function advanceOrderStatus(index, newStatus) {
            orders[index].status = newStatus;
            
            const stored = localStorage.getItem('relatif_latest_order');
            if (stored) {
                try {
                    const parsed = JSON.parse(stored);
                    if (parsed.order_number === orders[index].order_number) {
                        if (newStatus === 'Preparing') {
                            parsed.status = 'Being Prepared by Barista';
                            parsed.est_time = '5 Min';
                        } else if (newStatus === 'Completed') {
                            parsed.status = 'Order Completed / Ready to Pick Up';
                            parsed.est_time = '0 Min';
                        }
                        
                        localStorage.setItem('relatif_latest_order', JSON.stringify(parsed));
                        window.dispatchEvent(new Event('storage'));
                    }
                } catch(e) {
                    console.error("Local order status sync error:", e);
                }
            }

            renderWorkspace();
        }

        function toggleMobileColumn(col) {
            currentMobileView = col;

            ['pending', 'brewing', 'completed'].forEach(c => {
                const colEl = document.getElementById(`col-${c}`);
                const tabEl = document.getElementById(`tab-${c}`);
                
                if (c === col) {
                    colEl.classList.remove('hidden');
                    tabEl.classList.remove('text-[#E0C0B2]/70', 'bg-transparent');
                    tabEl.classList.add('text-[#FFB595]', 'bg-[#EE671C]/10', 'border', 'border-[#EE671C]/20');
                } else {
                    colEl.classList.add('hidden');
                    tabEl.classList.add('text-[#E0C0B2]/70', 'bg-transparent');
                    tabEl.classList.remove('text-[#FFB595]', 'bg-[#EE671C]/10', 'border', 'border-[#EE671C]/20');
                }
            });
        }

        function endCashierShift() {
            if (confirm('Are you sure you want to close this POS terminal and end your cashier shift?')) {
                localStorage.removeItem('relatif_staff_name');
                window.location.href = "{{ route('relatif.login') }}";
            }
        }
    </script>
</body>
</html>
