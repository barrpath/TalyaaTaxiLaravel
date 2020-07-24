@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
      <tr>
          
      </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="{{ route('taxies.create')}}" class="btn btn-primary">Add New</a></td>
        </tr>
        
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Plat No</td>
          <td>Model</td>
          <td>Brand</td>
          <td>Type</td>
          <td>Area</td>
          <td>Status</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($taxilist as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->plat_no}}</td>
            <td>{{$case->model}}</td>
            <td>{{$case->brand}}</td>
            <td>{{$case->type}}</td>
            <td>{{$case->area}}</td>
            <td>{{$case->status}}</td>
            <td><a href="{{ route('taxies.edit', $case->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('taxies.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection