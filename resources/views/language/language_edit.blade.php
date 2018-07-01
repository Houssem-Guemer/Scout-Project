@extends('layouts.template')
@section('content')
<div class="page-header">
  <h1 class="page-title font_kufi">{{ trans('app.language_update')}}	</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
	   <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li><a href="{{URL::to('language')}}">{{ trans('app.language')}}</a></li>
		<li class="active">{{$foldername}}</li>
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

<form  name="userForm" action="{{URL::to('LanguageController/update/lang')}}" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" action="store" class="form-horizontal form-label-left" method="post" novalidate="">
	{{ csrf_field() }}	
<div class="col-lg-12"> 
	   <table class="table table-striped">
		<thead> 
			<tr> 							
				<th style="width:50%">{{ trans('app.index_name')}} </th>
				<th style="width:50%">{{ trans('app.change_able')}} </th>							
			</tr> 
		</thead>
		<tbody> 
		@foreach($language_data as $key=>$value)
			<tr> 							 
				<td>{{$key}}</td>							
				<td>
					<input type="hidden" name="language_key[]" class="form-control" value="{{$key}}"/>
					<input type="text" name="language_value[]" class="form-control" value="{{$value}}"/>							
				</td> 							
			</tr>
			@endforeach
			<input type="hidden" value="{{$foldername}}" name="foldername"/>
		</tbody>		
	</table>
	<button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
	<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> {{ trans('app.language_update')}} </button>
	<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
  </div>
			<!------------------ user authentication ------------------>	
</form>
<div style="clear:both;"></div>
</div>
<!-- /.row -->
</div>
</div><br>
@stop
