@extends('layouts.main')
@section('content')
<div class='container'>
<form action="{{route('post.store')}}" method='post'>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name='content' class="form-control" id="content" placeholder="Content"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input name='image' type="text" class="form-control" placeholder='Image' id="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection