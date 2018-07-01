<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {padding: 5px;}
</style>
<table style="width:100%">
  <thead>
	<tr>
	  <th>{{ trans('app.first_name')}} {{ trans('app.last_name')}}</th>
	  <th>{{ trans('app.username')}}</th>
	  <th>{{ trans('app.email')}}</th>
	  <th>{{ trans('app.country')}}</th>
	  <th>{{ trans('app.phone')}}</th>
	  <th>{{ trans('app.register_date')}}</th>
	</tr>
  </thead>
  <tbody>
  @foreach($userdata as $view)
	<tr>
	  <td>{{$view->first_name}} {{$view->last_name}}</td>
	  <td>{{$view->username}}</td>
	  <td>{{$view->email}}</td>
	  <td>{{$view->country}}</td>
	  <td>{{$view->phone}}</td>
	  <td>{{$view->created_at}}</td>
	  
	  
	</tr>
@endforeach
  </tbody>
</table>


