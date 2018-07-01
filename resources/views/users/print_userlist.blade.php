@extends('layouts.template')
@section('content')
<div id="page-wrapper">
<br/>
<div class="row">
<div class="col-lg-12">
 <div class="table-responsive">
<table class="table" id="testTable">
  <thead>
	<tr>
	  <th>{{ trans('app.first_name')}} {{ trans('app.last_name')}}</th>
	  <th>{{ trans('app.email')}}</th>
	  <th>{{ trans('app.phone')}}</th>
	  <th>{{ trans('app.status')}}</th>	  
	</tr>
  </thead>
  <tbody>
  @foreach($userdata as $view)
	<tr>
	  <td>{{$view->first_name}} {{$view->last_name}} </td>
	  <td>{{$view->email}}</td>
	  <td>{{$view->phone}}</td>
	  <td>{{$view->status}}</td>
	</tr>
@endforeach
  </tbody>
</table>
</div>
<div style="clear:both;"></div>
<!-- /.row (nested) -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<script>
    window.print();
</script>
@stop



