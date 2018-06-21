@extends('layouts.app')

<!-- Main Content -->
@section('content')
<body class="page-forgot-password layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="  page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">

    <div class="  page-content vertical-align-middle">
      <h2>نسيت كلمة السر  ؟</h2>
      <p>أدخل بريدك الإلكتروني المسجل لإعادة تعيين كلمة المرور الخاصة بك</p>
       @if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
			{{ csrf_field() }}
			
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			
				<input id="email" placeholder="E-Mail Address"  type="email" class="form-control" name="email" value="{{ old('email') }}">

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>.لا يمكننا العثور على مستخدم لديه عنوان هذا  البريد الإلكتروني</strong>
					</span>
				@endif
		</div>
		
		
        <div class="form-group">
		<button type="submit" class="btn btn-primary ladda-button btn-block" data-plugin="ladda" data-style="expand-left">
            اعد ضبط كلمه السر
            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
          <!--<button type="submit" class="btn btn-primary btn-block">Reset Your Password</button>-->
        </div>
      </form>

    </div>
  </div>

@endsection
