@extends('layouts.app')

@section('content')
<body class="page-register layout-full page-dark">
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
      @foreach($settingdata as $view)	
    <div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.17);">
      <div class="brand">
	  <img class="navbar-brand-logo" style="height:50px" src="{{URL::to('/')}}/uploads/{{$view->logo}}" title="Farazisoft"/>
        <h2 class="brand-text">{{$view->app_name}}</h2>
      </div>
      <p>{{ trans('app.sign_up_to_find_interesting_thing')}} </p>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                   {{ csrf_field() }}				   
			<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">                         
						<input id="username" required placeholder="{{ trans('app.username')}}" type="text" class="form-control" name="username" value="{{ old('username') }}">
						@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
						@endif				  
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">				   
						<input id="email" required type="email"  placeholder="{{ trans('app.email_address')}}" class="form-control" name="email" value="{{ old('email') }}">
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">				   
						<input required id="password" placeholder="{{ trans('app.password')}}" type="password" class="form-control" name="password">
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">				   
						<input required id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('app.confirm_password')}}">
						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
				</div>
          <!--<button type="submit" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading..">{{ trans('app.sign_up')}}</button>-->
        <button type="submit" class="btn btn-primary ladda-button btn-block" data-plugin="ladda" data-style="expand-left">
			  {{ trans('app.sign_up')}}
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
		</form>
       <p>{{ trans('app.have_account_already_lease_go_to')}}  <a href="{{URL::to('/login')}}">{{ trans('app.sign_in')}}</a></p>
      <footer>          
          <div class="social">           
            <a class="btn btn-icon btn-round social-facebook" href="{{ url('/redirect/facebook') }}">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="{{ url('/redirect/google') }}">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
			 <a class="btn btn-icon btn-round social-twitter" href="{{ url('/redirect/twitter') }}">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
    </div>
	@endforeach
@endsection
