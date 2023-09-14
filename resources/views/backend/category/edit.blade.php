<!-- Modal for Editing Category -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing category -->
                <form id="editCategoryForm">
                    @csrf
                    @method('PUT') <!-- Add this line to use the PUT method -->
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Title</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_icon" class="form-label">icon</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="edit_icon" name="icon" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <div class="input-group input-group-outline my-3">
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

