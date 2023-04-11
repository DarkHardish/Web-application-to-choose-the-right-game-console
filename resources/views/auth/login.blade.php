@extends('layouts.app')

@section('content')
@if(session('message'))
<h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
@endif

<section class="h-screen" style="background-color: #0B0B0B;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="/assets/images/tlo-login.jpg"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                     <img src="/assets/images/logo-2.png" alt="" width="50">
                      <span class="h1 fw-bold mb-0 px-2">FAVRIATE</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Zaloguj się do konta.</h5>

                    <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      <label class="form-label" for="form2Example17">Adres e-mail</label>
                      @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                      <label class="form-label" for="form2Example27">Hasło</label>
                      @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Zaloguj</button>
                    </div>

                    @if (Route::has('password.request'))
                    <a class="small text-muted" href="{{ route('password.request') }}">Zapomniałeś hasła ?</a>
                    @endif

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Nie masz jeszcze konta? <a href="{{ route('register') }}"
                        style="color: #393f81;">Załóż je tutaj!</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
