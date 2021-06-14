<div class="section-body">
  <div class="card">
    <div class="card-header">
      <h4>Generate From Schema</h4>
    </div>
    <div class="card-body">
      <form role="form" action="{{ route('cruder.generate_from_schema') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Schema Json File <span class="required">*</span></label>
              <div class="custom-file">
                <input name="schema" type="file" class="custom-file-input" id="schema">
                <label class="custom-file-label" for="schema">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-end mt-4">
          <div class="btn-group">
            <button type="submit" class="btn btn-block btn-primary">Generate</button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer bg-whitesmoke">

    </div>
  </div>
</div>