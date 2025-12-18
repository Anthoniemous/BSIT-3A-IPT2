<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Checkout - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
  <div class="max-w-6xl mx-auto p-8">
    <h1 class="text-4xl font-extrabold text-orange-800 mb-8">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Billing Info -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold text-orange-800 mb-4">Billing Information</h3>
        <form id="checkoutForm" class="space-y-4">
          <input type="text" placeholder="Full Name" required class="w-full border rounded px-4 py-2" id="fullName">
          <input type="email" placeholder="Email" required class="w-full border rounded px-4 py-2" id="email">
          <input type="tel" placeholder="Phone" required class="w-full border rounded px-4 py-2" id="phone">
          <input type="text" placeholder="Address" required class="w-full border rounded px-4 py-2" id="address">
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="City" required class="border rounded px-4 py-2" id="city">
            <input type="text" placeholder="ZIP" required class="border rounded px-4 py-2" id="zip">
          </div>
        </form>
      </div>

      <!-- Order Summary & Payment -->
      <div class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-xl font-bold text-orange-800 mb-4">Order Summary</h3>
          <div id="orderItems" class="space-y-2 mb-4"></div>
          <div class="border-t pt-4">
            <div class="flex justify-between mb-2">
              <span>Subtotal</span>
              <span id="orderSubtotal">₱0.00</span>
            </div>
            <div class="flex justify-between mb-4">
              <span>Shipping</span>
              <span id="orderShipping">₱100.00</span>
            </div>
            <div class="flex justify-between font-bold text-lg">
              <span>Total</span>
              <span id="orderTotal">₱0.00</span>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
          <h3 class="text-xl font-bold text-orange-800 mb-4">Payment Method</h3>
          <div class="space-y-3">
            <label class="flex items-center border p-3 rounded cursor-pointer hover:bg-orange-50">
              <input type="radio" name="payment" value="gcash" required class="mr-3"> GCash
            </label>
            <label class="flex items-center border p-3 rounded cursor-pointer hover:bg-orange-50">
              <input type="radio" name="payment" value="card" required class="mr-3"> Credit/Debit Card
            </label>
            <label class="flex items-center border p-3 rounded cursor-pointer hover:bg-orange-50">
              <input type="radio" name="payment" value="cod" required class="mr-3"> Cash on Delivery
            </label>
          </div>

          <button onclick="processPayment()" class="w-full mt-6 bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-lg">Place Order</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function getCart() { try { return JSON.parse(localStorage.getItem('cart') || '[]'); } catch (e) { return []; } }
    function formatPrice(v) { const n = Number(v); return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }); }

    function renderOrderSummary() {
      const cart = getCart();
      const itemsDiv = document.getElementById('orderItems');
      let subtotal = 0;

      itemsDiv.innerHTML = '';
      cart.forEach(item => {
        const qty = Number(item.quantity) || 1;
        const price = Number(item.price) || 0;
        const total = price * qty;
        subtotal += total;
        const p = document.createElement('p');
        p.textContent = `${item.name} x${qty} = ${formatPrice(total)}`;
        itemsDiv.appendChild(p);
      });

      document.getElementById('orderSubtotal').textContent = formatPrice(subtotal);
      document.getElementById('orderTotal').textContent = formatPrice(subtotal + 100);
    }

    async function processPayment() {
      const form = document.getElementById('checkoutForm');
      if (!form.checkValidity()) {
        alert('Please fill all required fields');
        return;
      }

      const payment = document.querySelector('input[name="payment"]:checked')?.value;
      if (!payment) {
        alert('Select a payment method');
        return;
      }

      const items = getCart();
      if (!items || items.length === 0) {
        alert('Cart is empty');
        return;
      }

      const billing = {
        fullName: document.getElementById('fullName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        address: document.getElementById('address').value,
        city: document.getElementById('city').value,
        zip: document.getElementById('zip').value,
      };

      const payload = {
        billing,
        payment: { method: payment },
        items: items.map(i => ({ id: i.id, quantity: i.quantity || 1 })),
        shipping: 100,
        total: parseFloat(document.getElementById('orderTotal').textContent.replace(/[^\d.-]/g, ''))
      };

      try {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const res = await fetch('{{ route("user.order.store") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
          },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (data.success) {
          localStorage.removeItem('cart');
          // optionally store order id or details in localStorage/session if needed
          window.location.href = '{{ route("user.order.confirmation") }}?order_id=' + data.order_id;
        } else {
          alert('Order failed: ' + (data.message || 'unknown'));
        }
      } catch (err) {
        console.error(err);
        alert('Request failed. Try again.');
      }
    }

    document.addEventListener('DOMContentLoaded', renderOrderSummary);
  </script>
</body>
</html>