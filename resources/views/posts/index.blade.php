@extends('layouts.app')


@section('content')
<h1>Posts</h1>
@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{url()->current()}}/{{$post->post_id}}" >{{$post->title}}</a></div>
                    <div class="card-body">
                        <p>{{$post->text}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
    {{$posts->links()}}
    <div class="row">
        <a href="{{url()->current()}}/create" class="btn btn-primary ml-5">تحرير منشور جديد</a>
    </div>
@else
    <h3>No Posts found!</h3>
@endif
@endsection