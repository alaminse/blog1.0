@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{route('all.student')}}" class="btn btn-info">All Student</a>
      <br><br>
      <h3>New Student Information</h3>
      <form action="{{route('store.student')}}" method="post">
        <!-- validation in laravel -->
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
            <input type="text" class="form-control" placeholder="Student Name" name="name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Student Email</label>
            <input type="text" class="form-control" placeholder="Student Email" name="email">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Student Phone</label>
            <input type="text" class="form-control" placeholder="Student Phone" name="phone">
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
