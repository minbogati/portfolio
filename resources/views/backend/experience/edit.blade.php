<!-- Add a Bootstrap modal to your HTML -->
<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Experience</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form to edit the experience data -->
          <form id="editForm">
            <div class="form-group">
              <label for="designation">Designation</label>
              <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" class="form-control" id="end_date" name="end_date">
            </div>
            <div class="form-group">
                <label for="descriptions">descriptions</label>
                <textarea name="descriptions" id="descriptions" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <input type="hidden" id="sliderId" name="sliderId">
            <button type="button" class="btn btn-primary" onclick="saveExperience()">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
 
  