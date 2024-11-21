@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <!-- Gambar Ilustrasi -->
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Sample image">
            </div>

            <!-- Form Login -->
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input Email -->
                    <div class="form-outline mb-4">
                        <input id="email" type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                        <label class="form-label" for="email">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="form-outline mb-4">
                        <input id="password" type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" />
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me dan Lupa Password -->
                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember"> Remember me </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                    <!-- Divider -->
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                    </div>

                    <!-- Login dengan Media Sosial -->
                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
                        <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                    </a>
                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
                        <i class="fab fa-twitter me-2"></i>Continue with Twitter
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .vh-100 {
        height: 100vh;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .form-outline {
        position: relative;
    }

    .form-label {
        position: absolute;
        top: -10px;
        left: 15px;
        background-color: #fff;
        padding: 0 5px;
        font-size: 0.85rem;
        color: #6c757d;
    }
</style>
