@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Użytownik: id_{{ Auth::user()->id }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">Utworzono: {{ Auth::user()->created_at }}</div>
                    <div class="card-header">Zaktualizowano: {{ Auth::user()->updated_at }}</div>
                    <div class="card-header">Imię: {{ Auth::user()->name }}</div>
                    <div class="card-header">Adres e-mail: {{ Auth::user()->email }}</div>
                    <div class="card-header">Hasło: <input type="password" value="{{ Auth::user()->password }}"></div>
                    <div class="card-header mb-2">Awatar: {{ Auth::user()->avatar }}</div>
                   <img src="{{ asset('storage/avatars/' . Auth::user()->id . '/' . Auth::user()->avatar) }}" width="800">
                
                 
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
