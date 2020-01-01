@extends('welcome')
@section('content')
<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($post as $row)
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            <small>Title:</small> {{ $row->title}}
          </h2>
          <img src="{{ URL::to($row->image) }}" style="height: 350px;" alt="">
        </a>
        <p class="post-meta pt-2">Category: <a href="#">{{$row->name}}</a> <small>Slug {{ $row->slug}}</small>
          <strong>{{$row->created_at}}</strong> </p>
          <p class="lead text-justify">{{$row->details}}</p>
      </div>
      @endforeach
      <hr>
      <!-- Pager -->
      <div class="clearfix float-right">
          {{$post->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
