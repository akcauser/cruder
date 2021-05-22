<div class="section-body">
  <div class="card">
    <div class="card-header">
      <h4>Generate CRUD From Schema</h4>
    </div>
    <div class="card-body">
      <form role="form" id="schemaForm">
        @method('post')
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Model name <span class="required">*</span></label>
              <input type="text" class="form-control" id="SmModelNameInput" placeholder="Enter name" required>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="schemaFile">
              <label class="custom-file-label" for="schemaFile">Choose file</label>
            </div>

          </div>
        </div>
        <div class="row justify-content-end mt-4">
          <div class="btn-group">
            <button type="submit" class="btn btn-block btn-primary" id="btnSmGenerate">Generate</button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer bg-whitesmoke">

    </div>
  </div>
</div>