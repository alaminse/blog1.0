@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{ Route('add.category') }}" class="btn btn-danger">Add Category</a>
      <a href="{{ Route('all.category') }}" class="btn btn-info">All Category</a>
      <a href="{{ Route('all.post') }}" class="btn btn-info">All Post</a>

      <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
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
            <label>Post Title</label>
            <input type="text" class="form-control" placeholder="Post Title" name="title" require>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Catagory</label>
            <select class="form-control" name="categoryid">
              <option> -- Choose -- </option>
              @foreach($all_cat as $row)
              <option value="{{ $row->id }}"> {{ $row->name }} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Post Image</label>
            <input type="file" class="form-control"  name="image">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Post Details</label>
            <textarea name="details" rows="5" class="form-control" placeholder="Post Details" required></textarea>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
