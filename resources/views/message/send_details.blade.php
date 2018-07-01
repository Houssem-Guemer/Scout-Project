@extends('layouts.template')
@section('content')
<div class="row">
<div class="slidePanel slidePanel-right slidePanel-show" style="transform: translate3d(0%, 0px, 0px); top: 68px; bottom: 0;width: 79%;"><div class="slidePanel-scrollable scrollable is-enabled scrollable-vertical" style="position: relative;"><div class="scrollable-container"><div class="slidePanel-content scrollable-content"><header class="slidePanel-header" style="padding:25px 30px">
  <div class="slidePanel-actions" style="min-height:0px;" aria-label="actions" role="group">
    <a href="{{URL::to('/SendMessage')}}"><button type="button" style="top:12px;" class="btn btn-icon btn-pure btn-inverse slidePanel-close actions-top icon wb-close" aria-hidden="true"></button></a>
  </div>
  @foreach($messagedetails as $view)
  <h1 class="mailbox-panel-title">{{(!empty($view->subject)?$view->subject : trans('app.replay_message'))}}</h1>
	 @endforeach
  </header>
<div class="slidePanel-inner">
<div class="slidePanel-main"></div>
<div class="slidePanel-messages">

@foreach($messagedetails as $view)
<section class="slidePanel-inner-section">
  <div class="mail-header"><div class="mail-header-main">
  <a class="avatar" href="javascript:void(0)"><img src="{{URL::to('/')}}/{{(!empty($view->sendMessage->image)?'uploads' :'images')}}/{{(!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')}}" alt="..."></a>
  <div>
  <span class="name">{{$view->sendMessage->first_name}} {{$view->sendMessage->last_name}}</span></div>
  <div><a href="javascript:void(0)" class="mailbox-panel-email">{{$view->sendMessage->email}}</a>
 </div></div><div class="mail-header-right">
  <span class="time">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans() }}</span>
  <div class="btn-group actions" role="group">
  <button type="button" class="btn btn-icon btn-pure btn-default"></button></div></div>
  </div>
  <div class="mail-content"><p>{{$view->description}}</p></div>
</section>
@endforeach  
</div>  
</div></div></div><div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 77.989px; transform: translate3d(0px, 0px, 0px);"></div></div></div><div class="slidePanel-handler"></div>
<div class="slidePanel-loading"><div class="loader loader-default"></div></div></div>
</div>
<br/>
<div style="clearboth;"></div>
@stop



