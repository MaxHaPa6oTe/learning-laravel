@extends('layouts.main')
@section('content')
<div class='container'>
<form action="{{route('post.store')}}" method='post'>
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input value="{{old('title')}}"  name="title" type="text" class="form-control" id="title" placeholder="Title">
    @error('title')
    <p class='text-danger'>{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name='content' class="form-control" id="content" placeholder="Content">{{old('content')}}</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input value="{{old('image')}}" name='image' type="text" class="form-control" placeholder='Image' id="image">
    @error('image')
    <p class='text-danger'>{{$message}}</p>
    @enderror
  </div>
  <label for="exampleDataList" class="form-label">Categories</label>
<select name="category_id" class='form-control' id="category">
    @foreach($categories as $category)
<option 
{{old('category_id') == $category->id ? 'selected':''}}
value="{{$category->id}}">{{$category->title}}</option>
    @endforeach
</select>
<label for='tags'>Tags</label>
<select multiple name='tags[]' class="form-control" id="tags">
  @foreach($tags as $tag)
  <option value="{{$tag->id}}">{{$tag->title}}</option>
  @endforeach
</select>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>
@endsection