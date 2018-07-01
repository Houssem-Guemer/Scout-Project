@extends('layouts.template')


@section('content')
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="well">
            <h3><a href="/viewPost/{{$post->id}}">{{$post->title}}</a></h3>
        </div>
    @endforeach
    {{$posts->links()}}
@else
    no posts
@endif

@endsection