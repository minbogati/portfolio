@extends('backend.layouts.app')
@section('title') {{'testimonials'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">testimonials</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.testimonial.create')
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="testimonialTable">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.N</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
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
@include('backend.testimonial.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function deletetestimonial(id) {
            if (confirm('Are you sure you want to delete this testimonial?')) {
                // Get the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Perform AJAX request to delete the testimonial
                $.ajax({
                    url: "/testimonials/" + id,
                    method: 'DELETE',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                    },
                    success: function(data) {
                        // Remove the row from the table on success
                        $('#testimonialRow_' + id).remove();
                        alert(response.data.message);
                        location.reload();
                    },
                    error: function(error) {
                        alert(response.data.error);
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
        // Function to open the modal for editing testimonial data
        function openEditModal(id) {
            // Fetch testimonial data using AJAX
            $.ajax({
                url: "/testimonials/" + id + "/edit",
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the modal fields with the fetched data
                    $('#edittestimonialId').val(data.id);
                    $('#editTitle').val(data.title);
                    $('#editName').val(data.name);
                    $('#editDesignation').val(data.designation);
                    $('#editMessage').val(data.message);
                    $('#currenttestimonialImage').attr('src', "{{ asset('backend/img/testimonials/') }}/" + data.image);
                    // Add other fields here to populate the modal with testimonial data

                    // Open the modal
                    $('#edittestimonialModal').modal('show');
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
        $('#editTestimonialForm').submit(function(e) {
    e.preventDefault();

    var csrfToken = $('input[name="_token"]').val();
    var formData = new FormData(this);
    var testimonialId = $('#edittestimonialId').val();

    formData.append('_token', csrfToken);
    formData.append('_method', 'PUT'); // Add this line for PUT request

    $.ajax({
        url: '/testimonials/' + testimonialId, // Make sure the URL matches your resource route structure
        method: 'POST', // Use POST method to simulate a PUT request
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle success response
            // You might want to update the UI, close the modal, etc.
            alert('Update Success');
            location.reload();  
        },
        error: function(error) {
            alert('Something went wrong');
        }
    });
});

        // Add event delegation for the 'Edit' button click
        $(document).on('click', '.btn-edit', function() {
            var testimonialId = $(this).data('testimonial-id');
            openEditModal(testimonialId);
        });

        $.ajax({
            url: "{{ route('getTestimonials') }}",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Process the testimonials and display them in the table
                var testimonialTable = $('#testimonialTable').find('tbody');
                var serialNumber = 1; // Initialize the serial number count

                $.each(data, function(index, testimonial) {
                    var deleteButton = '<button onclick="deletetestimonial(' + testimonial.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    var imageUrl = "{{ asset('backend/img/testimonials/') }}/" + testimonial.image;
                    var imageTag = '<img width="80px" src="' + imageUrl + '">';
                    var editButton = '<button class="btn btn-success btn-sm btn-edit" data-testimonial-id="' + testimonial.id + '"><i class="fa fa-edit"></i></button>';
                    testimonialTable.append('<tr id="testimonialRow_' + testimonial.id + '">' +
                        '<td class="text-center">' + serialNumber + '</td>' +
                        '<td class="text-center">' + testimonial.name + '</td>' +
                        '<td class="text-center">' + testimonial.designation + '</td>' +
                        '<td class="text-center">' + imageTag + '</td>' +
                        '<td class="text-center">' + testimonial.title + '</td>' +
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
