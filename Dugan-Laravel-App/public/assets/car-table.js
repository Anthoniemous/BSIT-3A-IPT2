// car-table.js - jQuery DataTables + Bootstrap modal AJAX CRUD (clean)

(function ($) {
  'use strict';

  function baseUrl() { return `${location.protocol}//${location.host}`; }
  function csrf() { return $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val(); }

  let editingId = null;


  

  // Initialize DataTable (jQuery DataTables expected)
  const table = $('#car-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: `${baseUrl()}/products/list`,
    columns: [
      { data: 'car_id', name: 'car_id' },
      { data: 'brand', name: 'brand' },
      { data: 'model', name: 'model' },
      { data: 'year', name: 'year' }, 
      { data: 'transmission', name: 'transmission' },
      { data: 'fuel_type', name: 'fuel_type' },
      { data: 'price', name: 'price' },
      { data: 'quantity', name: 'quantity' },
      { data: 'description', name: 'description', render: function (d) { return d ? d.substring(0, 50) + '...' : ''; } },
      { data: 'car_id', orderable: false, searchable: false, render: function (id) {
          return '<div class="d-flex justify-content-center gap-2">'
            + '<button class="btn btn-sm btn-outline-primary edit-car-btn" data-id="' + id + '">Edit</button>'
            + '<button class="btn btn-sm btn-outline-danger delete-car-btn" data-id="' + id + '">Delete</button>'
            + '</div>';
        }
      }
    ]
  });

  function resetForm() {
    const form = document.getElementById('car-form');
    if (form) form.reset();
    editingId = null;
    $('#carFormModalLabel').text('Add New Car');
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback.temp').remove();
  }

  function showModal() {
    const modal = new bootstrap.Modal(document.getElementById('carFormModal'));
    modal.show();
  }

  function showValidationErrors(errors) {
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback.temp').remove();
    Object.keys(errors).forEach(function (k) {
      const msg = Array.isArray(errors[k]) ? errors[k].join(' ') : errors[k];
      const $input = $('[name="' + k + '"]');
      if ($input.length) {
        $input.addClass('is-invalid');
        $input.parent().append('<div class="invalid-feedback temp" style="display:block">' + msg + '</div>');
      }
    });
  }

  // Save handler (create/update)
  $('#save-car').on('click', function (e) {
    e.preventDefault();
    const fd = new FormData($('#car-form')[0]);
    fd.append('_token', csrf());
    if (editingId) fd.append('_method', 'PUT');

    const url = editingId ? baseUrl() + '/products/update/' + editingId : baseUrl() + '/products/add';

    $.ajax({
      url: url,
      method: 'POST',
      data: fd,
      processData: false,
      contentType: false,
      headers: { 'X-CSRF-TOKEN': csrf() },
      success: function (res) {
        const modalEl = document.getElementById('carFormModal');
        const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
        resetForm();
        table.ajax.reload(null, false);
      },
      error: function (xhr) {
        if (xhr.status === 422 && xhr.responseJSON) {
          showValidationErrors(xhr.responseJSON.errors || xhr.responseJSON);
        } else {
          console.error(xhr.responseText || xhr.statusText);
          alert('Save failed — check console');
        }
      }
    });
  });

  // Edit / Delete delegation
  $('#car-table').on('click', '.edit-car-btn', function () {
    const id = $(this).data('id');
    editingId = id;
    $.get(baseUrl() + '/products/' + id)
      .done(function (car) {
        $('#brand').val(car.brand || '');
        $('#model').val(car.model || '');
        $('#year').val(car.year || '');
        $('#transmission').val(car.transmission || 'Automatic');
        $('#fuel_type').val(car.fuel_type || 'Gasoline');
        $('#price').val(car.price || '');
        $('#quantity').val(car.quantity || 1);
        $('#description').val(car.description || '');
        $('#carFormModalLabel').text('Edit Car');
        showModal();
      })
      .fail(function (err) { console.error(err); alert('Failed to load car'); });
  });

  $('#car-table').on('click', '.delete-car-btn', function () {
    const id = $(this).data('id');
    if (!confirm('Are you sure?')) return;
    $.ajax({
      url: baseUrl() + '/products/' + id,
      method: 'DELETE',
      headers: { 'X-CSRF-TOKEN': csrf() },
      success: function () { table.ajax.reload(null, false); },
      error: function (xhr) { console.error(xhr); alert('Delete failed'); }
    });
  });

  // Reset form when Add New Car modal is opened via the button
  $('button[data-bs-target="#carFormModal"]').on('click', function () { resetForm(); showModal(); });

})(jQuery);
