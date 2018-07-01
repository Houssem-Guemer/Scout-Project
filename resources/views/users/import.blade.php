@extends('layouts.template')
@section('content')
<div class="page-header">
  <h1 class="page-title font_kufi">{{ trans('app.users_import_fields_specified')}}</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li><a href="{{URL::to('userlist')}}">{{ trans('app.users')}}</a></li>
		<li class="active">{{ trans('app.import')}}</li>
	</ol>
  </div>
</div>
<!------------------------start insert, update, delete message ---------------->
<div class="page-content" ng-app="">	
<div class="panel">
<div class="panel-body container-fluid">
<div class="col-lg-12">
@if(session('msg_success'))
	<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_success')}}
	</div>
@endif
@if(session('msg_update'))
	<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_update')}}
	</div>
@endif
@if(session('msg_delete'))
	<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  {{session('msg_delete')}}
	</div>
@endif
</div>
<table class="table">
<thead>
<tr>
	<td>{{ trans('app.first_name')}}:</td>
	<td>{{ trans('app.import_first_name_specified')}}</td>
</tr>
<tr>
	<td>{{ trans('app.last_name')}}:</td>
	<td>{{ trans('app.import_last_name_specified')}}</td>
</tr>
</thead>
<tbody>
	<tr>
		<th>{{ trans('app.username')}}:</th>
		<td>{{ trans('app.import_username_specified')}}</td>
	</tr>
	<tr>
		<th>{{ trans('app.email')}}:</th>
		<td>{{ trans('app.import_email_specified')}}</td>
	</tr>
	<tr>
		<th>{{ trans('app.password')}}:</th>
		<td>{{ trans('app.import_password_specified')}}</td>
	</tr>			
	<tr>
		<th>{{ trans('app.phone')}}:</th>
		<td>{{ trans('app.import_phone_specified')}}</td>
	</tr>
	<tr>
		<th>{{ trans('app.gender')}}:</th>
		<td>{{ trans('app.import_gender_specified')}}</td>
	</tr>
	<tr>
		<th>{{ trans('app.address')}}:</th>
		<td>{{ trans('app.import_address_specified')}}</td>
	</tr>			
	<tr>
		<th>{{ trans('app.status')}}:</th>
		<td>{{ trans('app.import_status_specified')}}</td>
	</tr>		
									
</tbody>
</table>

<form name="userForm" action="{{URL::to('importcsv')}}" ng-submit="submitForm(userForm.$valid)"  method="post" accept-charset="utf-8" enctype="multipart/form-data" class="ng-pristine ng-valid">
{{ csrf_field() }}		

<div class="col-md-4">
<div class="input file"><label for="submittedfile">{{ trans('app.import_upload_xlscsv_specified')}}</label>
	<input ng-model="file" type="file" name="file" class="form-control" >
</div>	
</div>
<div style="clear:both;"></div>
<div class="col-md-6">
	<br>
 <div class="bs-example" data-example-id="single-button-dropdown">
		<div class="btn-group">
			<a href="{{URL::to('userlist')}}" class="btn btn-info btn-group"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back</a>   		</div>
		<div class="btn-group">
		<a class="btn btn-default" href="{{URL::to('images/example_main.xls')}}"><span class="glyphicon glyphicon-download-alt"></span>  Dowload Sample</a>		
		</div>
		<div class="btn-group">
			<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary btn-group loadingclick" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."><i class="fa fa-save"></i>  Submit</button>	
		</div>
		
	</div>
</div>
</form>
<div style="clear:both"></div>
</div>
</div>
</div><br/>
@stop