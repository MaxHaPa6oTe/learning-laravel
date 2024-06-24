<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach($posts as $post) 
        <div>{{$post->title}}</div>
        <div>{{$post->post_content}}</div>
        <div>{{$post->images}}</div>
        @endforeach
    </div>
</body>
</html> -->
@extends('layouts.main')
@section('content')
<div>
<a class="btn btn-info mb-3" href="/posts/create">create</a>
    @foreach($posts as $post)
    <div>
        <a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a>
        <p>{{$post->content}}
    </div>
    @endforeach
</div>
@endsection