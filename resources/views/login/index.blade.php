@extends('layouts.second')

@section('container')

<img class="wave" src="img/kotak.png">
	<div class="container">
		<div class="img">
			<img src="img/landing.png">
		</div>
		<div class="login-content">

            {{-- notif login berhasil --}}
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
          </button>
        </div>
         
        @endif
			<form action="/login" method="post">
                <img src="/img/Politeknik_Sekayu.png">
				<h2 class="title">Login Aplikasi</h2>

                @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required>
                  <label for="username">Username</label>
                  @error('username') 
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div> 
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>

                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>

  
@endsection
