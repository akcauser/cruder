@extends('cruder::builder')

@section('content')
<div class="section-body">

  @include('cruder::layouts.error_message')

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
                <input name="schema" type="file" class="custom-file-input" id="schema" required>
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
<script>
    let schema = document.getElementById("schema");
    schema.addEventListener('change',function(){
        //get the file name
        let fileName = $(this).val();
        let fileNameArr = fileName.split("\\")
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileNameArr[fileNameArr.length-1]);
    })
</script>

@endsection