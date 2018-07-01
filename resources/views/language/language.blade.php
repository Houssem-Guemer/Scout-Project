@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/filament-tablesaw/tablesaw.css">
<style>
p.redcolor{color:red; font-size:16px;}
</style>
<div class="page-header">
  <h1 class="page-title font_kufi">{{ trans('app.create_language')}} </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li><a href="{{URL::to('userlist')}}">{{ trans('app.users')}}</a></li>
		<li class="active">{{ trans('app.language')}}</li>
	</ol>
  </div>
</div> 
<div class="page-content" ng-app="">	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message ---------------->
<div class="row">
@if(session('msg_success'))
	<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_success')}}
	</div>
@endif
@if(session('msg_update'))
	<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_update')}}
	</div>
@endif
@if(session('msg_delete'))
	<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_delete')}}
	</div>
@endif
</div>

<div class="col-md-12 row">
<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
	<li class="active" role="presentation"><a data-toggle="tab" href="#adddata" aria-controls="activities" role="tab" aria-expanded="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{ trans('app.language_list')}}</a></li>
	<li role="presentation" class=""><a data-toggle="tab" href="#viewdata" aria-controls="profile" role="tab" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> {{ trans('app.add_language')}}</a></li>
</ul>	
</div>
<div style="clear:both;"></div><br>
<div class="tab-content">
<div id="viewdata" class="tab-pane fade">
<form  name="userForm" action="{{URL::to('/LanguageController/store')}}" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate="novalidate">
	{{ csrf_field() }}			
<div class="col-md-6">
   <div class="form-group">
		<label class="control-label">{{ trans('app.folder_name')}}</label>
		<input type="text" ng-minlength="2" ng-maxlength="2"  ng-model="foldername" name="foldername" class="form-control" placeholder="Folder name only 2 Carecter." required>
		 <!-- show an error if username is too short -->
		<p class="redcolor" ng-show="userForm.foldername.$error.minlength">Folder name min 2 carecter.</p>

		<!-- show an error if username is too long -->
		<p class="redcolor" ng-show="userForm.foldername.$error.maxlength">Folder name max 2 carecter.</p>

		<!-- show an error if this isn't filled in -->
		<p class="redcolor" ng-show="userForm.foldername.$invalid.required">Folder name is required.</p>
	</div>
	<div class="form-group">
		<label class="control-label">{{ trans('app.language_name')}} </label>
		<input type="text" placeholder="Language name"   ng-model="languagename" name="languagename" class="form-control" required>
	</div>	
	
<div class="form-group">
	<label class="control-label">{{ trans('app.choose_flag')}}</label>		
		<div class="input-group input-group-file">
		<input type="text"  class="form-control" readonly="">
		<span class="input-group-btn">
		  <span class="btn btn-outline btn-file">
			<i class="icon wb-upload" aria-hidden="true"></i>
			<input type="file" ng-model="flag_image" name="flag_image" multiple="">
		  </span>
		</span>
	  </div>		
	</div>

<div class="form-group">	
<div class="bs-example" data-example-id="single-button-dropdown">
<!--<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary loadingclick" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."> <i class="fa fa-save"></i> {{ trans('app.add_language')}}</button>  -->
<div style="clear:both"></div>
<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
	<i class="fa fa-save"></i> {{ trans('app.add_language')}}
	<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
</button>
</div>
</div>

</div>
</form>
</div>
<!----------------------start image tab--------------------------->
<div id="adddata" class="tab-pane fade  in active">
<div style="clear:both;"></div><br/>
<table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
	<thead>
		<tr> 
			<th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">{{ trans('app.folder_name')}}</th>
			<th data-tablesaw-priority="4">{{ trans('app.language_name')}}</th>
			<th data-tablesaw-priority="3">{{ trans('app.flag')}}</th>
			<th data-tablesaw-priority="1">{{ trans('app.action')}}</th> 
		</tr> 
	</thead>
	<tbody>
		@foreach($language as $value)
		<tr> 
			<td class="tablesaw-priority-5 tablesaw-cell-visible">{{$value->foldername}}</td> 
			<td class="tablesaw-priority-4">{{$value->languagename}}</td> 
			<td class="tablesaw-priority-3">
			@if(!empty($value->flag_image))
			<img width="40" src="{{URL::to('/assets/flags/')}}/{{$value->flag_image}}"/>
			@endif
			</td> 
			 
			<td class="tablesaw-priority-1">
				<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('/LanguageController/edit/')}}/{{$value->foldername}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>
			   @if($value->foldername != 'en')
				<button data-placement="top" data-original-title="{{ trans('app.delete')}}" rel="tooltip" title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical" data-toggle="modal" type="button" data-href="{{URL::to('/LanguageController/destroy/')}}/{{$value->id}}/{{$value->foldername}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
				
				@endif
			</td>
		</tr>
		@endforeach
		
	</tbody>		
</table>
<div style="clear:both;"></div><br/>
<!--</div>-->
</div>
<!----------------------end image tab--------------------------->  
</div>
	<!-- /.col-lg-12 -->
<div style="clear:both"></div>
</div>
<!-- /.row -->
</div>
</div><br/>

@stop
