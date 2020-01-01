@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
      <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>

      <hr>
      <div class="">
        <ol>
          <li>Id: {{ $category->id }}</li>
          <li>Category Name: {{ $category->name }}</li>
          <li>Slug Name: {{ $category->slug }}</li>
          <li>Create At: {{ $category->created_at }}</li>
        </ol>
      </div>

    </div>
  </div>
</div>
@endsection
