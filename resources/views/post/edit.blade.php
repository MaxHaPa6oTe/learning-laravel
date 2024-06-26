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
  <label for="exampleDataList" class="form-label">Datalist example</label>
<select name="category_id" class='form-control' id="category">
    @foreach($categories as $category)
<option 
{{ $category->id === $post->category_id ? ' selected' : ''  }}
value="{{$category->id}}">{{$category->title}}</option>
    @endforeach
</select>
<label for='tags'>Tags</label>
<select multiple name='tags[]' class="form-control" id="tags">
  @foreach($tags as $tag)
  
  <option
  @foreach($post->tags as $postTag)
  {{ $tag->id === $postTag->id ? ' selected' : ''  }}

  @endforeach
 value="{{$tag->id}}">{{$tag->title}}</option>
  @endforeach
</select>
  <button type="submit" class="mt-3 btn btn-primary">Update</button>
</form>
</div>
@endsection