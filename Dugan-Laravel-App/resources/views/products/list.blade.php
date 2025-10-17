<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Shop Cars') }}</h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1rem; }
    .product-card { border: 1px solid #e6e6e6; border-radius: 8px; overflow: hidden; background: #fff; transition: transform .12s ease, box-shadow .12s ease; }
    .product-card:hover { transform: translateY(-6px); box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
    .product-img { height: 160px; object-fit: cover; width: 100%; background: #f5f5f5; }
    .product-body { padding: .75rem; }
    .product-title { font-size: .95rem; font-weight: 600; color: #111827; }
    .product-price { color: #dc2626; font-weight: 700; }
    .badge-stock { position: absolute; right: 8px; top: 8px; }
    </style>

    <div class="container py-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="m-0">Shop Cars</h3>
        <form method="GET" action="{{ route('products.shop') }}" class="d-flex">
          <input type="search" name="q" class="form-control form-control-sm me-2" placeholder="Search by brand or model" value="{{ request('q') }}">
          <button class="btn btn-sm btn-primary">Search</button>
        </form>
      </div>

      <div class="product-grid">
        @foreach($cars as $car)
          <div class="product-card position-relative">
            @if($car->quantity <= 0)
              <span class="badge bg-secondary badge-stock">Out of stock</span>
            @endif
            @php
              $imageUrl = $car->image ?? 'https://via.placeholder.com/400x300?text=No+Image';
            @endphp

            <img src="{{ $imageUrl }}" alt="{{ $car->brand }} {{ $car->model }}" class="product-img" loading="lazy">
            <div class="product-body">
              <div class="d-flex justify-content-between align-items-start">
                <div>
                  <div class="product-title">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</div>
                  <div class="text-muted small">{{ $car->transmission }} • {{ $car->fuel_type }}</div>
                </div>
                <div class="text-end">
                  <div class="product-price">${{ number_format($car->price, 2) }}</div>
                  <div class="text-muted small">{{ $car->quantity }} left</div>
                </div>
              </div>

              <p class="mt-2 mb-0 text-muted small">{{ \Illuminate\Support\Str::limit($car->description, 80) }}</p>

              <div class="mt-3 d-flex gap-2">
                <a href="#" class="btn btn-sm btn-outline-primary flex-grow-1">View</a>
                <a href="#" class="btn btn-sm btn-warning">Buy</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-4">
        {{ $cars->withQueryString()->links() }}
      </div>
    </div>

</x-app-layout>
