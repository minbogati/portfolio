<!-- edit_modal.blade.php -->
<div class="modal" id="edittestimonialModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editTestimonialForm" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields to edit testimonial data -->
                    <input type="hidden" name="testimonial_id" id="edittestimonialId">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="editDesignation">Designation</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editDesignation" name="designation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="editMessage">Message</label>
                        <div class="input-group input-group-outline my-3">
                        <textarea name="message" class="form-control" id="editMessage" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edittestimonialImage">Current Image</label><br>
                        <img id="currenttestimonialImage" src=""  alt="testimonial Image" width="150">
                      </div>
            
                      <div class="form-group">
                        <label for="edittestimonialNewImage">New Image</label>
                        <input type="file" class="form-control" id="edittestimonialNewImage" name="new_image">
                        <small class="form-text text-muted">Upload a new image to update the testimonial image.</small>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveEditButton" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

    