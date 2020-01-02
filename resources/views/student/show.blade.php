@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{URL::to('student/create')}}" class="btn btn-danger">Add Student</a>
      <a href="{{URL::to('student')}}" class="btn btn-info">All Student</a>

      <hr>
      <div class="col-8 col-sm-6">
        <ol>
          <li>Id: {{ $student->id }}</li>
          <li>Student Name: {{ $student->name }}</li>
          <li>Student Email: {{ $student->email }}</li>
          <li>Student Phone: {{ $student->phone }}</li>
        </ol>
      </div>

    </div>
  </div>
</div>
@endsection
