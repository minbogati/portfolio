<div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="editSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h5 class="modal-title" id="editSliderModalLabel">Edit Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editSliderForm" method="POST" action="">
            @csrf
            @method('PUT')
  
            <div class="form-group">
              <label for="editSliderTitle">Title</label>
              <div class="input-group input-group-outline my-3">
              <input type="text" class="form-control" id="editSliderTitle" name="title" required>
              </div>
            </div>
  
            <div class="form-group">
              <label for="editSliderLink">Link</label>
              <div class="input-group input-group-outline my-3">
              <input type="text" class="form-control" id="editSliderLink" name="link" required>
                </div>
            </div>
  
            <div class="form-group">
                <label for="editSliderLink">Subtitle1</label>
                <div class="input-group input-group-outline my-3">
                <input type="text" class="form-control" id="editSliderSubtitle1" name="subtitle1" required>
                </div>
              </div>
              <div class="form-group">
                <label for="editSliderLink">Subtitle 2</label>
                <div class="input-group input-group-outline my-3">
                <input type="text" class="form-control" id="editSliderSubtitle2" name="subtitle2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="editSliderImage">Current Image</label><br>
                <img id="currentSliderImage" src="" alt="Slider Image" width="150">
              </div>
    
              <div class="form-group">
                <label for="editSliderNewImage">New Image</label>
                <input type="file" class="form-control" id="editSliderNewImage" name="new_image">
                <small class="form-text text-muted">Upload a new image to update the slider image.</small>
              </div>
            <!-- Add more fields for other slider properties as needed -->
  
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  