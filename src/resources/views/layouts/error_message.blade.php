@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

@if(isset($errors) AND count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    * {{ $error }} <br>
    @endforeach
</div>
@endif