@extends('layouts.template')
@section('content')
 <!-- Stylesheets -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/pages/profile.css">
<div class="page-header">
  <h1 class="page-title font_kufi">{{ trans('app.user_details')}}</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li><a href="{{URL::to('userlist')}}">{{ trans('app.users')}}</a></li>
		<li class="active">{{$userdata->first_name}} {{$userdata->last_name}}</li>
	</ol>
  </div>
</div>
<div class="page-content container-fluid page-profile">
  <div class="row">
	<div class="col-md-3">
	  <!-- Page Widget -->
	  <div class="widget widget-shadow text-center">
		<div class="widget-header">
		  <div class="widget-header-content">
			<a class="avatar avatar-lg" href="javascript:void(0)">
			@if(!empty($userdata->image))
				<img class="img-responsive img-circle" src="{{URL::to('uploads')}}/{{$userdata->image}}" width="170" height="170"  />
			@else
				@if($userdata->gender == 'Female')
					<img class="img-responsive img-circle" src="{{URL::to('images/female.png')}}" width="170" height="170"  />	
				@else
				<img class="img-responsive img-circle" src="{{URL::to('images/default.png')}}" width="170" height="170"  />
				@endif
			@endif
			</a>
			<h4 class="profile-user">{{$userdata->first_name}} {{$userdata->last_name}}</h4>
		   <p class="profile-job">{{ trans('app.role')}} - {{$userdata->role}}</p>               
			<div class="profile-social">
			   <a class="icon bd-google-plus" target="_blank" href="{{$userdata->google}}"></a>
			  <a class="icon bd-facebook" target="_blank" href="{{$userdata->facebook}}"></a>			 
			  <a class="icon bd-twitter" target="_blank" href="{{$userdata->twitter}}"></a>
			  <a class="icon bd-dribbble" target="_blank" href="{{$userdata->dribbble}}"></a>
			  <a class="icon bd-linkedin" target="_blank" href="{{$userdata->linkedin}}"></a>
			 
			</div>
		  </div>
		</div>
		
	  </div>
	  <!-- End Page Widget -->
	</div>
	
	
	<div class="col-md-9">
	  <!-- Panel -->
	  <div class="panel">
		<div class="panel-body nav-tabs-animate nav-tabs-horizontal">
		<!------------------------start insert, update, delete message ---------------->
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
			<a class="btn btn-icon btn-info btn-outline btn-round pull-right" href="{{URL::to('edit')}}/{{$userdata->id}}" data-toggle="tooltip" data-original-title="{{ trans('app.edit_user')}}" ><i class="icon wb-pencil" aria-hidden="true"></i> </a>
				
		  <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
			<li class="active" role="presentation"><a data-toggle="tab" href="#activities" aria-controls="activities" role="tab" aria-expanded="false">{{ trans('app.activities')}} </a></li>
			<li role="presentation" class=""><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-expanded="false">{{ trans('app.profile')}}</a></li>
			<li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages" role="tab" aria-expanded="true">{{ trans('app.message')}} @if(!empty($messagecount))<span class="badge badge-danger">{{$messagecount}}</span>@endif </a></li>
			<li class="dropdown" role="presentation" style="display: none;">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
				<span class="caret"></span>Menu </a>
			  <ul class="dropdown-menu" role="menu">
				<li role="presentation" style="display: none;"><a data-toggle="tab" href="#activities" aria-controls="activities" role="tab">{{ trans('app.activities')}} <span class="badge label-danger">5</span></a></li>
				<li role="presentation" style="display: none;"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">{{ trans('app.profile')}}</a></li>
				<li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages" role="tab">{{ trans('app.message')}}</a></li>
			  </ul>
			</li>
		  </ul>
		  <div class="tab-content">
<!------------- Activity tab ------------->
			<div class="tab-pane animation-slide-left" id="activities" role="tabpanel">
			  <table class="table table-hover table-details">
				<thead>
					<tr>
						<th>{{ trans('app.ip_address')}}</th>
						<th>{{ trans('app.message')}}</th>
						<th>{{ trans('app.log_time')}}</th>
					</tr>
				</thead>
				<tbody>
				@foreach($useractivity as $value)
					<tr>
						<td>{{$value->ip_address}}</td>
						<td>{{$value->description}}</td>
						<td> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans() }} </td>
					</tr>
				@endforeach
				 </tbody>
			</table>
			 {{ $useractivity->appends(Request::only('search'))->links() }}
			</div>
			
<!------- Profile tab------------->
			<div class="tab-pane animation-slide-left active" id="profile" role="tabpanel">
			<table class="table table-hover table-details">
				<thead>
					<tr>
						<th rowspan="4">{{ trans('app.contact_informations')}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ trans('app.email')}}</td>
						<td><a href="#">{{$userdata->email}}</a></td>
					</tr>  
					<tr>
						<td>{{ trans('app.username')}}</td>
						<td><a href="#">{{$userdata->username}}</a></td>
					</tr>                        
				 </tbody>
			</table>
			<p style="border-bottom:1px dashed green;"></p>

			<table class="table table-hover dataTable table-striped width-full dtr-inline">
				<thead>
				<tr>
					<th rowspan="4">{{ trans('app.additional_informations')}}</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>{{ trans('app.country')}}</td>
					<td>{{$userdata->country}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.gender')}}</td>
					<td>{{$userdata->gender}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.phone')}}</td>
					<td>{{$userdata->phone}}</td>
				</tr>
				
				
				<tr>
					<td>{{ trans('app.date_of_birth')}}</td>
					<td>{{$userdata->date_of_birth}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.status')}}</td>
					<td>{{$userdata->status}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.address')}}</td>
					<td>{{$userdata->address}}</td>
				</tr>
				
				</tbody>
			</table>
			</div>
			
<!------- Message tab------------->
			<div class="tab-pane animation-slide-left " id="messages" role="tabpanel">
			 <ul class="list-group">
				@foreach($receivemessage as $view)	
				<li class="list-group-item">
			 
				 <div class="media">
					<div class="media-left">
					  <a class="avatar" href="{{URL::to('/inboxDetails')}}/{{$view->id }}/{{$view->replay_id ? $view->replay_id : $view->id }}">
						<img class="img-responsive" src="{{URL::to('/')}}/uploads/{{$view->receiveMessage->image}}" alt="...">
					  </a>
					</div>
					<!--{{print_r($receivemessage)}}-->
					
					<div class="media-body">
					<a href="{{URL::to('/inboxDetails')}}/{{$view->id }}/{{$view->replay_id ? $view->replay_id : $view->id }}">
					  <h4 class="media-heading">{{$view->receiveMessage->first_name}} {{$view->receiveMessage->last_name}}
					  </a>
						
					  </h4>
					  <small>{{$view->updated_at}}</small>
					  <div class="profile-brief">
					  @if($view->status == 0)
			<span class="label label-round label-info">{{ trans('app.new')}}</span>
			@endif
			  {{((!empty($view->subject))? $view->subject : trans('app.replay_message'))}}
					  
					  </div>
					</div>
					
					
				  </div>
				</li>
				@endforeach
				
			  </ul>
   {{ $receivemessage->appends(Request::only('search'))->links() }}
			</div>
		  </div>
		</div>
	  </div>
	  <!-- End Panel -->
	</div>
  </div>
</div>

<br/>
@stop