@extends('backend.layouts.app')
@section('title') {{'Profiles'}} @endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Profiles</h6>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  @empty($profile)
                  @include('backend.profile.create')
                  @else
                  <form id="profileForm" action="{{ route('profiles.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $profile->name }}" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" name="mobile" value="{{ $profile->mobile }}" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-outline is-valid my-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" class="form-control" name="image">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Alternative Mobile</label>
                                <input type="number" name="alternative_mobile" value="{{ $profile->alternative_mobile }}" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $profile->email }}" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" value="{{ $profile->address }}" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" value="{{ $profile->designation }}" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" id="" cols="30" rows="10" class="form-control">{{ $profile->short_description }}</textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $profile->description }}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Facebook</label>
                                <input type="url" class="form-control" value="{{ $profile->facebook }}" name="facebook">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="input-group input-group-outline is-valid my-3">
                                <label class="form-label">Linkedin</label>
                                <input type="url" class="form-control" value="{{ $profile->linkedin }}" name="linkedin">
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-outline is-valid my-3">
                                  <label class="form-label">Instagram</label>
                                  <input type="url" class="form-control" value="{{ $profile->instagram }}" name="instagram">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary btn-lg w-100">Save Changes</button>                                </div>
                          </div>
                    </div>
                        
                </form>
                  @endempty
                    
                </div>
              </div>
            </div>
          </div>
      </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Listen for form submission
        $('#profileForm').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Extract the profile ID from the form action attribute
            var profileId = $(this).attr('action').split('/').pop();

            // Make the AJAX request
            $.ajax({
                url: '/profiles/' + profileId, // Change the URL to the specific update route
                type: 'PUT', // Use PUT method for updating data
                data: formData,
                dataType: 'json',
                success: function (response) {
                    // Handle the success response (e.g., show a success message)
                    console.log(response.message);
                    alert('Profile updated successfully');
                },
                error: function (xhr, status, error) {
                    // Handle the error response (e.g., show an error message)
                    console.error(error);
                    alert('An error occurred while updating the profile');
                }
            });
        });
    });
</script>

  

@endsection
