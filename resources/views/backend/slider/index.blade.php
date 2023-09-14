@extends('backend.layouts.app')
@section('title') {{'sliders'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">sliders</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.slider.create')
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">link</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">subtitle</th>
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
@include('backend.slider.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Function to handle deletion of a slider
  function deleteslider(id) {
      if (confirm('Are you sure you want to delete this slider?')) {
          // Get the CSRF token from the meta tag
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          // Perform AJAX request to delete the slider
          $.ajax({
              url: "/sliders/" + id,
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
  $(document).on('submit', '#editSliderForm', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var form = $(this);
    var formData = new FormData(form[0]);

    $.ajax({
      url: form.attr('action'),
      method: 'POST',
      data: formData,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function(data) {
        // Update the table row with the updated slider data
        var sliderRow = $('#sliderRow_' + data.id);
        sliderRow.find('.text-center:eq(1)').text(data.title);
        sliderRow.find('.text-center:eq(2)').html('<a href="' + data.link + '" target="_blank">Link</a>');
        sliderRow.find('.text-center:eq(3)').html('<img width="80px" src="{{ asset('backend/img/sliders/') }}/' + data.image + '">');
        sliderRow.find('.text-center:eq(4)').text(data.subtitle1);
        // Update more fields as needed for other slider properties

        // Hide the edit modal after successful update
        $('#editSliderModal').modal('hide');
      },
      error: function(error) {
        console.log('Error:', error);
      }
    });
  });
  function editSlider(id) {
    // Perform AJAX request to get the slider details
    $.ajax({
      url: "/sliders/" + id + "/edit",
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        // Populate the modal fields with slider details
        $('#editSliderTitle').val(data.title);
        $('#editSliderLink').val(data.link);
        $('#editSliderSubtitle1').val(data.subtitle1);
        $('#editSliderSubtitle2').val(data.subtitle2);
        $('#currentSliderImage').attr('src', "{{ asset('backend/img/sliders/') }}/" + data.image);

        // Add more fields as needed for the slider properties

        // Set the form action URL to the appropriate edit route
        $('#editSliderForm').attr('action', '/sliders/' + id);

        // Show the edit modal
        $('#editSliderModal').modal('show');
      },
      error: function(error) {
        console.log('Error:', error);
      }
    });
  }

  // Add an event listener for the edit button clicks
  $(document).on('click', '.edit-slider-btn', function() {
    var sliderId = $(this).data('slider-id');
    editSlider(sliderId);
  });
  $(document).ready(function() {
      $.ajax({
          url: "{{ route('getsliders') }}",
          method: 'GET',
          dataType: 'json',
          success: function(data) {
              // Process the sliders and display them in the table
              var sliderTable = $('#sliderTable').find('tbody');
              var serialNumber = 1; // Initialize the serial number count

              $.each(data, function(index, slider) {
                var editButton = '<button class="btn btn-success btn-sm edit-slider-btn" data-slider-id="' + slider.id + '"><i class="fa fa-edit"></i></button>';
                  var editUrl = "/sliders/" + slider.id + "/edit";
                  var deleteButton = '<button onclick="deleteslider(' + slider.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                  var imageUrl = "{{ asset('backend/img/sliders/') }}/" + slider.image;
                var imageTag = '<img width="80px" src="' + imageUrl + '">';
                var linkUrl = '<a href="'+ slider.link +'" target="_blank">Link</a>';
                sliderTable.append('<tr id="sliderRow_' + slider.id + '">' +
                      '<td class="text-center">' + serialNumber + '</td>' +
                      '<td class="text-center">' + slider.title + '</td>' +
                      '<td class="text-center">' + linkUrl + '</td>' +
                      '<td class="text-center">' + imageTag + '</td>' +
                      '<td class="text-center">' + slider.subtitle1 + '</td>' +
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
