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
    @foreach($posts as $post)
    <div>{{$post->id}}. {{$post->title}}</div>
    @endforeach
</div>
@endsection