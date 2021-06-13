<div class="section-body">
  <div class="card">
    <div class="card-header">
      <h4>Generate From Schema</h4>
    </div>
    <div class="card-body">
      <form role="form" id="schemaForm">
        @method('post')
        @csrf

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Schema Json File <span class="required">*</span></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="schemaFile">
                <label class="custom-file-label" for="schemaFile">Choose file</label>
              </div>
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