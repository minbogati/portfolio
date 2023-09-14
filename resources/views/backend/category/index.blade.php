@extends('backend.layouts.app')
@section('title') {{'Categories'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Categories</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.category.create')
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="categoryTable">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.N</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Icon</th>
                        <th class="text-center text-secondary opacity-7">Edit</th>
                        <th class="text-center text-secondary opacity-7">Delete</th>
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
@include('backend.category.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Function to handle deletion of a category
  function deleteCategory(id) {
      if (confirm('Are you sure you want to delete this category?')) {
          // Get the CSRF token from the meta tag
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          // Perform AJAX request to delete the category
          $.ajax({
              url: "/categories/" + id,
              method: 'DELETE',
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
              },
              success: function(data) {
                  // Remove the row from the table on success
                  $('#categoryRow_' + id).remove();
              },
              error: function(error) {
                  console.log('Error:', error);
              }
          });
      }
  }

  // Function to handle editing of a category
  function editCategory(id) {
      var editUrl = "/categories/" + id + "/edit";

      // Perform AJAX request to get the category data for editing
      $.ajax({
          url: editUrl,
          method: 'GET',
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
              // Update the modal fields with category data
              $('#category_id').val(data.id);
              $('#edit_title').val(data.title);
              $('#edit_icon').val(data.icon);
              $('#edit_description').val(data.description);

              // Show the edit category modal
              $('#editCategoryModal').modal('show');
          },
          error: function(error) {
              console.log('Error:', error);
          }
      });
  }
  $('#editCategoryForm').on('submit', function (e) {
            e.preventDefault();
            var categoryId = $('#category_id').val();
            var formData = $(this).serialize();

            $.ajax({
                url: "/categories/" + categoryId,
                method: 'PUT',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    // Update the table row with new data
                    var categoryRow = $('#categoryRow_' + categoryId);
                    categoryRow.find('td:eq(1)').text(data.title);
                    categoryRow.find('td:eq(2)').text(data.icon);
                    categoryRow.find('td:eq(3)').text(data.description);

                    // Hide the modal
                    $('#editCategoryModal').modal('hide');
                    alert('Category Updated Successfully.');
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
  $(document).ready(function() {
      $.ajax({
          url: "{{ route('getCategories') }}",
          method: 'GET',
          dataType: 'json',
          success: function(data) {
              // Process the categories and display them in the table
              var categoryTable = $('#categoryTable').find('tbody');
              var serialNumber = 1; // Initialize the serial number count

              $.each(data, function(index, category) {
                  var deleteButton = '<button onclick="deleteCategory(' + category.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                  var editButton = '<button onclick="editCategory(' + category.id + ')" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>';
                  categoryTable.append('<tr id="categoryRow_' + category.id + '">' +
                      '<td class="text-center">' + serialNumber + '</td>' +
                      '<td class="text-center">' + category.title + '</td>' +
                      '<td class="text-center">' + category.icon + '</td>' +
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
