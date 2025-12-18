<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Cart - Admin Dashboard</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen font-[Poppins] text-gray-800">
  <main class="max-w-6xl mx-auto p-8">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-extrabold text-amber-900">Cart</h1>
      <div class="flex gap-3">
        <a href="/admin/products" class="bg-amber-700 hover:bg-amber-800 text-white px-4 py-2 rounded-lg shadow">Back to Products</a>
        <button id="clearCartBtn" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">Clear Cart</button>
      </div>
    </div>

    <div id="emptyState" class="bg-white p-8 rounded-2xl shadow text-center text-gray-500">Your cart is empty.</div>

    <div id="cartContainer" class="bg-white rounded-2xl shadow overflow-hidden hidden">
      <table class="min-w-full table-auto">
        <thead class="bg-amber-700 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">#</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Product</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Brand</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Price</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Qty</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Subtotal</th>
            <th class="px-6 py-3 text-center text-sm font-medium uppercase">Actions</th>
          </tr>
        </thead>
        <tbody id="cartBody" class="bg-white divide-y divide-gray-200"></tbody>
        <tfoot>
          <tr class="bg-gray-50">
            <td colspan="5" class="px-6 py-4 text-right font-semibold">Total</td>
            <td id="cartTotal" class="px-6 py-4 font-bold text-lg">₱0.00</td>
            <td class="px-6 py-4"></td>
          </tr>
        </tfoot>
      </table>

      <div class="p-6 flex justify-end gap-3">
        <button id="checkoutBtn" class="bg-amber-700 hover:bg-amber-800 text-white px-5 py-2 rounded-lg shadow">Checkout</button>
      </div>
    </div>
  </main>

  <script>
    function getCart() {
      try { return JSON.parse(localStorage.getItem('cart') || '[]'); }
      catch (e) { return []; }
    }
    function saveCart(list) { localStorage.setItem('cart', JSON.stringify(list)); }

    function formatPrice(v) {
      if (v === null || v === undefined || v === '') return '₱0.00';
      const n = Number(v);
      if (!Number.isFinite(n)) return '₱0.00';
      return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    }

    function renderCart() {
      const cart = getCart();
      const container = document.getElementById('cartContainer');
      const empty = document.getElementById('emptyState');
      const tbody = document.getElementById('cartBody');
      const totalEl = document.getElementById('cartTotal');

      if (!cart || cart.length === 0) {
        container.classList.add('hidden');
        empty.classList.remove('hidden');
        totalEl.textContent = formatPrice(0);
        return;
      }

      empty.classList.add('hidden');
      container.classList.remove('hidden');
      tbody.innerHTML = '';

      let total = 0;
      cart.forEach((item, i) => {
        const price = Number(item.price) || 0;
        const qty = Number(item.quantity) || 1;
        const subtotal = price * qty;
        total += subtotal;

        const tr = document.createElement('tr');
        tr.className = 'hover:bg-amber-50 transition';
        tr.innerHTML = `
          <td class="px-6 py-4 text-gray-600">${i+1}</td>
          <td class="px-6 py-4 flex items-center gap-3">
            ${item.image ? `<img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}" class="w-16 h-16 object-cover rounded">` : ''}
            <div>
              <div class="font-semibold text-gray-800">${escapeHtml(item.name || '')}</div>
            </div>
          </td>
          <td class="px-6 py-4 text-gray-600">${escapeHtml(item.brand || '')}</td>
          <td class="px-6 py-4 text-gray-800">${formatPrice(price)}</td>
          <td class="px-6 py-4">
            <input data-id="${escapeAttr(item.id)}" type="number" min="1" value="${qty}" class="qty-input border rounded px-2 py-1 w-20">
          </td>
          <td class="px-6 py-4 text-gray-800 font-medium">${formatPrice(subtotal)}</td>
          <td class="px-6 py-4 flex justify-center gap-2">
            <button data-id="${escapeAttr(item.id)}" class="remove-btn bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg shadow">Remove</button>
          </td>
        `;
        tbody.appendChild(tr);
      });

      totalEl.textContent = formatPrice(total);

      // wire quantity inputs
      tbody.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('change', () => {
          const id = input.dataset.id;
          const val = Math.max(1, Number(input.value) || 1);
          updateQuantity(id, val);
        });
      });

      // wire remove buttons
      tbody.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          removeFromCart(btn.dataset.id);
        });
      });
    }

    function updateQuantity(productId, quantity) {
      const cart = getCart();
      const idx = cart.findIndex(p => String(p.id) === String(productId));
      if (idx === -1) return;
      cart[idx].quantity = Number(quantity);
      saveCart(cart);
      renderCart();
    }

    function addToCart(product) {
      if (!product || !product.id) return false;
      const cart = getCart();
      const idx = cart.findIndex(p => String(p.id) === String(product.id));
      if (idx !== -1) {
        cart[idx].quantity = (cart[idx].quantity || 1) + 1;
      } else {
        const item = Object.assign({}, product);
        item.quantity = item.quantity || 1;
        cart.push(item);
      }
      saveCart(cart);
      renderCart();
      return true;
    }

    function removeFromCart(productId) {
      const newCart = getCart().filter(p => String(p.id) !== String(productId));
      saveCart(newCart);
      renderCart();
    }

    function clearCart() {
      localStorage.removeItem('cart');
      renderCart();
    }

    // small helpers
    function escapeHtml(s) { return String(s || '').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
    function escapeAttr(s) { return String(s || '').replace(/"/g, '&quot;'); }

    document.addEventListener('DOMContentLoaded', function () {
      renderCart();
      document.getElementById('clearCartBtn').addEventListener('click', function () {
        if (!confirm('Clear all items from cart?')) return;
        clearCart();
      });
      document.getElementById('checkoutBtn').addEventListener('click', function () {
        alert('Checkout not implemented. Cart contents are stored in localStorage under "cart".');
      });
    });
  </script>
</body>
</html>