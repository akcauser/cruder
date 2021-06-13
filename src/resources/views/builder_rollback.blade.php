<div class="section-body">
  <div class="card">
    <div class="card-header">
      <h4>Rollback</h4>
    </div>
    <div class="card-body">
      <form role="form" action="{{ route('cruder.rollback') }}" method="post" id="rollbackForm">
        @method('post')
        @csrf

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Model name <span class="required">*</span></label>
              <select class="form-control" name="modelName" required>
                <option value="">Select a Model</option>
                @foreach($models as $key => $value)
                  <option value="{{ $value->modelName }}">{{ $value->modelName }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row justify-content-end mt-4">
          <div class="btn-group">
            <button class="btn btn-block btn-primary" id="btnRollback">Rollback</button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer bg-whitesmoke">

    </div>
  </div>
</div>

<script>
  let btnRollback = document.getElementById("btnRollback");
  btnRollback.addEventListener("click", function(e) {
    e.preventDefault();
    if (confirm("Are you sure? This action can not be undone!")) {
      document.getElementById("rollbackForm").submit();
    } 
  });
</script>