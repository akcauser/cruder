<div class="section-body">
  <div class="card">
    <div class="card-header">
      <h4>Rollback</h4>
    </div>
    <div class="card-body">
      <form role="form" id="rollbackForm">
        @method('post')
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Model name <span class="required">*</span></label>
              <input type="text" class="form-control" id="RBModelNameInput" placeholder="Enter name" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="RBPrefixInput">Prefix</label>
              <input type="text" class="form-control" id="RBPrefixInput" placeholder="Enter prefix">
            </div>
          </div>
        </div>
        <div class="row justify-content-end mt-4">
          <div class="btn-group">
            <button type="submit" class="btn btn-block btn-primary" id="btnRollback">Rollback</button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer bg-whitesmoke">

    </div>
  </div>
</div>