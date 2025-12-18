<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Order Confirmation - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
  <div class="max-w-2xl mx-auto p-8">
    <div class="bg-white p-8 rounded-lg shadow text-center">
      <div class="text-6xl mb-4">✓</div>
      <h1 class="text-4xl font-bold text-green-600 mb-2">Order Confirmed!</h1>
      <p class="text-gray-600 mb-6">Thank you for your purchase at Archiora Pets 🐾</p>

      <div id="orderDetails" class="bg-gray-50 p-6 rounded mb-6 text-left"></div>

      <div class="flex gap-4">
        <a href="/dashboard" class="flex-1 bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-lg">Continue Shopping</a>
        <button onclick="printOrder()" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 rounded-lg">Print Receipt</button>
      </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
      <h3 class="text-xl font-bold text-orange-800 mb-4">Items Ordered</h3>
      @if($order->items && $order->items->count() > 0)
          <ul class="space-y-2">
              @foreach($order->items as $item)
                  <li>{{ $item->product_name }} (x{{ $item->quantity }}) - ₱{{ number_format($item->subtotal, 2) }}</li>
              @endforeach
          </ul>
      @else
          <p class="text-gray-600">No items found for this order. If this is unexpected, please contact support.</p>
      @endif
    </div>
  </div>

  <script>
    function getOrder() { return JSON.parse(localStorage.getItem('currentOrder') || '{}'); }
    function formatPrice(v) { const n = Number(v); return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }); }

    document.addEventListener('DOMContentLoaded', () => {
      const order = getOrder();
      const details = document.getElementById('orderDetails');
      let itemsHtml = '<strong>Items:</strong><ul class="mt-2">';
      order.items?.forEach(item => {
        itemsHtml += `<li>${item.name} x${item.quantity} = ${formatPrice(item.price * item.quantity)}</li>`;
      });
      itemsHtml += '</ul>';

      details.innerHTML = `
        <p><strong>Order #:</strong> ORD-${Date.now()}</p>
        <p><strong>Name:</strong> ${order.fullName}</p>
        <p><strong>Email:</strong> ${order.email}</p>
        <p><strong>Address:</strong> ${order.address}, ${order.city}</p>
        ${itemsHtml}
        <p class="mt-4 pt-4 border-t"><strong>Total:</strong> ${formatPrice(order.total)}</p>
      `;

      // Clear cart & order
      localStorage.removeItem('cart');
      localStorage.removeItem('currentOrder');
    });

    function printOrder() { window.print(); }
  </script>
</body>
</html>