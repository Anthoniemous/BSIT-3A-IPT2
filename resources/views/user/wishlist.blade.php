<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Wishlist - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
  <div class="max-w-6xl mx-auto p-8">
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-4xl font-extrabold text-pink-600">💖 My Wishlist</h1>
      <a href="/dashboard" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">← Back</a>
    </div>

    <div id="emptyWishlist" class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
      Your wishlist is empty. <a href="/dashboard" class="text-orange-600 hover:underline">Start adding items</a>
    </div>

    <div id="wishlistItems" class="grid grid-cols-1 md:grid-cols-3 gap-6 hidden">
      <!-- items rendered here -->
    </div>
  </div>

  <script>
    function getWishlist() { try { return JSON.parse(localStorage.getItem('wishlist') || '[]'); } catch (e) { return []; } }
    function saveWishlist(list) { localStorage.setItem('wishlist', JSON.stringify(list)); }
    function getCart() { try { return JSON.parse(localStorage.getItem('cart') || '[]'); } catch (e) { return []; } }
    function saveCart(list) { localStorage.setItem('cart', JSON.stringify(list)); }

    function formatPrice(v) {
      if (v === null || v === undefined) return '₱0.00';
      const n = Number(v);
      return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    }

    function renderWishlist() {
      const list = getWishlist();
      const empty = document.getElementById('emptyWishlist');
      const items = document.getElementById('wishlistItems');

      if (!list || list.length === 0) {
        empty.classList.remove('hidden');
        items.classList.add('hidden');
        return;
      }

      empty.classList.add('hidden');
      items.classList.remove('hidden');
      items.innerHTML = '';

      list.forEach(item => {
        const div = document.createElement('div');
        div.className = 'bg-white p-4 rounded-lg shadow text-center';
        div.innerHTML = `
          <img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}" class="w-full h-48 object-cover rounded mb-3">
          <h4 class="font-bold text-orange-800">${escapeHtml(item.name)}</h4>
          <p class="text-sm text-gray-600 mb-2">${escapeHtml(item.brand || '')}</p>
          <p class="text-orange-600 font-bold mb-3">${formatPrice(item.price)}</p>
          <div class="flex gap-2">
            <button data-id="${escapeAttr(item.id)}" class="move-to-cart flex-1 bg-orange-600 hover:bg-orange-700 text-white py-2 rounded">Add to Cart</button>
            <button data-id="${escapeAttr(item.id)}" class="remove-item bg-red-600 hover:bg-red-700 text-white py-2 rounded px-3">✕</button>
          </div>
        `;
        items.appendChild(div);
      });

      items.querySelectorAll('.move-to-cart').forEach(btn => {
        btn.addEventListener('click', () => moveToCart(btn.dataset.id));
      });

      items.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', () => removeWishlistItem(btn.dataset.id));
      });
    }

    function moveToCart(id) {
      const wishlist = getWishlist();
      const idx = wishlist.findIndex(p => String(p.id) === String(id));
      if (idx === -1) return;
      const item = wishlist[idx];
      item.quantity = 1;
      const cart = getCart();
      if (!cart.some(p => String(p.id) === String(id))) {
        cart.push(item);
        saveCart(cart);
      }
      wishlist.splice(idx, 1);
      saveWishlist(wishlist);
      renderWishlist();
      alert('Moved to cart!');
    }

    function removeWishlistItem(id) {
      const list = getWishlist().filter(p => String(p.id) !== String(id));
      saveWishlist(list);
      renderWishlist();
    }

    function escapeHtml(s) { return String(s || '').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m])); }
    function escapeAttr(s) { return String(s || '').replace(/"/g, '&quot;'); }

    document.addEventListener('DOMContentLoaded', renderWishlist);
  </script>
</body>
</html>