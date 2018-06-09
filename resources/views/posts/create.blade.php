@extends('layouts.app')
@section('content')
    <h1 class="text-center">Create Post</h1>
    <form method="POST" action="{{action('PostsController@store')}}">
        @csrf
        <div class="form-group col-md-10">
            <label for="title" class="col-form-label">{{__('العنوان')}}</label>
            <input id="title" class="form-control" name="title" />
        </div>
        
        <div class="form-group col-md-10">
            <label for="text" class="col-form-label">{{__('النص')}}</label>
            <input id="text" class="form-control" name="text" type="text" />
        </div>
        <div class="form-group row ml-5"> 
            <button type='submit' class="btn btn-primary">تحرير</button>
        </div>
    </form> 
@endsection