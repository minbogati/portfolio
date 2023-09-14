@extends('backend.layouts.app')
@section('title') {{'experience'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">experience</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.experience.create')
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="sliderTable">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.N</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Designation</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End date</th>
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
@include('backend.experience.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Function to handle deletion of a slider
  function deleteslider(id) {
      if (confirm('Are you sure you want to delete this slider?')) {
          // Get the CSRF token from the meta tag
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          // Perform AJAX request to delete the slider
          $.ajax({
              url: "/experience/" + id,
              method: 'DELETE',
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
              },
              success: function(data) {
                  // Remove the row from the table on success
                  $('#sliderRow_' + id).remove();
                  alert(response.data.message);
              },
              error: function(error) {
                  console.log('Error:', error);
              }
          });
      }
  }

  $(document).ready(function() {
      $.ajax({
          url: "{{ route('getExperience') }}",
          method: 'GET',
          dataType: 'json',
          success: function(data) {
              // Process the experience and display them in the table
              var sliderTable = $('#sliderTable').find('tbody');
              var serialNumber = 1; // Initialize the serial number count

              $.each(data, function(index, slider) {
                  var editUrl = "/experience/" + slider.id + "/edit";
                  var deleteButton = '<button onclick="deleteslider(' + slider.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                  var editButton = '<button onclick="openEditModal(' + slider.id + ')" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>';

                sliderTable.append('<tr id="sliderRow_' + slider.id + '">' +
                      '<td class="text-center">' + serialNumber + '</td>' +
                      '<td class="text-center">' + slider.designation + '</td>' +
                      '<td class="text-center">' + slider.company + '</td>' +
                      '<td class="text-center">' + slider.start_date + '</td>' +
                      '<td class="text-center">' + slider.end_date + '</td>' +
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

 // Function to open the popup modal for editing
function openEditModal(id) {
  // Fetch the data for the selected experience using AJAX
  $.ajax({
    url: "/experiences/" + id + "/edit",
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      // Populate the form fields with the fetched data
      $('#designation').val(data.designation);
      $('#company').val(data.company);
      $('#address').val(data.address);
      $('#start_date').val(data.start_date);
      $('#end_date').val(data.end_date);
      $('#descriptions').val(data.descriptions);
      $('#sliderId').val(data.id);

      // Show the modal
      $('#editModal').modal('show');
    },
    error: function(error) {
      console.log('Error:', error);
    }
  });
}

// Function to handle saving the edited experience data
function saveExperience() {
  var id = $('#sliderId').val();
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  // Get the form data
  var formData = {
    designation: $('#designation').val(),
    company: $('#company').val(),
    address: $('#address').val(),
    start_date: $('#start_date').val(),
    end_date: $('#end_date').val(),
    descriptions: $('#descriptions').val(),
    _token: csrfToken,
    _method: 'PUT' // Use the method spoofing technique to send a PUT request
  };

  // Perform AJAX request to update the experience data
  $.ajax({
    url: "/experiences/" + id,
    method: 'POST', // Use POST method as Laravel supports PUT/DELETE via POST with _method field
    data: formData,
    dataType: 'json',
    success: function(data) {
      // Update the row in the table with the edited data on success
      var row = $('#sliderRow_' + id);
      row.find('td:eq(1)').text(formData.designation);
      row.find('td:eq(2)').text(formData.company);
      row.find('td:eq(3)').text(formData.address);
      row.find('td:eq(4)').text(formData.start_date);
      row.find('td:eq(5)').text(formData.end_date);
      row.find('td:eq(6)').text(formData.descriptions);

      // Hide the modal after successful update
      $('#editModal').modal('hide');
    },
    error: function(error) {
      console.log('Error:', error);
    }
  });
}

</script>

@endsection
