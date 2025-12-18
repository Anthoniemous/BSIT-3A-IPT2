<x-app-layout>
   

    {{-- Custom Page Content --}}
    @push('styles')
        <!-- Tailwind & Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @endpush

    <div class="bg-amber-50 text-gray-800 font-poppins min-h-screen">

        <!-- Navbar -->
        
            <div class="flex items-center justify-between">
                
        
                
            </div>
       

        <!-- Hero Section -->
        <section class="py-12 bg-gradient-to-r from-orange-200 via-amber-100 to-yellow-100">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10 px-6">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold text-orange-800">🐾 Discover Paw-some Deals!</h1>
                    <p class="mt-3 text-lg text-gray-700">Find everything your furry friend will love — from toys to treats!</p>
                    <a href="{{ route('dashboard') }}"
                       class="inline-block mt-6 px-6 py-3 bg-orange-600 text-white font-semibold rounded-full shadow hover:bg-orange-700 transition">
                        Start Shopping
                    </a>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                     alt="Pet Illustration"
                     class="w-52 md:w-64 drop-shadow-lg">
            </div>
        </section>

        <!-- Categories -->
        <section id="categories" class="max-w-7xl mx-auto px-6 py-10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-semibold text-orange-800">🐶 Shop by Category</h3>
                <a href="/user/products" class="text-sm text-orange-600 hover:underline">View all</a>  <!-- now links to all products -->
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse ($categories as $category)
                    <a href="/user/products?category={{ $category->id }}" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
                        🐾 <p class="mt-2 font-semibold text-orange-700">{{ $category->name }}</p>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-500">No categories available.</p>
                @endforelse
            </div>
        </section>

        <!-- Featured Products -->
        <section id="products" class="max-w-7xl mx-auto px-6 py-10">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold text-orange-800">✨ Featured Pet Products</h3>
            <a href="/user/products" class="text-sm text-orange-600 hover:underline">View all</a>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($products as $product)
              <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center product-card"
                   data-id="{{ $product->id }}"

                   data-name="{{ $product->name }}"
                   data-price="{{ $product->price }}"

                   data-image="{{ $product->image ? asset('uploads/products/' . $product->image) : '' }}"
                   data-brand="{{ $product->brand ?? '' }}"
                   data-category="{{ $product->category->name ?? '' }}"
                   data-stock="{{ $product->stock }}">
                @if ($product->image)
                  <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-28 h-28 object-cover mx-auto rounded">
                @else
                  <div class="w-28 h-28 mx-auto bg-gray-200 rounded flex items-center justify-center">No Image</div>
                @endif

                <h4 class="mt-4 font-semibold text-orange-800">{{ $product->name }}</h4>
                <p class="text-sm text-gray-600">{{ $product->category->name ?? 'Uncategorized' }}</p>
                <p class="text-orange-600 font-bold mt-2">₱{{ number_format($product->price, 2) }}</p>
                <div class="text-sm text-gray-500 mt-1">In stock: {{ $product->stock }}</div>

                <div class="mt-3 flex items-center justify-center gap-2">
                  <input type="number" min="1" value="1" max="{{ $product->stock }}" class="qty-input w-20 border rounded px-2 py-1 text-center" aria-label="Quantity">
                  <button onclick="addToCartUserFromCard(this)"
                    class="flex-1 bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600">Add to Cart</button>
                  <button onclick="addToWishlistFromCard(this)"
                    class="bg-pink-500 text-white px-4 py-2 rounded-full hover:bg-pink-600">♡</button>
                </div>
              </div>
            @empty
              <p class="col-span-full text-center text-gray-500">No products available.</p>
            @endforelse
          </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="bg-orange-100 text-gray-700 py-12 mt-10">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-bold text-orange-800 mb-3">Archiora Pets</h4>
                    <p>Bringing love, care, and joy to every pet household. 🐾</p>
                </div>
                <div>
                    <h4 class="font-bold text-orange-800 mb-3">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-orange-600">Home</a></li>
                        <li><a href="#products" class="hover:text-orange-600">Shop</a></li>
                        <li><a href="#categories" class="hover:text-orange-600">Categories</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-orange-800 mb-3">Customer Care</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-orange-600">Help Center</a></li>
                        <li><a href="#" class="hover:text-orange-600">Returns</a></li>
                        <li><a href="#" class="hover:text-orange-600">Shipping Info</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-orange-800 mb-3">Newsletter</h4>
                    <form action="#" class="flex">
                        <input type="email" placeholder="Enter your email"
                            class="w-full px-3 py-2 rounded-l-full text-gray-800 focus:outline-none border border-orange-300">
                        <button type="submit"
                            class="px-4 py-2 bg-orange-500 text-white rounded-r-full hover:bg-orange-600">
                            Subscribe
                        </button>
                    </form>
                    <div class="mt-4 flex space-x-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" class="w-10 h-6" alt="Visa">
                        <img src="https://cdn-icons-png.flaticon.com/512/349/349221.png" class="w-10 h-6" alt="Mastercard">
                        <img src="https://cdn-icons-png.flaticon.com/512/196/196565.png" class="w-10 h-6" alt="PayPal">
                    </div>
                </div>
            </div>
            <div class="mt-10 text-center text-sm text-gray-500">
                &copy; 2025 Archiora Pets. All rights reserved. 🐾
            </div>
        </footer>

    </div>
</x-app-layout>
<script>
  function getCart() { try { return JSON.parse(localStorage.getItem('cart') || '[]'); } catch (e) { return []; } }
  function saveCart(list) { localStorage.setItem('cart', JSON.stringify(list)); }
  function getWishlist() { try { return JSON.parse(localStorage.getItem('wishlist') || '[]'); } catch (e) { return []; } }
  function saveWishlist(list) { localStorage.setItem('wishlist', JSON.stringify(list)); }

  function addToCartUser(product, qty = 1) {
    if (!product || !product.id) return false;
    const available = Number(product.stock) || 0;
    qty = Number(qty) || 1;
    if (qty < 1) qty = 1;
    if (qty > available) {
      alert('Only ' + available + ' item(s) available in stock.');
      return false;
    }

    const cart = getCart();
    const idx = cart.findIndex(p => String(p.id) === String(product.id));
    if (idx !== -1) {
      const newQty = (cart[idx].quantity || 1) + qty;
      if (newQty > available) {
        alert('Cannot add more. Only ' + available + ' total available for this product.');
        return false;
      }
      cart[idx].quantity = newQty;
    } else {
      const item = {
        id: product.id,
        name: product.name,
        price: product.price,
        image: product.image || '',
        brand: product.brand || '',
        category: product.category || '',
        quantity: qty,
        stock: available
      };
      cart.push(item);
    }
    saveCart(cart);
    // notify badge listeners
    window.dispatchEvent(new Event('storage'));
    alert('✓ Added to cart!');
    return true;
  }

  function addToCartUserFromCard(btn) {
    const card = btn.closest('.product-card');
    if (!card) return;
    const qtyInput = card.querySelector('.qty-input');
    const qty = Math.max(1, Number(qtyInput?.value) || 1);
    const product = {
      id: card.dataset.id,
      name: card.dataset.name,
      price: Number(card.dataset.price) || 0,
      image: card.dataset.image || '',
      brand: card.dataset.brand || '',
      category: card.dataset.category || '',
      stock: Number(card.dataset.stock) || 0
    };
    addToCartUser(product, qty);
  }

  function addToWishlistFromCard(btn) {
    const card = btn.closest('.product-card');
    if (!card) return;
    const product = {
      id: card.dataset.id,
      name: card.dataset.name,
      price: Number(card.dataset.price) || 0,
      image: card.dataset.image || '',
      brand: card.dataset.brand || '',
      category: card.dataset.category || '',
      stock: Number(card.dataset.stock) || 0
    };
    const list = getWishlist();
    if (list.some(p => String(p.id) === String(product.id))) {
      alert('Already in wishlist');
      return;
    }
    list.push(product);
    saveWishlist(list);
    alert('✓ Added to wishlist!');
  }
</script>