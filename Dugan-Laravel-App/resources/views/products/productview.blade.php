<x-app-layout>
       <x-slot name="header">
       
    </x-slot>


     <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-500 leading-tight">
            {{ __('Manage Cars') }}
        </h2>
    </x-slot>

   <div class="container mt-5">


    
 
    {{-- <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">+ Add Car</a> --}}
    

    {{-- Modal --}}
    <!-- Trigger Button -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carFormModal">
  Add New Car
</button>

<!-- Modal -->
<div class="modal fade" id="carFormModal" tabindex="-1" aria-labelledby="carFormModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="carFormModalLabel">Add New Car</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div>
        <form id="car-form" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="modal-body">

  <!-- Brand -->
  <div class="mb-3" id="brand-group">
    <label for="brand" class="form-label">Brand</label>
    <input type="text" name="brand" id="brand" class="form-control" maxlength="50" required>
  </div>

  <!-- Model -->
  <div class="mb-3" id="model-group">
    <label for="model" class="form-label">Model</label>
    <input type="text" name="model" id="model" class="form-control" maxlength="50" required>
  </div>

  <!-- Year -->
  <div class="mb-3" id="year-group">
    <label for="year" class="form-label">Year</label>
    <input type="number" name="year" id="year" class="form-control" min="1900" max="2099" required>
  </div>

  <!-- Transmission -->
  <div class="mb-3" id="transmission-group">
    <label for="transmission" class="form-label">Transmission</label>
    <select name="transmission" id="transmission" class="form-select">
      <option value="Manual">Manual</option>
      <option value="Automatic" selected>Automatic</option>
    </select>
  </div>

  <!-- Fuel Type -->
  <div class="mb-3" id="fuel-type-group">
    <label for="fuel_type" class="form-label">Fuel Type</label>
    <select name="fuel_type" id="fuel_type" class="form-select">
      <option value="Gasoline" selected>Gasoline</option>
      <option value="Diesel">Diesel</option>
      <option value="Hybrid">Hybrid</option>
      <option value="Electric">Electric</option>
    </select>
  </div>

  <!-- Price -->
  <div class="mb-3" id="price-group">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" required>
  </div>

  <!-- Quantity -->
  <div class="mb-3" id="quantity-group">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
  </div>

  <!-- Description -->
  <div class="mb-3" id="description-group">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
  </div>

  <!-- Image -->
  <div class="mb-3" id="image-group">
    <label for="image" class="form-label">Car Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
  </div>

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-primary" id="save-car">Save Car</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
</div>

        </form>

      </div>
    </div>
  </div>
</div>



    <table id="car-table" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Transmission</th>
                <th>Fuel Type</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</div>

</x-app-layout>