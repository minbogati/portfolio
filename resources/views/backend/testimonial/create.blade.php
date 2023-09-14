<!-- Modal -->
<button type="button" class="btn bg-gradient-dark" style="margin-right: 30px" data-bs-toggle="modal" data-bs-target="#createtestimonial">
    Create
  </button>
  <div class="modal fade" id="createtestimonial" tabindex="-1" role="dialog" aria-labelledby="createtestimonialLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="createtestimonialLabel">Create testimonials</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="testimonialForm" action="{{ route('testimonials.store') }}" method="POST">
                @csrf
             <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <input type="text" name="name" placeholder="Enter Name" class="form-control">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <input type="text" name="designation" placeholder="Enter Designation" class="form-control">
                    </div>    
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <input type="text" min="0" name="title" placeholder="Enter title" class="form-control">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                    <input type="file" min="0" name="image" class="form-control">
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                    <textarea name="message" id="message" placeholder="Enter message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="submittestimonial" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document.getElementById('submittestimonial').addEventListener('click', function () {
        const form = document.getElementById('testimonialForm');
        const formData = new FormData(form);

        axios.post(form.action, formData)
            .then(response => {
                // Handle success response
                // alert(response.data.message);
                // Reset the form
                alert(response.data.message);
                form.reset();
                // Close the modal
                const modal = new bootstrap.Modal(document.getElementById('createtestimonial'));
                modal.hide();
                // Refresh the data (Assuming you have some data listing on the page, you can use appropriate function or method to refresh it)
                location.reload();
            })
            .catch(error => {
                if (error.response && error.response.data && error.response.data.errors) {
                    const errorMessages = Object.values(error.response.data.errors).join('\n');
                    alert('Validation Error:\n' + errorMessages);
                } else {
                    alert('An error occurred while creating the testimonial.');
                }
            });
    });

    function refreshData() {
        // Implement your data refresh logic here.
        // This function should update the data listing on the page.
    }
</script>
