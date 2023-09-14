@extends('backend.layouts.app')
@section('title') {{'blog'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">blog</h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Button trigger modal -->
                        @include('backend.blog.create')
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date</th>
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
@include('backend.blog.edit')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Function to handle deletion of a slider
function deleteslider(id) {
  if (confirm('Are you sure you want to delete this slider?')) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
      url: "/blogs/" + id,
      method: 'DELETE',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function (data) {
        $('#sliderRow_' + id).remove();
        alert(data.message); // Use 'data.message' instead of 'response.data.message'
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });
  }
}

// Function to handle editing of a slider
function editSlider(id) {
  // Fetch blog data and populate the modal form here using AJAX
  $.ajax({
    url: "/blogs/" + id + "/edit",
    method: 'GET',
    dataType: 'json',
    success: function (data) {
      // Assuming the form fields are named 'title', 'image', and 'blog_id'
      $('#blog_id').val(data.id);
      $('#title').val(data.title);
      $('#short_description').val(data.short_description);
      $('#description').val(data.description);
      // Populate other form fields accordingly...

      // Show the modal popup
      $('#editModal').modal('show');
    },
    error: function (error) {
      console.log('Error:', error);
    }
  });
}

$(document).ready(function () {
  $.ajax({
    url: "{{ route('getBlog') }}",
    method: 'GET',
    dataType: 'json',
    success: function (data) {
      var sliderTable = $('#sliderTable').find('tbody');
      var serialNumber = 1;

      $.each(data, function (index, slider) {
        var editButton = '<button onclick="editSlider(' + slider.id + ')" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>';
        var deleteButton = '<button onclick="deleteslider(' + slider.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
        var imageUrl = "{{ asset('backend/img/blogs/') }}/" + slider.image;
        var imageTag = '<img width="80px" src="' + imageUrl + '">';
        var createdAtDate = new Date(slider.created_at);
        var formattedCreatedAt = createdAtDate.getDate() + '-' + (createdAtDate.getMonth() + 1) + '-' + createdAtDate.getFullYear();

        sliderTable.append('<tr id="sliderRow_' + slider.id + '">' +
          '<td class="text-center">' + serialNumber + '</td>' +
          '<td class="text-center">' + slider.title + '</td>' +
          '<td class="text-center">' + imageTag + '</td>' +
          '<td class="text-center">' + formattedCreatedAt + '</td>' +
          '<td class="text-center">' + editButton + '</td>' +
          '<td class="text-center">' + deleteButton + '</td>' +
          '</tr>');
        serialNumber++;
      });
    },
    error: function (error) {
      console.log('Error:', error);
    }
  });

  // Handle the form submission for updating the blog data
  $('#editForm').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    var blogId = formData.get('blog_id');

    // Append the CSRF token to the form data
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('_method', 'PUT'); // Add the HTTP method for update

    // Perform the AJAX request to update the blog data
    $.ajax({
      url: "/blogs/" + blogId,
      method: 'POST', // Use POST method for update (Laravel resource routes convention)
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        // Close the modal after successful update
        alert('Blog Added Success');
        $('#editModal').modal('hide');
        location.reload();
        // You may also want to update the table row data here
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });
  });
});

</script>

@endsection
