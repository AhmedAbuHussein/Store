@extends('layouts.app') 

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-right">تسجيل الدخول</div>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="username" class="col-sm-4 col-form-label text-md-left">اسم المستخدم</label>

							<div class="col-md-6">
								<input id="username" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="اسم المستخدم" required autofocus > @if ($errors->has('username'))
								<span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span> @endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-left">كلمه المرور</label>

							<div class="col-md-6">
								<input id="password" type="password" placeholder="كلمه المرور" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> @if ($errors->has('password'))
								<span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-4"></div>
							<div class="col-md-6 text-center">
								<button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button><br>

								<a class="btn btn-link" href="{{ route('password.request') }}">نسيت كلمه المرور</a>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
