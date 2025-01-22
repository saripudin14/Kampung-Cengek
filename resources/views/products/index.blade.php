<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex font-bold p-6 text-gray-900 items-center justify-between">
                    <h2>List Produk</h2>
                    <button id="cartButton"
                        class="relative flex items-center gap-2 px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 transition-all">
                        <span>Lihat Keranjang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h18l-2.286 12.943A2 2 0 0116.742 18H7.258a2 2 0 01-1.972-1.635L3 3zm6 15a2 2 0 114 0m-4 0a2 2 0 104 0" />
                        </svg>
                        <span id="cartCount"
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hidden">0</span>
                    </button>
                </div>

                <div class="grid md:grid-cols-3 grid-cols-1 py-3 pl-3 gap-6 pr-3">
                    @foreach ($products as $product)
                        <div>
                            <img src="{{ url('storage/', $product->foto) }}">
                            <div class="my-2">
                                <p class="text-xl">{{ $product->nama }}</p>
                                <p class="font-semibold text-gray-500">Rp. {{ number_format($product->harga) }}</p>
                            </div>
                            <button
                                class="add-to-cart flex items-center justify-center gap-2 px-6 py-3 text-white bg-yellow-500 rounded-lg shadow-lg hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-4 focus:ring-yellow-300 transition-all"
                                data-id="{{ $product->id }}" data-nama="{{ $product->nama }}"
                                data-harga="{{ $product->harga }}">
                                <span class="font-semibold">Tambah Keranjang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h18l-2.286 12.943A2 2 0 0116.742 18H7.258a2 2 0 01-1.972-1.635L3 3zm6 15a2 2 0 114 0m-4 0a2 2 0 104 0" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Pop-up Modal -->
    <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-yellow-50 rounded-lg shadow-lg w-96 p-6 relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h3 class="text-lg font-semibold mb-4 text-yellow-700">Keranjang Anda</h3>
            <div class="max-h-64 overflow-y-auto">
                <ul id="cartItems" class="space-y-2">
                    <!-- Barang dalam keranjang akan dimasukkan di sini -->
                </ul>
            </div>
            <div class="mt-4">
                <p id="totalQuantity" class="text-gray-700 font-semibold mb-2">Jumlah Barang: 0</p>
                <p id="totalPrice" class="text-gray-700 font-semibold mb-2">Total Harga: Rp. 0</p>
                <div class="mb-4">
                    <input id="userName" type="text" placeholder="Nama" class="w-full px-4 py-2 border rounded-lg mb-2" required>
                    <input id="userEmail" type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg mb-2" required>
                    <input id="userPhone" type="tel" placeholder="Nomor Telepon" class="w-full px-4 py-2 border rounded-lg mb-2" required>
                    <input id="userAddress" type="text" placeholder="Alamat" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <button id="checkoutButton" class="w-full px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Checkout</button>
            </div>
        </div>
    </div>

    <!-- Script untuk Pop-up -->
    <script>
        const cartItems = [];

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.dataset.id;
                const productName = this.dataset.nama;
                const productPrice = parseInt(this.dataset.harga);

                const existingItem = cartItems.find(item => item.id === productId);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cartItems.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    });
                }

                updateCartUI();
            });
        });

        document.getElementById('cartButton').addEventListener('click', function () {
            document.getElementById('cartModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('cartModal').classList.add('hidden');
        });

        document.getElementById('checkoutButton').addEventListener('click', function () {
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const phone = document.getElementById('userPhone').value;
            const address = document.getElementById('userAddress').value;

            if (!name || !email || !phone || !address) {
                alert('Harap lengkapi semua field.');
                return;
            }

            const cartDetails = cartItems.map(item => `- ${item.name} (x${item.quantity}): Rp. ${(item.price * item.quantity).toLocaleString()}`).join('\n');
            const totalPrice = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
            const message = `Nama: ${name}\nEmail: ${email}\nNomor Telepon: ${phone}\nAlamat: ${address}\n\nKeranjang:\n${cartDetails}\n\nTotal Harga: Rp. ${totalPrice.toLocaleString()}`;

            const whatsappUrl = `https://wa.me/6285860602948?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        });

        function updateCartUI() {
            const cartItemsContainer = document.getElementById('cartItems');
            const totalQuantityContainer = document.getElementById('totalQuantity');
            const totalPriceContainer = document.getElementById('totalPrice');
            const cartCount = document.getElementById('cartCount');

            cartItemsContainer.innerHTML = '';

            if (cartItems.length === 0) {
                cartItemsContainer.innerHTML = '<li class="text-gray-700">Tidak ada barang di keranjang.</li>';
                totalQuantityContainer.textContent = 'Jumlah Barang: 0';
                totalPriceContainer.textContent = 'Total Harga: Rp. 0';
                cartCount.classList.add('hidden');
                return;
            }

            let totalQuantity = 0;
            let totalPrice = 0;

            cartItems.forEach(item => {
                totalQuantity += item.quantity;
                totalPrice += item.price * item.quantity;
                const listItem = document.createElement('li');
                listItem.className = 'flex justify-between items-center text-gray-700';
                listItem.innerHTML = `
                    <div>
                        <span>${item.name}</span> <br>
                        <span class="text-sm text-gray-500">Harga: Rp. ${item.price.toLocaleString()}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="decrease-quantity bg-red-500 text-white px-2 py-1 rounded" data-id="${item.id}">-</button>
                        <span>${item.quantity}</span>
                        <button class="increase-quantity bg-yellow-500 text-white px-2 py-1 rounded" data-id="${item.id}">+</button>
                    </div>
                `;
                cartItemsContainer.appendChild(listItem);
            });

            totalQuantityContainer.textContent = `Jumlah Barang: ${totalQuantity}`;
            totalPriceContainer.textContent = `Total Harga: Rp. ${totalPrice.toLocaleString()}`;

            cartCount.textContent = totalQuantity;
            cartCount.classList.remove('hidden');

            document.querySelectorAll('.decrease-quantity').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.dataset.id;
                    const item = cartItems.find(item => item.id === productId);
                    if (item) {
                        item.quantity -= 1;
                        if (item.quantity <= 0) {
                            const index = cartItems.indexOf(item);
                            cartItems.splice(index, 1);
                        }
                    }
                    updateCartUI();
                });
            });

            document.querySelectorAll('.increase-quantity').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.dataset.id;
                    const item = cartItems.find(item => item.id === productId);
                    if (item) {
                        item.quantity += 1;
                    }
                    updateCartUI();
                });
            });
        }
    </script>
</x-app-layout>
