<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Shopping Cart - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
  <div class="max-w-6xl mx-auto p-8">
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-4xl font-extrabold text-orange-800">🛒 Shopping Cart</h1>
      <a href="/dashboard" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">← Back</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Cart Items -->
      <div class="lg:col-span-2">
        <div id="emptyCart" class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
          Your cart is empty. <a href="/dashboard" class="text-orange-600 hover:underline">Continue shopping</a>
        </div>

        <div id="cartItems" class="space-y-4 hidden">
          <!-- items rendered here -->
        </div>
      </div>

      <!-- Order Summary -->
      <div class="bg-white p-6 rounded-lg shadow h-fit">
        <h3 class="text-xl font-bold text-orange-800 mb-4">Order Summary</h3>
        <div class="space-y-2 mb-4">
          <div class="flex justify-between">
            <span>Subtotal</span>
            <span id="subtotal">₱0.00</span>
          </div>
          <div class="flex justify-between">
            <span>Shipping</span>
            <span id="shipping">₱0.00</span>
          </div>
          <div class="border-t pt-2 flex justify-between font-bold text-lg">
            <span>Total</span>
            <span id="total">₱0.00</span>
          </div>
        </div>
        <button onclick="proceedToCheckout()" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-lg">Proceed to Checkout</button>
      </div>
    </div>
  </div>

  <script>
    function getCart() { try { return JSON.parse(localStorage.getItem('cart') || '[]'); } catch (e) { return []; } }
    function saveCart(list) { localStorage.setItem('cart', JSON.stringify(list)); }

    function formatPrice(v) {
      if (v === null || v === undefined || v === '') return '₱0.00';
      const n = Number(v);
      return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    }

    function renderCart() {
      const cart = getCart();
      const empty = document.getElementById('emptyCart');
      const items = document.getElementById('cartItems');

      if (!cart || cart.length === 0) {
        empty.classList.remove('hidden');
        items.classList.add('hidden');
        document.getElementById('subtotal').textContent = formatPrice(0);
        document.getElementById('total').textContent = formatPrice(0);
        return;
      }

      empty.classList.add('hidden');
      items.classList.remove('hidden');
      items.innerHTML = '';

      let subtotal = 0;
      cart.forEach((item, i) => {
        const price = Number(item.price) || 0;
        const qty = Number(item.quantity) || 1;
        const itemTotal = price * qty;
        subtotal += itemTotal;

        const div = document.createElement('div');
        div.className = 'bg-white p-4 rounded-lg shadow flex gap-4';
        div.innerHTML = `
          <img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}" class="w-24 h-24 object-cover rounded">
          <div class="flex-1">
            <h4 class="font-bold text-orange-800">${escapeHtml(item.name)}</h4>
            <p class="text-sm text-gray-600">${escapeHtml(item.brand || '')}</p>
            <p class="text-orange-600 font-bold">${formatPrice(price)}</p>
            <div class="flex items-center gap-2 mt-2">
              <label class="text-sm">Qty:</label>
              <input type="number" min="1" value="${qty}" data-id="${escapeAttr(item.id)}" class="qty-input border rounded px-2 py-1 w-16">
            </div>
          </div>
          <div class="text-right">
            <p class="text-lg font-bold">${formatPrice(itemTotal)}</p>
            <button data-id="${escapeAttr(item.id)}" class="remove-item text-red-600 hover:text-red-800 text-sm mt-2">Remove</button>
          </div>
        `;
        items.appendChild(div);
      });

      document.getElementById('subtotal').textContent = formatPrice(subtotal);
      const shipping = subtotal > 0 ? 100 : 0;
      document.getElementById('shipping').textContent = formatPrice(shipping);
      document.getElementById('total').textContent = formatPrice(subtotal + shipping);

      // wire qty inputs
      items.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', () => {
          const id = input.dataset.id;
          const val = Math.max(1, Number(input.value) || 1);
          updateQty(id, val);
        });
      });

      // wire remove buttons
      items.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', () => removeItem(btn.dataset.id));
      });
    }

    function updateQty(id, qty) {
      const cart = getCart();
      const idx = cart.findIndex(p => String(p.id) === String(id));
      if (idx !== -1) {
        cart[idx].quantity = qty;
        saveCart(cart);
        renderCart();
      }
    }

    function removeItem(id) {
      const cart = getCart().filter(p => String(p.id) !== String(id));
      saveCart(cart);
      renderCart();
    }

    function proceedToCheckout() {
      const cart = getCart();
      if (cart.length === 0) {
        alert('Cart is empty');
        return;
      }
      window.location.href = '{{ route("user.checkout") }}';
    }

    function escapeHtml(s) { return String(s || '').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
    function escapeAttr(s) { return String(s || '').replace(/"/g, '&quot;'); }

    document.addEventListener('DOMContentLoaded', renderCart);
  </script>
</body>
</html>