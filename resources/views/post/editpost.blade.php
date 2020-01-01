@extends('welcome')
@section('writpost')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <a href="{{ Route('all.post') }}" class="btn btn-info">All Post</a>

      <form action="{{url('update/post/'.$editpost->id)}}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" value="{{$editpost->title}}" name="title" require>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Catagory</label>
            <select class="form-control" name="categoryid">
              <option> -- Choose -- </option>
              @foreach($editcat as $row)
              <option value="{{ $row->id }}" <?php if ($row->id == $editpost->categoryid) {echo "selected";} ?>> {{ $row->name }} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            Old Image:
            <img src="{{URL::to($editpost->image)}}" style="hight: 40px; width: 80px;" alt="">
            <br>
            <label>New Image</label>
            <input type="file" class="form-control"  name="image">
            <input type="hidden" name="old_photo" value="{{$editpost->image}}">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Post Details</label>
            <textarea name="details" rows="5" class="form-control" >{{$editpost->details}}</textarea>
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
