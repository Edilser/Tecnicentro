@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection

@section('content')
<section class="row flexbox-container">
  <div class="mx-auto">
    <div class="card bg-authentication rounded-0 mb-0">
      <div class="row m-0">
        <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
          <img src="{{ asset('images/pages/login.png') }}" alt="branding logo">
        </div>
        <div class="col-lg-6 col-12 p-0">
          <div class="card rounded-0 mb-0 px-2" style="padding: 50px;">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="mb-0">Bienvenido</h4>
              </div>
            </div>
            <p class="px-2">Ingresa tus datos</p>
            <div class="card-content">
              <div class="card-body pt-1">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email"
                      autofocus>
                    <div class="form-control-position">
                      <i class="feather icon-user"></i>
                    </div>
                    <label for="email">Correo electrónico</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>

                  <fieldset class="form-label-group position-relative has-icon-left">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" placeholder="Contraseña" required autocomplete="current-password">
                    <div class="form-control-position">
                      <i class="feather icon-lock"></i>
                    </div>
                    <label for="password">Contraseña</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>
                  <button type="submit" class="btn btn-primary float-right btn-inline">Iniciar sesión</button>
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
