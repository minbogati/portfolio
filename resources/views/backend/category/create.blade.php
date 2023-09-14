<!-- Modal -->
<button type="button" class="btn bg-gradient-dark" style="margin-right: 30px" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create
  </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Create Categories</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="categoryForm" action="{{ route('categories.store') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                    <input type="text" name="title" placeholder="Enter Title" class="form-control">
                    </div>
                    
                </div>
                <div class="col-md-12">
                  <div class="input-group input-group-outline my-3">
                  <input type="text" name="icon" placeholder="Enter icon class name" class="form-control">
                  <small>Example:flaticon-seo</small>
                  </div>
                  
              </div>
                <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                    <textarea name="description" id="description" placeholder="Enter short description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="submitCategory" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    document.getElementById('submitCategory').addEventListener('click', function () {
        const form = document.getElementById('categoryForm');
        const formData = new FormData(form);

        axios.post(form.action, formData)
            .then(response => {
                // Handle success response
                // alert(response.data.message);
                // Reset the form
                form.reset();
                // Close the modal
                const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.hide();
                // Refresh the data (Assuming you have some data listing on the page, you can use appropriate function or method to refresh it)
                refreshData();
                alert('Category Added Successfully.');
            })
            .catch(error => {
                // Handle error response
                alert('An error occurred while creating the category.');
            });
    });

    function refreshData() {
        // Implement your data refresh logic here.
        // This function should update the data listing on the page.
    }
</script>
