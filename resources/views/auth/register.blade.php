@extends('layouts.app')

@section('content')
<section class="h-screen" style="background-color: #0B0B0B;">
    <div class="container py-5 h-full">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="/assets/images/tlo-login.jpg"
                  alt="login form" class="img-fluid " style="border-radius: 1rem 0 0 1rem; width: 100%;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
  
                    <div class="d-flex align-items-center mb-1 pb-1">
                     <img src="/assets/images/logo-2.png" alt="" width="50">
                      <span class="h1 fw-bold mb-0 px-2">FAVRIATE</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Stwórz swoje konto.</h5>
                    <div class="form-outline mb-3">
                        <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        <label class="form-label" for="form2Example17">Imie</label>
                        @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                    <div class="form-outline mb-3">
                      <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                      <label class="form-label" for="form2Example17">Adres e-mail</label>
                      @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-outline mb-3">
                      <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                      <label class="form-label" for="form2Example27">Hasło</label>
                      @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-outline mb-3">
                        <input type="password" id="password-confirm" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password"/>
                        <label class="form-label" for="form2Example27">Potwierdź hasło</label>
                      </div>

                      <div class="form-outline mb-3">
                        <label for="avatar" class="form-label">{{ __('Awatar') }}</label>
                        <input type="file" name="avatar" id="avatar">
                        
                      </div>
                      <div class="form-outline mb-2">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @if(Session::has('g-recaptcha-response'))
                            <p class="alert {{ Session::get('alert-class','alert-info') }}">
                            {{ Session::get('g-recaptcha-response') }}
                            </p>
                            @endif
                      </div>
                    <div class="pt-1 mb-1">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Zarejestruj</button>
                    </div>
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
