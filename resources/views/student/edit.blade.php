@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{ Route('all.student') }}" class="btn btn-info">All Student</a>

      <br>
      <br>
      <h3>Student Update</h3>

      <form action="{{ url('update/student/'.$student->id)}}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Name</label>
            <input type="text" class="form-control" value="{{$student->name}}" name="name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Email</label>
            <input type="email" class="form-control" value="{{$student->email}}" name="email">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Phone</label>
            <input type="text" class="form-control" value="{{$student->phone}}" name="phone">
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection