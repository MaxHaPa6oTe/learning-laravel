@extends('layouts.main')
@section('content')
<div>
    <div><a href="{{route('post.edit',$post->id)}}">Редактировать</a></div>

    <div>
        <form action="{{route('post.delete',$post->id)}}" method="post">
        @csrf
        @method('delete')
        <p>{{$post->id}}. {{$post->title}}</p>
        <p>{{$post->content}}</p>
        <input  class='btn btn-danger' type='submit' value='delete'/>
        </form>
        </div>

    <div>
        <a class="btn btn-info" href="{{route('post.index')}}">back</a>
</div>

</div>
@endsection