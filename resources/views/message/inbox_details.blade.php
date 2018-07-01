@extends('layouts.template')
@section('content')
<div class="row">
<div class="slidePanel slidePanel-right slidePanel-show" style="transform: translate3d(0%, 0px, 0px); top: 68px; bottom: 0;width: 79%;"><div class="slidePanel-scrollable scrollable is-enabled scrollable-vertical" style="position: relative;"><div class="scrollable-container"><div class="slidePanel-content scrollable-content">
<header class="slidePanel-header" style="padding:25px 30px">
  <div class="slidePanel-actions" style="min-height:0px;" aria-label="actions" role="group">
    <a href="{{URL::to('/message')}}"><button type="button" style="top:12px;" class="btn btn-icon btn-pure btn-inverse slidePanel-close actions-top icon wb-close" aria-hidden="true"></button></a>
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
	  <a class="avatar" href="javascript:void(0)"><img src="{{URL::to('/')}}/{{(!empty($view->receiveMessage->image)?'uploads' :'images')}}/{{(!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')}}" alt="..."></a>
	  <div>
	  <span class="name">{{$view->receiveMessage->first_name}} {{$view->receiveMessage->last_name}}</span></div>
	  <div><a href="javascript:void(0)" class="mailbox-panel-email">{{$view->receiveMessage->email}}</a>
	  to <a class="margin-right-10">me</a></div></div><div class="mail-header-right">
	  <span class="time">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans() }}</span>
	  <div class="btn-group actions" role="group">
	  <button type="button" class="btn btn-icon btn-pure btn-default"></button></div></div>
	  </div>
	  <div class="mail-content"><p>{{$view->description}}</p></div>
  </section>
  @endforeach
  @foreach($replaymessage as $view)
  <section class="slidePanel-inner-section">
  <div class="mail-header">
  <div class="mail-header-main">  
  <a class="avatar" href="javascript:void(0)"> <img src="{{URL::to('/')}}/{{(!empty($view->receiveMessage->image)?'uploads' :'images')}}/{{(!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')}}" alt="..."></a>
  
  <div><span class="name">{{$view->receiveMessage->first_name}} {{$view->receiveMessage->last_name}}</span></div>
  <div><a href="javascript:void(0)" class="mailbox-panel-email">{{$view->receiveMessage->email}}</a> to <a href="javascript:void(0)" class="margin-right-10"> {{((Auth::user()->id == $view->receiveMessage->id)?$messagedetails[0]->receiveMessage->first_name.' '.$messagedetails[0]->receiveMessage->last_name : 'me')}}</a>
  <!--<span class="identity"> <i class="wb-medium-point red-600" aria-hidden="true"></i>Work</span>-->
  </div></div><div class="mail-header-right"><span class="time">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans() }}</span>
  <div class="btn-group actions" role="group"><button type="button" class="btn btn-icon btn-pure btn-default">
  <!--<i class="icon wb-star" aria-hidden="true"></i></button><button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon wb-reply" aria-hidden="true"></i></button>-->
  </div></div></div><div class="mail-content">
  <p>{{$view->description}}</p></div>  
  </section>
@endforeach
  </div>
  <form class="form-horizontal" role="form" method="post" action="{{URL::to('/MessageController/save/')}}">	
		{{ csrf_field() }}	
  @foreach($messagedetails as $view)
  <div class="slidePanel-comment">
  <input type="hidden" name="messageid" value="{{$view->id }}"/>
  <input type="hidden" name="replay_id_condition" value="@if(!empty($view->replay_id)){{$view->replay_id}}@elseif(!empty($view->replay_ref_id)){{$view->replay_ref_id}}@else replaycondi @endif"/>
  <input type="hidden" name="replay_id" value="@if(!empty($view->replay_id))
  {{$view->replay_id}}
  @elseif($view->replay_ref_id)
  {{$view->replay_ref_id}}
  @else
  {{$view->id}}
@endif "/>
  <input type="hidden" name="receiver_id[]" value="{{$view->sender_id}}"/>
  <input type="hidden" name="sender_id" value="{{$view->receiver_id}}"/>
  <input type="hidden" name="subject" value=""/>  
    <textarea class="maxlength-textarea form-control mb-sm margin-bottom-20" name="description" rows="4" required></textarea>
    <button class="btn btn-primary loadingclick" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."  type="submit"> {{ trans('app.replay')}} </button>
  </div>
  @endforeach
</div>
</form>
</div>
</div>
<div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 77.989px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
<div class="slidePanel-handler"></div>
<div class="slidePanel-loading"><div class="loader loader-default"></div></div>
</div>
</div>
<br/>
<div style="clearboth;"></div>
@stop



