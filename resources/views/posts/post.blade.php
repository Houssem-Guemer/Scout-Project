@extends('layouts.app')


@section('content')
<h1 class="text-center">Post Number {{$post->post_id}}</h1>
        <div class="justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right">{{$post->title}}</div>
                    <div class="card-body text-right">
                        <p>{{$post->text}}</p>
                        <small>كتب في {{$post->created_at}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{url()->current()}}/edit" class="btn btn-primary ml-5"> تعديل المنشور </a>
            <form method="POST" action="{{action('PostsController@destroy', $post->post_id)}}">
                <input type="hidden" name="_method" value="DELETE"/>
                <button type="submit" class="btn btn-danger pull-right">حذف المنشور</button>
            </form>
        </div>
@endsection