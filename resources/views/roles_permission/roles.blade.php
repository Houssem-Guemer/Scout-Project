@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/filament-tablesaw/tablesaw.css">
<div class="page-header">
  <h1 class="page-title font_kufi"> {{ trans('app.roles')}}</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">{{ trans('app.role')}}</li>
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

<div class="row">
<div class="col-lg-12">
<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
	<li class="active" role="presentation"><a data-toggle="tab" href="#viewrole" aria-controls="activities" role="tab" aria-expanded="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{ trans('app.roles')}}</a></li>
	<li role="presentation" class=""><a data-toggle="tab" href="#addrole" aria-controls="profile" role="tab" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> {{ trans('app.add_role')}}</a></li>
</ul>
<div class="tab-content">
  <div id="viewrole" class="tab-pane fade in active"><br/>
	<table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
	<thead>
			<tr>
				<th data-tablesaw-priority="4" class="tablesaw-priority-4 tablesaw-cell-visible"> {{ trans('app.name')}}</th>
				<th data-tablesaw-priority="3"> {{ trans('app.display_name')}}</th>
				<th data-tablesaw-priority="2">{{ trans('app.users_with_this_role')}}</th>
				<th class="text-center" data-tablesaw-priority="1">{{ trans('app.actions')}}</th>
			</tr>
		</thead>
		<tbody>
		@foreach($roles as $view)
			  <tr>
				<td class="tablesaw-priority-4 tablesaw-cell-visible">{{$view->name}}</td>
				<td class="tablesaw-priority-3">{{$view->display_name}}</td>
				<td class="tablesaw-priority-2">{{$view->users_count}}</td>
				<td class="text-center"  class="tablesaw-priority-1">
					<a href="{{URL::to('RoleController/edit')}}/{{$view->id}}" class="btn btn-icon btn-info btn-outline btn-round" title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}"><i class="icon wb-pencil" aria-hidden="true"></i></a>
					 <button data-placement="top" data-original-title="{{ trans('app.delete')}}" rel="tooltip" title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical" data-toggle="modal" type="button" data-href="{{URL::to('/dashboard/roles/destroy')}}/{{$view->id}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
				 </td>
			   </tr>
			@endforeach  
		  </tbody>
	</table>
	
 </div>
<div id="addrole" class="tab-pane fade"><br/>
<form name="userForm" action="roles" method="post" novalidate="" >
{{ csrf_field() }}
<div class="col-md-6">
<div class="form-group">
<label class="control-label">{{ trans('app.role_name')}}</label>
	<input type="text" class="form-control" ng-model="name" id="name" name="name" placeholder="Role Name" required>
</div>

<div class="form-group">
<label class="control-label">{{ trans('app.display_name')}}</label>
	<input type="text" class="form-control" ng-model="display_name" id="display_name" name="display_name" placeholder="Display Name" required>
</div>

<div class="form-group">
<label class="control-label">{{ trans('app.description')}}</label>
<textarea name="description"  ng-model="description" id="description" class="form-control"></textarea>
</div>
<div class="bs-example" data-example-id="single-button-dropdown">
<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
<i class="fa fa-save"></i> {{ trans('app.create_role')}}
<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
</button>  
</div>		
</div>	

</form>
</div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div style="clear:both;"></div>
</div>
</div>
</div><br/>
@stop



