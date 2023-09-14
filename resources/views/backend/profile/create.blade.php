<form id="profileCreateForm" action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Mobile</label>
                <input type="number" name="mobile" value="" class="form-control">
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
                <input type="number" name="alternative_mobile" value="" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" value="" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Designation</label>
                <input type="text" name="designation" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Facebook</label>
                <input type="url" class="form-control" value="" name="facebook">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline is-valid my-3">
                <label class="form-label">Linkedin</label>
                <input type="url" class="form-control" value="" name="linkedin">
              </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-outline is-valid my-3">
                  <label class="form-label">Instagram</label>
                  <input type="url" class="form-control" value="" name="instagram">
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary btn-lg w-100">Save Changes</button>                                </div>
          </div>
    </div>
        
  </form>
  <script>
    $(document).ready(function() {
        $('#saveChangesBtn').click(function() {
            // Serialize the form data
            var formData = $('#profileCreateForm').serialize();
    
            // Make an Ajax request to the Laravel backend
            $.ajax({
                url: "{{ route('profiles.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    // Handle the success response (e.g., show a success message)
                    console.log(response.message);
                      alert('Profile updated successfully');
                },
                error: function(error) {
                    // Handle the error response (e.g., show an error message)
                    alert("Error occurred while saving data!");
                }
            });
        });
    });
  </script>