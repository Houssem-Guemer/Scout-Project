@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/filament-tablesaw/tablesaw.css">
<div class="page-header">
  <h1 class="page-title font_kufi">{{ trans('app.activity_log')}} </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">{{ trans('app.activity_log')}}</li>
	</ol>
  </div>
</div>

<div class="page-content" >	
<div class="panel">
<div class="panel-body container-fluid">

<div class="row">
<div class="col-lg-12">

 <div class="bs-example" data-example-id="single-button-dropdown" style="float:right; ">		
<div class="btn-group">
	<form class="form-inline ng-pristine ng-valid" action="{{URL::to('activity')}}" method="get"> 
		<div class="form-group">  
			<input type="text" name="search" class="form-control" id="search" placeholder="{{ trans('app.search')}}" value="{{Request::get('search')}}" > 
		
		<button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>
		 
		@if (Request::get('search') != '')
	   <a href="{{URL::to('activity')}}" class="btn btn-outline btn-danger" type="button">
		  <i class="icon fa-remove" aria-hidden="true"></i>
		</a>
	@endif
	</div>
	</form>
</div>
</div>
<div style="clear:both;"></div><br/>
<table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
		<thead>
		  <tr>
			  <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">{{ trans('app.users')}}</th>
			  <th data-tablesaw-priority="4">{{ trans('app.ip_address')}}</th>
			  <th data-tablesaw-priority="3">{{ trans('app.message')}}</th>	  
			  <th data-tablesaw-priority="2">{{ trans('app.log_time')}}</th>
			  <th id='myColumnId' data-tablesaw-priority="1">{{ trans('app.more_info')}}</th>
		  </tr>
		</thead>
		<tbody>
		@foreach($activitydata as $view)
			<tr>
			<td class="tablesaw-priority-5 tablesaw-cell-visible"><a href="{{URL::to('activity/user/')}}/{{$view->id}}">{{$view->first_name}} {{$view->last_name}}</a></td>
			  <td class="tablesaw-priority-4">{{$view->ip_address}}</td>
			  <td class="tablesaw-priority-3">{{$view->description}}</td>
			  <td class="tablesaw-priority-2">{{$view->created_at}}</td>
			  <td class="tablesaw-priority-1" style="text-align:center;">
				<a href="#" title="{{ trans('app.user_agent')}}" data-toggle="popover" data-placement="left"
				data-content="{{$view->user_agent}}" data-original-title="{{ trans('app.user_agent')}}">
				<button type="button" title="{{ trans('app.user_agent')}}" class="btn btn-floating btn-primary btn-sm"><i class="fa fa-info"></i></button></a>
				
			</td>	
			</tr>
		@endforeach
		  
		</tbody>
	  </table>
<div style="clear:both;"></div>
<div style="clear:both;"></div>
{{$activitydata->appends(Request::only('search'))->links() }}

</div>
<!-- /.col-lg-12 -->
</div>
<div style="clear:both;"></div>
</div>
</div>
</div><br/>


@stop



