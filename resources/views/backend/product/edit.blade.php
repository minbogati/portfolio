<!-- edit_modal.blade.php -->
<div class="modal" id="editProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editProductForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields to edit product data -->
                    <input type="hidden" name="product_id" id="editProductId">
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editLink">Link</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editLink" name="link" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editAmount">Amount</label>
                        <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" id="editAmount" name="amount" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categorySelect">Select Category</label>
                        <div class="input-group input-group-outline my-3">
                        <select class="form-control" id="categorySelect" name="category_id">
                            <option value="">Select a category</option>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <div class="input-group input-group-outline my-3">
                        <textarea name="descriptions" class="form-control" id="editDescription" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editProductImage">Current Image</label><br>
                        <img id="currentProductImage" src="" alt="Product Image" width="150">
                      </div>
            
                      <div class="form-group">
                        <label for="editProductNewImage">New Image</label>
                        <input type="file" class="form-control" id="editProductNewImage" name="new_image">
                        <small class="form-text text-muted">Upload a new image to update the Product image.</small>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
