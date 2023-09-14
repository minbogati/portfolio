@extends('backend.layouts.app')
@section('title') {{'products'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">products</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.product.create')
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="productTable">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.N</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">link</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">amount</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
</div>
@include('backend.product.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Function to handle deletion of a product
    function deleteproduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Perform AJAX request to delete the product
            $.ajax({
                url: "/products/" + id,
                method: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                },
                success: function(data) {
                    // Remove the row from the table on success
                    $('#productRow_' + id).remove();
                    alert(data.message);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    }
    $(document).ready(function() {
    // Fetch categories using AJAX
    $.ajax({
        url: "{{ route('getCategories') }}",
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate the select dropdown with the fetched categories
            var categorySelect = $('#categorySelect');

            $.each(data, function(index, category) {
                categorySelect.append('<option value="' + category.id + '">' + category.title + '</option>');
            });
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
});
    // Function to open the modal for editing product data
    function openEditModal(id) {
        // Fetch product data using AJAX
        $.ajax({
            url: "/products/" + id + "/edit",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the modal fields with the fetched data
                $('#editProductId').val(data.id);
                $('#editTitle').val(data.title);
                $('#editLink').val(data.link);
                $('#editAmount').val(data.amount);
                $('#editDescription').val(data.descriptions);
                $('#currentProductImage').attr('src', "{{ asset('backend/img/products/') }}/" + data.image);
                // Add other fields here to populate the modal with product data

                // Open the modal
                $('#editProductModal').modal('show');
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }

    // Add event delegation for the 'Edit' button click
    $(document).on('click', '.btn-edit', function() {
        var productId = $(this).data('product-id');
        openEditModal(productId);
    });
    $('#editProductForm').submit(function(event) {
        event.preventDefault();

        // Get the form data using FormData
        var formData = new FormData(this);
        var productId = $('#editProductId').val();

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Append the CSRF token to the form data
        formData.append('_token', csrfToken);

        // Perform AJAX request to update the product
        $.ajax({
            url: "/products/" + productId,
            method: 'PUT',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // Close the modal
                $('#editProductModal').modal('hide');
                // Refresh the product table
                // You can either fetch the updated data from the server and refresh the table or update the table manually with the edited data.
                // For simplicity, let's reload the page to show the updated data (not recommended for production)
                location.reload();
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });

    $.ajax({
        url: "{{ route('getProducts') }}",
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Process the products and display them in the table
            var productTable = $('#productTable').find('tbody');
            var serialNumber = 1; // Initialize the serial number count

            $.each(data, function(index, product) {
                var deleteButton = '<button onclick="deleteproduct(' + product.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                var imageUrl = "{{ asset('backend/img/products/') }}/" + product.image;
                var imageTag = '<img width="80px" src="' + imageUrl + '">';
                var linkUrl = '<a href="'+ product.link +'" target="_blank">Link</a>';
                var editButton = '<button class="btn btn-success btn-sm btn-edit" data-product-id="' + product.id + '"><i class="fa fa-edit"></i></button>';
                productTable.append('<tr id="productRow_' + product.id + '">' +
                      '<td class="text-center">' + serialNumber + '</td>' +
                      '<td class="text-center">' + product.title + '</td>' +
                      '<td class="text-center">' + linkUrl + '</td>' +
                      '<td class="text-center">' + imageTag + '</td>' +
                      '<td class="text-center">' + product.amount + '</td>' +
                      '<td class="text-center">' + editButton + '</td>' +
                      '<td class="text-center">' + deleteButton + '</td>' +
                  '</tr>');
                serialNumber++; // Increment the serial number for the next iteration
            });
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
});

</script>

@endsection
