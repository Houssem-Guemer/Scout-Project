@extends('layouts.template')
@section('content')
<style>
.page-content-table .table>tbody>tr>td{
	padding-top: 10px; 
    padding-bottom: 10px;
}
</style>
<div class="bg-white">
<!-- Mailbox Sidebar -->
<div class="page-aside">
	<div class="page-aside-switch">
		<i class="icon wb-chevron-left" aria-hidden="true"></i>
		<i class="icon wb-chevron-right" aria-hidden="true"></i>
	</div>
	<div class="page-aside-inner" data-plugin="pageAsideScroll">
	<div data-role="container">
	  <div data-role="content">
		<div class="page-aside-section">
		  <div class="list-group">
		 <a class="list-group-item" href="{{URL::to('/message')}}"> @if(!empty($newmessagecount))<span class="badge badge-info">{{$newmessagecount}}</span>@endif <i class="icon wb-inbox" aria-hidden="true"></i> {{ trans('app.inbox')}} </a>
			
			 <a href="{{URL::to('/SendMessage')}}" class="list-group-item active" ><i class="icon wb-envelope" aria-hidden="true"></i> {{ trans('app.send')}} </a>
		  </div>
		</div>
		
	  </div>
	</div>
	</div>
</div>
<!-- Mailbox Content -->
<div class="page-main "> 
<div class="page-header">
<h1 class="page-title font_kufi">{{ trans('app.send_message')}}</h1>
<div class="page-header-actions">
  <form class="form-inline ng-pristine ng-valid" action="{{URL::to('SendMessage')}}" method="get"> 
	<div class="form-group">  
		<input type="text" name="search" class="form-control" id="search" placeholder="{{ trans('app.search_message_title')}}.." value="{{Request::get('search')}}"> 
		
		<button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>
		 
		@if (Request::get('search') != '')
	   <a href="{{URL::to('SendMessage')}}" class="btn btn-outline btn-danger" type="button">
		  <i class="icon fa-remove" aria-hidden="true"></i>
		</a>
	@endif
	</div>		
	
</form>
</div>
</div>
<!-- Mailbox Content -->
  <div class="col-lg-12">
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
	

<form class="form-horizontal" role="form" method="post" action="{{URL::to('/MessageController/destroy/')}}">	
	{{ csrf_field() }}	
		
<div class="page-content page-content-table" data-selectable="selectable">

<table class="table">
@foreach($sendmessage as $view)
	<tr>
	<td  class="cell-60"><span class="checkbox-custom checkbox-primary checkbox-xs">
	<input name="messageid[]" value="{{$view->id}}"  type="checkbox" class="mailbox-checkbox selectable-item" id="mail_mid_1">
	<label for="mail_mid_1"></label></span>			
	</td>
	<td class="cell-30 responsive-hide">
	<span class="checkbox-important checkbox-default">
	<input type="checkbox" class="mailbox-checkbox mailbox-important" id="mail_mid_1_important"><label for="mail_mid_1_important"></label></span>
	</td>
	<td class="cell-60 responsive-hide" onclick="document.location = '{{URL::to('/sendDetails')}}/{{$view->id}}'"><a class="avatar" href="javascript:void(0)">
	<img class="img-responsive" src="{{URL::to('/')}}/uploads/{{$view->sendMessage->image}}" alt="..."></a>
	</td>
	<td onclick="document.location = '{{URL::to('/sendDetails')}}/{{$view->id}}'">
	
		<div class="content"><div class="title">{{$view->sendMessage->first_name}} {{$view->sendMessage->last_name}}</div>
		<div class="abstract">{{$view->subject}}</div></div>
	
	</td>
	<td onclick="document.location = '{{URL::to('/sendDetails')}}/{{$view->id}}'" class="cell-30 responsive-hide" ></td><td class="cell-130"><div class="time">{{$view->updated_at}}</div>
	</tr>
 @endforeach
</table>
<div style="clear:both;"></div>
 {{ $sendmessage->links() }}	

 <!------------- compose button---------------->
  <div class="site-action">
     <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
      <i class="front-icon wb-pencil animation-scale-up" aria-hidden="true"></i>
      <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
    </button>
    <div class="site-action-buttons">
     <a href="{{URL::to('/')}}">
	 <button type="submit" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
        <i class="icon wb-trash" aria-hidden="true"></i>
      </button></a>
     
    </div>
  </div>
 <!-------------end  compose button----------------> 

</div>
</form>
<!--------------------------------------- end send mail------------->
 </div>
</div>

<!-- Create New Messages Modal -->  
<div class="modal fade" id="addMailForm" aria-hidden="true" aria-labelledby="addMailForm" role="dialog" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
  <form class="form-horizontal" role="form" method="post" action="{{URL::to('/MessageController/save/')}}">	
	{{ csrf_field() }}	
	<div class="modal-header">
	  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
	  <h4 class="modal-title">Create New Messages</h4>
	</div>
	<div class="modal-body">
	  
		<div class="form-group">
		  <select id="topicTo" name="receiver_id[]" class="form-control" data-plugin="select2" multiple="multiple"
		  data-placeholder="To:">
			<optgroup label="">
				@foreach($userdata as $view)
				<option value="{{$view->id}}">{{$view->first_name}} {{$view->last_name}}</option>
				@endforeach
			</optgroup>
		  </select>
		</div>
		<div class="form-group">
			<input type="hidden" value="0" name="replay_id"/>
			<input type="hidden" value="{{Auth::user()->id}}" name="sender_id"/>
			<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject.." required >		
		</div>
		<div class="form-group">
		  <textarea name="description" data-provide="markdown" data-iconlibrary="fa" rows="10"></textarea>
		</div>
	  
	</div>
	<div class="modal-footer text-left">
	  <button class="btn btn-primary"  type="submit">Send</button>
	  <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
	</div>
	</form>
  </div>
</div>
</div>
<!-- End Create New Messages Modal -->
  
<!-- Add Label Form -->
<div class="modal fade" id="addLabelForm" aria-hidden="true" aria-labelledby="addLabelForm"
role="dialog" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
	  <h4 class="modal-title">Add New Label</h4>
	</div>
	<div class="modal-body">
	  <form>
		<div class="form-group">
		  <input type="text" class="form-control" name="lablename" placeholder="Label Name"
		  />
		</div>
	  </form>
	</div>
	<div class="modal-footer">
	  <button class="btn btn-primary" data-dismiss="modal" type="submit">Save</button>
	  <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
	</div>
  </div>
</div>
</div>
@stop
  