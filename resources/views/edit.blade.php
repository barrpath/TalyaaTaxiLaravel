@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Corona Virus Data
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
      <form method="post" action="{{ route('taxies.update', $taxilist->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="plat_no">Plat No:</label>
              <input type="text" class="form-control" name="plat_no" value="{{ $taxilist->plat_no }}"/>
          </div>
          <div class="form-group">
              <label for="model">Model :</label>
              <input type="text" class="form-control" name="model" value="{{ $taxilist->model }}"/>
          </div>
          <div class="form-group">
              <label for="brand">Brand :</label>
              <input type="text" class="form-control" name="brand" value="{{ $taxilist->brand }}"/>
          </div>
          <div class="form-group">
              <label for="type">Type :</label>
              <input type="text" class="form-control" name="type" value="{{ $taxilist->type }}"/>
          </div>
          <div class="form-group">
              <label for="area">Area :</label>
              <input type="text" class="form-control" name="area" value="{{ $taxilist->area }}"/>
          </div>
          <div class="form-group">
              <label for="status">Status :</label>
              <input type="text" class="form-control" name="status" value="{{ $taxilist->status }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Information</button>
      </form>
  </div>
</div>
@endsection