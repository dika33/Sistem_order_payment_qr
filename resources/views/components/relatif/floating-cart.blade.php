<div id="floating-cart" class="absolute bottom-[96px] left-5 right-5 w-auto bg-[#FFB595] border border-[#A88A7E] rounded-lg p-4 shadow-[0_20px_40px_rgba(0,0,0,0.8)] z-40 hidden transition-all duration-300 transform translate-y-4 opacity-0">
    <div class="flex justify-between items-center">
        <!-- Details -->
        <div class="flex flex-col">
            <span id="cart-items-count" class="font-montserrat text-xs font-semibold text-[#571E00]">0 Items</span>
            <span id="cart-total-price" class="font-playfair text-2xl font-medium text-[#571E00] leading-none mt-0.5">Rp 0</span>
        </div>
        
        <!-- Action Button -->
        <a href="{{ route('relatif.cart') }}" class="bg-[#571E00] hover:bg-[#4C1A00] text-[#FFB595] px-5 py-2.5 rounded-sm font-montserrat text-xs font-semibold flex items-center gap-2 transition duration-200 active:scale-[0.98]">
            View Cart
            <!-- Right Arrow Icon -->
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>

<script>
    // In-memory simple cart state
    const cart = {
        items: {},
        totalItems: 0,
        totalPrice: 0
    };

    function formatRupiah(num) {
        return num.toLocaleString('id-ID');
    }

    function addToCart(id, title, price) {
        if (!cart.items[id]) {
            cart.items[id] = { title, price, qty: 0 };
        }
        cart.items[id].qty += 1;
        
        cart.totalItems += 1;
        cart.totalPrice += price;

        updateCartUI();
    }

    function updateCartUI() {
        const cartEl = document.getElementById('floating-cart');
        const countEl = document.getElementById('cart-items-count');
        const priceEl = document.getElementById('cart-total-price');

        if (cart.totalItems > 0) {
            countEl.textContent = `${cart.totalItems} ${cart.totalItems === 1 ? 'Item' : 'Items'}`;
            priceEl.textContent = `Rp ${formatRupiah(cart.totalPrice)}`;

            // Show animation
            cartEl.classList.remove('hidden');
            // Allow layout render before animating
            setTimeout(() => {
                cartEl.classList.remove('translate-y-4', 'opacity-0');
            }, 10);
        } else {
            cartEl.classList.add('translate-y-4', 'opacity-0');
            setTimeout(() => {
                cartEl.classList.add('hidden');
            }, 300);
        }
    }
</script>

