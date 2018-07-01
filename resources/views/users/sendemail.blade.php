@extends('layouts.template')
@section('content')

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
	<h1 class="page-header">
	   Add email template
		<!--{{ Auth::user()->username }}-->
		<div class="pull-right">
			<span style="float:right;">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Home</a></li>
				<li class="active">Send email</li>
			</ol>
		   <!--<a href="{{URL::to('userlist')}}" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Users</a> -->   
		   </span>
		</div>
	</h1>
	<div style="clear:both;"></div>
	@if(session('msg'))
		<div class="alert alert-info fade in" style="margin-top:18px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong></strong>  {{session('msg')}}
		</div>
	 
	@endif
	@if(session('msgin'))
		<div class="alert alert-success fade in" style="margin-top:18px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong></strong>  {{session('msgin')}}
		</div>
	 
	@endif
	@if(session('msgdel'))
		<div class="alert alert-danger fade in" style="margin-top:18px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong></strong>  {{session('msgdel')}}
		</div>
	 
	@endif
	
	
	@if(Session::get('messagee'))
		<div class="alert alert-danger fade in" style="margin-top:18px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong></strong>  
			{{Session::get('messagee')}}
				{{Session::forget('messagee')}}
			
		</div>
	 
	@endif
	
	@if(Session::get('messageinsert'))
		<div class="alert alert-success fade in" style="margin-top:18px;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong></strong>  {{Session::get('messageinsert')}}
			{{Session::forget('messageinsert')}}
		</div>	 
	@endif	
</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
{{ Form::open(array('url' => 'user/sendemail')) }}
<div class="col-md-7">
<div class="input text">
<label for="SettingEmailSubject">Email subject</label>
<input name="subject" class="form-control"  type="text" value="Subject" id="SettingEmailSubject">
</div><br/>
<textarea name="description">
	Dear all user,
	I've new link please click the link below.	
	hello world how goes
</textarea>
<div style="clear:both;"></div><br/>

<div class="bs-example" data-example-id="single-button-dropdown">
	<div class="btn-group">
	<a href="{{URL::to('user')}}" class="btn btn-info btn-group"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back</a>   
	</div>
	<div class="btn-group">
	  <div class="submit"><input type="submit" class="btn btn-success btn-group" value="Submit"></div>   
	</div><!-- /btn-group -->  
</div>	
</div>
{{ Form::close() }}
<div style="clear:both;"></div>

<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste "
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter      alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
@stop



