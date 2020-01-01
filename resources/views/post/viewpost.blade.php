@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="">
        <h3>{{ $viewpost->title }}</h3>
        <img src="{{ URL::to($viewpost->image)}}" height="340px" alt="">
        <p class="text-muted "> <small>Category Name: {{ $viewpost->name }}</small> </p>
        <p class="lead text-justify">{{ $viewpost->details }}</p>
      </div>

    </div>
  </div>
</div>
@endsection
