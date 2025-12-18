<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>GCash Payment - Archiora Pets</title>
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Poppins] text-gray-800">
  <div class="max-w-2xl mx-auto p-8">
    <div class="bg-white p-8 rounded-lg shadow text-center">
      <h1 class="text-3xl font-bold text-blue-600 mb-4">GCash Payment</h1>
      <div id="orderInfo" class="mb-6 text-left bg-gray-50 p-4 rounded"></div>
      
      <div class="mb-6">
        <p class="text-gray-600 mb-4">Scan the QR code or send to:</p>
        <div class="bg-gray-100 p-4 rounded text-center text-2xl font-bold">
          09XXX XXXX XXX
        </div>
      </div>

      <button onclick="confirmPayment()" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg mb-2">✓ I've Paid</button>
      <button onclick="window.history.back()" class="w-full bg-gray-400 text-white py-3 rounded-lg">← Back</button>
    </div>
  </div>

  <script>
    function getOrder() { return JSON.parse(localStorage.getItem('currentOrder') || '{}'); }
    function formatPrice(v) { const n = Number(v); return n.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }); }

    document.addEventListener('DOMContentLoaded', () => {
      const order = getOrder();
      document.getElementById('orderInfo').innerHTML = `
        <p><strong>Amount:</strong> ${formatPrice(order.total)}</p>
        <p><strong>Name:</strong> ${order.fullName}</p>
      `;
    });

    function confirmPayment() {
      if (confirm('Confirm payment received?')) {
        window.location.href = '{{ route("user.order.confirmation") }}';
      }
    }
  </script>
</body>
</html>