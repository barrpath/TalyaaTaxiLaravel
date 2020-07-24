@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Taxy Information 
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('taxies.store') }}">
          <div class="form-group">
              @csrf
              <label for="plat_no">Plat No:</label>
              <input type="text" class="form-control" name="plat_no"/>
          </div>
          <div class="form-group">
              <label for="model">Model :</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="brand">Brand :</label>
              <input type="text" class="form-control" name="brand"/>
          </div>
          <div class="form-group">
              <label for="type">Type :</label>
              <input type="text" class="form-control" name="type"/>
          </div>
          <div class="form-group">
              <label for="area">Area :</label>
              <input type="text" class="form-control" name="area"/>
          </div>
          <div class="form-group">
              <label for="status">Status :</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Taxy info</button>
      </form>
  </div>
</div>
@endsection