@extends('layouts.template')


@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->data}}</p>

@endsection