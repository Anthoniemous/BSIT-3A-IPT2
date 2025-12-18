<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Wishlist - Admin Dashboard</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen font-[Poppins] text-gray-800">

  <main class="max-w-7xl mx-auto p-8">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-extrabold text-amber-900">Wishlist</h1>
      <div class="flex gap-3">
        <a href="/admin/products"
           class="bg-amber-700 hover:bg-amber-800 text-white px-4 py-2 rounded-lg shadow">Back to Products</a>
        <button id="clearWishlistBtn" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">Clear All</button>
      </div>
    </div>

    <div id="emptyState" class="bg-white p-8 rounded-2xl shadow text-center text-gray-500">
      No items in wishlist.
    </div>

    <div id="wishlistContainer" class="bg-white rounded-2xl shadow overflow-hidden hidden">
      <table class="min-w-full table-auto">
        <thead class="bg-amber-700 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">#</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Image</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Name</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Category</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Brand</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Price</th>
            <th class="px-6 py-3 text-center text-sm font-medium uppercase">Actions</th>
          </tr>
        </thead>
        <tbody id="wishlistBody" class="bg-white divide-y divide-gray-200"></tbody>
      </table>
    </div>
  </main>

  <script>
    function getWishlist() {
      try { return JSON.parse(localStorage.getItem('wishlist') || '[]'); }
      catch (e) { return []; }
    }
    function saveWishlist(list) { localStorage.setItem('wishlist', JSON.stringify(list)); }

    // -- new cart helpers --
    function getCart() {
      try { return JSON.parse(localStorage.getItem('cart') || '[]'); }
      catch (e) { return []; }
    }
    function saveCart(list) { localStorage.setItem('cart', JSON.stringify(list)); }

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
      return true;
    }

    function moveFromWishlistToCart(productId) {
      const wishlist = getWishlist();
      const idx = wishlist.findIndex(p => String(p.id) === String(productId));
      if (idx === -1) return false;
      const product = wishlist[idx];
      // remove from wishlist
      wishlist.splice(idx, 1);
      saveWishlist(wishlist);
      // add to cart
      addToCart(product);
      // re-render UI
      renderWishlist();
      return true;
    }

    function formatPrice(v) {
      if (v === undefined || v === null || v === '') return '-';
      const n = Number(v);
      if (!Number.isFinite(n)) return '-';
      return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    }

    function renderWishlist() {
      const list = getWishlist();
      const container = document.getElementById('wishlistContainer');
      const empty = document.getElementById('emptyState');
      const tbody = document.getElementById('wishlistBody');

      if (!list || list.length === 0) {
        container.classList.add('hidden');
        empty.classList.remove('hidden');
        return;
      }

      empty.classList.add('hidden');
      container.classList.remove('hidden');
      tbody.innerHTML = '';

      list.forEach((p, i) => {
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-amber-50 transition';
        tr.innerHTML = `
          <td class="px-6 py-4 text-gray-600">${i+1}</td>
          <td class="px-6 py-4">
            ${p.image ? `<img src="${p.image}" alt="${escapeHtml(p.name)}" class="w-16 h-16 object-cover rounded-lg shadow">` : '<span class="text-gray-400 italic">No image</span>'}
          </td>
          <td class="px-6 py-4 font-semibold text-gray-800">${escapeHtml(p.name || '')}</td>
          <td class="px-6 py-4 text-gray-600">${escapeHtml(p.category || 'Uncategorized')}</td>
          <td class="px-6 py-4 text-gray-600">${escapeHtml(p.brand || '')}</td>
          <td class="px-6 py-4 text-gray-800 font-medium">${formatPrice(p.price)}</td>
          <td class="px-6 py-4 flex justify-center gap-2">
            <button data-id="${escapeAttr(p.id)}" class="move-btn bg-amber-700 hover:bg-amber-800 text-white px-3 py-1.5 rounded-lg shadow">Move to Cart</button>
            <button data-id="${escapeAttr(p.id)}" class="remove-btn bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg shadow">Remove</button>
          </td>
        `;
        tbody.appendChild(tr);
      });

      // wire remove buttons
      tbody.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          removeFromWishlist(id);
        });
      });

      // wire move-to-cart buttons
      tbody.querySelectorAll('.move-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          moveFromWishlistToCart(id);
        });
      });
    }

    function removeFromWishlist(productId) {
      const newList = getWishlist().filter(p => String(p.id) !== String(productId));
      saveWishlist(newList);
      renderWishlist();
    }

    function clearWishlist() {
      localStorage.removeItem('wishlist');
      renderWishlist();
    }

    function escapeHtml(s) {
      return String(s || '').replace(/[&<>"']/g, function (m) { return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]); });
    }
    function escapeAttr(s) { return String(s || '').replace(/"/g, '&quot;'); }

    document.addEventListener('DOMContentLoaded', function () {
      renderWishlist();
      document.getElementById('clearWishlistBtn').addEventListener('click', function () {
        if (!confirm('Clear all items from wishlist?')) return;
        clearWishlist();
      });
    });
  </script>
</body>
</html>