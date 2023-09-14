<!-- Add the following modal HTML to your page -->
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Add your blog edit form here -->
          <form id="editForm">
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="start_date">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="short_description">Short Desccription</label>
                    <textarea name="short_description" class="form-control" id="short_description" cols="30" rows="3"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                </div>
                
                <div class="col-md-12">
                    <input type="hidden" name="blog_id" id="blog_id">
                <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  