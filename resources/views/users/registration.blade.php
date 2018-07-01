@extends('layouts.template')
@section('content') 
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/jt-timepicker/jquery-timepicker.css">
<link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/forms/advanced.css">

<style>
p.redcolor{color:red; font-size:16px;}
.spancolor{color:red;}
.help-block{color:red;}
</style>

<div class="page-content" ng-app="app" ng-cloak>	
<div class="panel">
<div class="panel-body container-fluid">
<!-- Alerts -->
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


<form  name="userForm" action="{{URL::to('store')}}" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
		{{ csrf_field() }}
<div class="row row-lg">
	<div class="col-sm-8" style="border-right: 1px dotted #ddd;">
	  <!-- Example Basic Form -->	              
			<div class="row">
			<div class="col-sm-12">
			<p class="font-size-20 blue-grey-700">User Details</p>
			</div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicFirstName">{{ trans('app.first_name')}}<span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="first_name" ng-model="first_name" name="first_name" ng-init="first_name='{{ old('first_name') }}'" placeholder="{{ trans('app.first_name')}}" required>
			  </div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicLastName">{{ trans('app.last_name')}}<span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="last_name" name="last_name" ng-model="last_name" ng-init="last_name='{{ old('last_name') }}'" placeholder="{{ trans('app.last_name')}}" required>
			  </div>
			</div>
			
			<div class="row">			  
			  
			 <div class="form-group col-sm-6">
				<label class="control-label">{{ trans('app.select_role')}} <span class="text-danger">*</span></label>
				<select ng-model="role"  class="form-control" name="role" required ng-init="role = '{{ old('role') }}'">
					<option value=""> ---- </option>	
					@foreach($roles as $view)
					<option value="{{$view->name}}">{{trans($view->display_name)}}</option>	
					@endforeach
				</select>
			  </div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="inputBasicFirstName">{{ trans('app.phone')}}</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="{{ trans('app.phone')}}" value="{{ old('phone') }}" autocomplete="off">
			  </div>			  
			</div>
			<div class="row">			  
			  <div class="form-group col-sm-6">			  
			  <label class="control-label" for="inputBasicFirstName">{{ trans('app.date_of_birth')}}</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="{{ trans('app.date_of_birth')}}" data-plugin="datepicker">
                  </div>
                </div>			  
			  <div class="form-group col-sm-6">
				<label class="control-label">{{ trans('app.country')}} <span class="spancolor">*</span></label>
				<select ng-model="country"  class="form-control" name="country" required ng-init="country = '{{ old('country') }}'">
					<option value="">{{ trans('app.select_country')}} </option>	
					@foreach($country as $data)
						<option value="{{$data->nicename}}">{{$data->nicename}}</option>
					@endforeach
				</select>
			  </div>			  
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
				<label class="control-label">{{ trans('app.status')}}</label>
			  <div>
			  <div class="btn-group" data-toggle="buttons" role="group">
				  <label class="btn btn-outline btn-primary  {{ ((old('status')== 'Active')?'active': '')}} {{ (empty(old('status'))?'active': '')}}">
					<input type="radio" name="status" autocomplete="off"  value="Active"  checked="">
					<i class="icon wb-check text-active" aria-hidden="true"></i>  {{ trans('app.active')}}
				  </label>
				  <label class="btn btn-outline btn-primary {{ ((old('status')== 'Inactive')?'active': '')}}">
					<input type="radio" name="status" autocomplete="off" value="Inactive" {{ ((old('status') == 'Inactive')?'checked' : '')}} >
					<i class="icon wb-check text-active" aria-hidden="true"></i> {{ trans('app.inactive')}}
				  </label>                     
				</div>
				</div>					
			  </div>
			  
			  
				<div class="form-group col-sm-6">
				<label class="control-label">{{ trans('app.gender')}}</label>
			  <div>
			  <div class="btn-group" data-toggle="buttons" role="group">
				  <label class="btn btn-outline btn-primary  {{ ((old('gender')== 'Male')?'active': '')}} {{ (empty(old('gender'))?'active': '')}}">
					<input type="radio" name="gender" autocomplete="off"  value="Male"  checked="">
					<i class="icon wb-check text-active" aria-hidden="true"></i>  {{ trans('app.male')}}
				  </label>
				  <label class="btn btn-outline btn-primary {{ ((old('gender')== 'Female')?'active': '')}}">
					<input type="radio" name="gender" autocomplete="off" value="Female" {{ ((old('gender') == 'Female')?'checked' : '')}} >
					<i class="icon wb-check text-active" aria-hidden="true"></i> {{ trans('app.female')}}
				  </label>                     
				</div>
				</div>
					
			  </div>
			  
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
				<label class="control-label" for="inputBasicFirstName">{{ trans('app.address')}}</label>
				<textarea class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="{{ trans('app.address')}}" autocomplete="off"></textarea>
				<!--<input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="{{ trans('app.address')}}" autocomplete="off">-->
			 </div>
			  
			</div>
	  
	</div>
	<div class="col-sm-4">
	  <!-- Example Basic Form Without Label -->
	      <div class="col-sm-12 row">
			<p class="font-size-20 blue-grey-700">Login Details</p>
			</div>          
		<div class="form-group">
		  <label class="control-label" for="inputBasicEmail">{{ trans('app.email_address')}} <span class="spancolor">*</span></label>
		  <input type="email" class="form-control" ng-model="email" ng-init="email='{{ old('email') }}'" required id="email" name="email" placeholder="{{ trans('app.email_address')}}" autocomplete="off">
		 <p class="help-block" ng-show="userForm.email.$error.email"> Not valid email!</p>
		 @if ($errors->has('email'))
		  <span class="help-block">
		   <strong>{{ $errors->first('email') }}</strong>
		  </span>
		 @endif
		</div>
		 <div class="form-group">
		  <label class="control-label" for="username">{{ trans('app.username')}} <span class="spancolor">*</span></label>
		  <input type="text" class="form-control" id="username" ng-model="username" ng-init="username='{{ old('username') }}'" required  name="username" placeholder="{{ trans('app.username')}}" minlength="6" autocomplete="off">
			<p ng-show="userForm.username.$error.minlength" class="help-block">Minimum 6 character</p>
			@if ($errors->has('username'))
		  <span class="help-block">
		   <strong>{{ $errors->first('username') }}</strong>
		  </span>
		 @endif
		</div>
		
		<div class="form-group">
		<label class="control-label" for="inputBasicPassword"> {{ trans('app.password')}} <span class="spancolor">*</span></label>
			<input type="password" class="form-control"  ng-model="password" placeholder="{{ trans('app.password')}}" name="password" required="required" ng-init="password = '{{old('password')}}'" ng-minlength="6"/>
			<div ng-if="userForm.password.$touched || userForm">                    
				<p ng-show="userForm.password.$error.minlength" class="help-block">Minimum 6 character</p>
			</div>
		</div>
		<div class="form-group">
		<label class="control-label" for="inputBasicPassword">{{ trans('app.confirm_password')}} <span class="spancolor">*</span></label>
			<input type="password" class="form-control"  name="confirm_password" ng-model="confirm_password" ng-init="confirm_password = '{{old('confirm_password')}}'" placeholder="{{ trans('app.confirm_password')}}" match-password="password" required >
			<div ng-if="userForm.confirm_password.$touched || userForm">                    
				<p ng-show="userForm.confirm_password.$error.matchPassword && !userForm.confirm_password.$error.required" class="help-block">Confirm password didn't match</p>
			</div>
		</div>
			
	</div>
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<i class="fa fa-save"></i>  {{ trans('app.create_an_account')}}
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
	
	</div>
  </div>
</form> 
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div><br/>
		
<script>
var app = angular.module('app', []);

app.directive("matchPassword", function () {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=matchPassword"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.matchPassword = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
});
</script>
@stop