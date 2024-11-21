@extends('layouts.app')

@section('content')
<style>
  .gradient-custom {
    /* fallback for old browsers */
    background: #6a11cb;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
    height: 100vh; /* Full height */
    display: flex; /* Use flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
  }

  .card {
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
  }

  .form-control {
    border-radius: 0.5rem; /* Rounded corners for inputs */
    margin-bottom: 1rem; /* Space between inputs */
  }

  .btn {
    border-radius: 0.5rem; /* Rounded corners for buttons */
    padding: 0.5rem 1rem; /* Padding for buttons */
  }

  .btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Light background on hover */
  }
</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter your details to create an account!</p>

              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Input -->
                <div class="form-outline form-white mb-4">
                  <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <label class="form-label" for="name">Name</label>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <!-- Email Input -->
                <div class="form-outline form-white mb-4">
                  <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  <label class="form-label" for="email">Email Address</label>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <!-- Password Input -->
                <div class="form-outline form-white mb-4">
                  <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  <label class="form-label" for="password">Password</label>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="form-outline form-white mb-4">
                  <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                  <label class="form-label" for="password-confirm">Confirm Password</label>
                </div>

                <!-- Submit Button -->
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
              </form>

                            <!-- Social Media Links -->
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                              </div>
                
                            </div>
                
                            <!-- Link to Login -->
                            <div>
                              <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a></p>
                            </div>
                
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                @endsection