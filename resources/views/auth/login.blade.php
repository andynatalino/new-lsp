@extends('layouts.users.app-new')
@section('pageTitle', 'Login')
@section('description', 'Share text and photos with your friends and have fun')
@section('css')
<link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
@endsection

@section('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
	{{ csrf_field() }}
	<h1 class="h3 mb-3 font-weight-normal">Login</h1>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	@if ($errors->has('email'))
	<span class="text-danger">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
	@endif
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
	@if ($errors->has('password'))
	<span class="text-danger">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
	@endif
	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<label>Belum punya akun?</label><a href="{{ route('register') }}"> Daftar disini</a>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

@endsection