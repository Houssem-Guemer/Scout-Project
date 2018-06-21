@extends('layouts.app')

@section('content')
 
<body class="page-login layout-full page-dark">
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    @foreach($settingdata as $view)
	<div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.17);">
      <div class="brand">
	  <img class="navbar-brand-logo" style="height:50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Scout_Logo.svg/520px-Scout_Logo.svg.png" title="Farazisoft"/>
        <h2 class="brand-text"> فوج الفلاح استمرارية و نجاح</h2>
      </div>
      <p> قم بتسجيل الدخول إلى حساب صفحاتك</p>
       <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}         
		 
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					
						<input id="email" type="text" class="form-control" placeholder="{{ trans('app.username')}} OR {{ trans('app.email_address')}} " name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif					
				</div>
			
		 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">			
				<input id="password" type="password" required class="form-control" name="password" placeholder="{{ trans('app.password')}}">

				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
		</div>
		
          <div class="form-group clearfix">
              @if($view->forget_password == 'ON')
                  <a class="pull-left" href="{{ url('/password/reset') }}">هل نسيت الرقم السري ؟ </a>
              @endif
                  @if($view->remember_me == 'ON')
                      <div class="checkbox-custom  checkbox-primary pull-right" >

                          <input type="checkbox" id="remember" name="checkbox" title="remember">
                          <label></label>
                      </div>

                      <label class="pull-right" style="text-align: center;margin-right: 5px;margin-top: 6px">تذكرني ؟</label>
                  @endif

			
		  </div>
          <!--<button type="submit" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading..">{{ trans('app.sign_in')}}</button>-->
        
		<button type="submit" class="btn btn-primary ladda-button btn-block" data-plugin="ladda" data-style="expand-left">
			تسجيل الدخول
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0;"></div>
		</button>
		
		</form>

    </div>
</div>
@endforeach
@endsection
