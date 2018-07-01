@extends('layouts.template')
@section('content')
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/structure/chat.css">  
<div class="page-header">
  <h1 class="page-title font_kufi">Chat </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Chat</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel Title -->
      <div class="panel">
        <div class="panel-body">
          <div class="chat-box">
            <div class="chats">
              <div class="chat">
                <div class="chat-avatar">
                  <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="June Lane">
                    <img src="{{URL::to('/')}}/global/portraits/4.jpg" alt="June Lane">
                  </a>
                </div>
                <div class="chat-body">
                  <div class="chat-content">
                    <p>
                      Hello. What can I do for you?
                    </p>
                    <time class="chat-time" datetime="2016-06-01T08:30">8:30 am</time>
                  </div>
                </div>
              </div>
              <div class="chat chat-left">
                <div class="chat-avatar">
                  <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="Edward Fletcher">
                    <img src="{{URL::to('/')}}/global/portraits/5.jpg" alt="Edward Fletcher">
                  </a>
                </div>
                <div class="chat-body">
                  <div class="chat-content">
                    <p>
                      I'm just looking around.
                    </p>
                    <p>Will you tell me something about yourself? </p>
                    <time class="chat-time" datetime="2016-06-01T08:35">8:35 am</time>
                  </div>
                  <div class="chat-content">
                    <p>
                      Are you there? That time!
                    </p>
                    <time class="chat-time" datetime="2016-06-01T08:40">8:40 am</time>
                  </div>
                </div>
              </div>
              <div class="chat">
                <div class="chat-avatar">
                  <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="June Lane">
                    <img src="{{URL::to('/')}}/global/portraits/4.jpg" alt="June Lane">
                  </a>
                </div>
                <div class="chat-body">
                  <div class="chat-content">
                    <p>
                      Where?
                    </p>
                    <time class="chat-time" datetime="2016-06-01T08:35">8:35 am</time>
                  </div>
                  <div class="chat-content">
                    <p>
                      OK, my name is Limingqiang. I like singing, playing basketballand so on.
                    </p>
                    <time class="chat-time" datetime="2016-06-01T08:42">8:42 am</time>
                  </div>
                </div>
              </div>
              <div class="chat chat-left">
                <div class="chat-avatar">
                  <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="Edward Fletcher">
                    <img src="{{URL::to('/')}}/global/portraits/5.jpg" alt="Edward Fletcher">
                  </a>
                </div>
                <div class="chat-body">
                  <div class="chat-content">
                    <p>You wait for notice.</p>
                  </div>
                  <div class="chat-content">
                    <p>Consectetuorem ipsum dolor sit?</p>
                    <time class="chat-time" datetime="2016-06-01T08:50">8:50 am</time>
                  </div>
                  <div class="chat-content">
                    <p>OK?</p>
                    <time class="chat-time" datetime="2016-06-01T08:55">8:55 am</time>
                  </div>
                </div>
              </div>
              <div class="chat">
                <div class="chat-avatar">
                  <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="June Lane">
                    <img src="{{URL::to('/')}}/global/portraits/4.jpg" alt="June Lane">
                  </a>
                </div>
                <div class="chat-body">
                  <div class="chat-content">
                    <p>OK!</p>
                    <time class="chat-time" datetime="2016-06-01T09:00">9:00 am</time>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Say something">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Send</button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <!-- End Panel Title -->
    </div>
<br/>

@stop
