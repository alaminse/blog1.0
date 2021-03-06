@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
      <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>

      <form action="{{route('store.category')}}" method="post">
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
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Category Name" name="name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Slug Name</label>
            <input type="text" class="form-control" placeholder="Slug Name" name="slug">
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
