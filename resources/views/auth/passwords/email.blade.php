@extends('layouts.app')

@section('content')
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
               
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                     <img src="/assets/images/logo-2.png" alt="" width="50">
                      <span class="h1 fw-bold mb-0 px-2">FAVRIATE</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Resetowanie hasła.</h5>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      <label class="form-label" for="form2Example17">Adres e-mail</label>
                      @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
               


                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Wyślij link</button>
                      </div>


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
