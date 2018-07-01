@extends('layouts.template')
@section('content')
 <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/animsition/animsition.css">
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/bootstrap-sweetalert/sweet-alert.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/toastr/toastr.css">
 <div class="page-header">
  <h1 class="page-title font_kufi">Bootbox &amp; Sweetalert </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Bootbox &amp; Sweetalert</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel Bootbox -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Bootbox
            <small><a class="example-plugin-link" href="https://github.com/makeusabrew/bootbox"
              target="_blank">official website</a></small>
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <p class="margin-bottom-30">Bootbox.js is a small javaScript library which allows you to create programmatic
            dialog boxes using Bootstrap modals, without having to worry about
            creating, managing or removing any of the required DOM elements or
            JS event handlers.</p>
          <div class="row row-lg">
            <div class="col-md-5">
              <!-- Example Examples -->
              <div class="example-wrap margin-md-0">
                <h4 class="example-title">Examples</h4>
                <div class="example example-buttons">
                  <button class="btn btn-outline btn-default" data-type="alert" data-message="Hello world!"
                  data-plugin="bootbox" data-callback="exampleBootboxAlertCallback"
                  type="button">Alert</button>
                  <button class="btn btn-outline btn-default" data-type="confirm" data-message="Are you sure?"
                  data-plugin="bootbox" data-callback="exampleBootboxConfirmCallback"
                  type="button">Confirm</button>
                  <button class="btn btn-outline btn-default" data-type="prompt" data-title="What is your name?"
                  data-plugin="bootbox" data-callback="exampleBootboxPromptCallback"
                  type="button">Prompt</button>
                  <button class="btn btn-outline btn-default" id="exampleBootboxPromptDefaultValue"
                  type="button">Prompt with default value</button>
                  <button class="btn btn-outline btn-default" id="exampleBootboxCustomDialog" type="button">Custom Dialog</button>
                  <button class="btn btn-outline btn-default" id="exampleBootboxCustomHtmlContents"
                  type="button">Custom HTML Contents</button>
                  <button class="btn btn-outline btn-default" id="exampleBootboxCustomHtmlForms"
                  type="button">Custom HTML Forms</button>
                </div>
              </div>
              <!-- End Example Examples -->
            </div>
            <div class="col-md-7">
              <!-- Example Nifty Effects -->
              <div class="example-wrap">
                <h4 class="example-title">Work With Nifty Effects</h4>
                <div class="example example-buttons">
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-fade-in-scale-up"
                  type="button">Fade in &amp; Scale</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-slide-in-right"
                  type="button">Slide in from right</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-slide-from-bottom"
                  type="button">Slide in from bottom</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-newspaper"
                  type="button">Newspaper</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-fall"
                  type="button">Fall</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-side-fall"
                  type="button">Side Fall</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-3d-flip-horizontal"
                  type="button">3D Flip horizontal</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-3d-flip-vertical"
                  type="button">3D Flip vertical</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-3d-sign"
                  type="button">3D Sign</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-super-scaled"
                  type="button">Super Scaled</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-just-me"
                  type="button">Just Me</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-3d-slit"
                  type="button">3D Slit</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-rotate-from-bottom"
                  type="button">3D Rotate Bottom</button>
                  <button class="btn btn-outline btn-default" data-plugin="bootbox" data-title="Triggered by Bootbox"
                  data-message="I am a custom dialog with effects" data-classname="modal-rotate-from-left"
                  type="button">3D Rotate In Left</button>
                </div>
              </div>
              <!-- End Example Nifty Effects -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Bootbox -->
      <!-- Panel Sweet Alert -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Sweet Alert
            <small><a class="example-plugin-link" href="https://select2.github.iohttp://lipis.github.io/bootstrap-sweetalert/"
              target="_blank">official website</a></small>
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-lg-6 col-md-12">
              <div class="example example-well height-350">
                <img class="center" src="{{URL::to('/')}}/assets/examples/images/modal/sweet-alert.png" alt="...">
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <!-- Example Styles -->
              <div class="example-wrap">
                <h4 class="example-title">Sweet Alert Styles</h4>
                <p>Here�s a comparison of a standard error message. The first one
                  uses the built-in alert-function, while the second is using sweetAlert.
                  SweetAlert automatically centers itself on the page and looks
                  great no matter if you're using a desktop computer, mobile or
                  tablet. It's even highly customizeable, as you can see below!</p>
                <div class="example example-buttons">
                  <button type="button" class="btn btn-outline btn-default" id="exampleBasic" data-plugin="sweetalert"
                  data-title="Here's a message!">Basic</button>
                  <button type="button" class="btn btn-outline btn-default" id="exampleCloseTimer"
                  data-plugin="sweetalert" data-title="Auto close alert!" data-text="I will close in 2 seconds."
                  data-timer="2000">Close timer</button>
                  <button type="button" class="btn btn-outline btn-default" id="exampleTitleText"
                  data-plugin="sweetalert" data-title="Here's a message!" data-text="It's pretty, isn't it?">Title text</button>
                  <button type="button" class="btn btn-outline btn-default" id="exampleSuccessMessage"
                  data-plugin="sweetalert" data-title="Good job!" data-text="You clicked the button!"
                  data-type="success">Success message</button>
                  <button type="button" class="btn btn-outline btn-default" id="exampleCustomIcon"
                  data-plugin="sweetalert" data-title="Sweet!" data-text="Here's a custom image."
                  data-image-url="http://i.imgur.com/4NZ6uLY.jpg">Custom icon</button>
                </div>
                <p>With a function attached to the "Confirm" button :</p>
                <div class="example">
                  <button type="button" class="btn btn-outline btn-default" id="exampleWarningConfirm">Warning Confirm</button>
                </div>
                <p>And by passing a parameter, you can execute something else for
                  "Cancel".
                </p>
                <div class="example">
                  <button type="button" class="btn btn-outline btn-default" id="exampleWarningCancel">Warning Cancel</button>
                </div>
              </div>
              <!-- End Example Styles -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Sweet Alert -->
    </div>
<br/>

@stop
 <script src="{{URL::to('/')}}/global/vendor/bootstrap-sweetalert/sweet-alert.js"></script>
  