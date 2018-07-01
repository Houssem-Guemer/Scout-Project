@extends('layouts.template')
@section('content')
 <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/pages/gallery.css">
  <div class="page-header">
  <h1 class="page-title font_kufi">Gallery </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Gallery</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <ul class="blocks blocks-100 blocks-xlg-4 blocks-md-3 blocks-sm-2" id="exampleList"
      data-filterable="true">
        <li data-type="animal">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Animal Horse</h4>
          </div>
        </li>
        <li data-type="object">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Object Coffee</h4>
          </div>
        </li>
        <li data-type="object">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Object Cup</h4>
          </div>
        </li>
        <li data-type="city">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">City Nature</h4>
          </div>
        </li>
        <li data-type="scenery">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">City Station</h4>
          </div>
        </li>
        <li data-type="city">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">City Leaf</h4>
          </div>
        </li>
        <li data-type="animal">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Animal Bird</h4>
          </div>
        </li>
        <li data-type="city">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">City Street</h4>
          </div>
        </li>
        <li data-type="animal">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Animal Nature</h4>
          </div>
        </li>
        <li data-type="city">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">City Night</h4>
          </div>
        </li>
        <li data-type="object">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Object Book</h4>
          </div>
        </li>
        <li data-type="object">
          <div class="widget widget-shadow">
            <figure class="widget-header overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="{{URL::to('/')}}/global/photos/placeholder.png"
              alt="...">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="{{URL::to('/')}}/global/photos/placeholder.png"></a>
              </figcaption>
            </figure>
            <h4 class="widget-title">Object Grape</h4>
          </div>
        </li>
      </ul>
    </div>
<br/>
@stop

 
