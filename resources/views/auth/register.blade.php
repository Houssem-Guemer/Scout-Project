@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                       <!-- <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth')}}</label>

                            <div class="col-md-2 col-sm-2 col-xs-2">
                              @include('includes.datepicker.day')
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-3">
                                @include('includes.datepicker.month')
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-3">
                                @include('includes.datepicker.year')
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary center">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
=======
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
>>>>>>> dashboard-test
    </div>
	@endforeach
@endsection
