@extends('layouts.main')
@section('content')
<div class='container'>
<form method="post" action="{{route('post.updatee',$post->id)}}" method='post'>
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input value="{{$post->title}}" name="title" type="text" class="form-control" id="title" placeholder="Title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name='content' class="form-control" id="content" placeholder="Content">{{$post->content}}</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input value="{{$post->image}}" name='image' type="text" class="form-control" placeholder='Image' id="image">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection