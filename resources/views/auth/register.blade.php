@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('AKK Web')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Registro de usuarios') }}</strong></h4>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Por favor, llena todos los campos solicitados para tu registro') }}</p>

            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('apellidoPaterno') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="apellidoPaterno" class="form-control" placeholder="{{ __('Apellido paterno...') }}" value="{{ old('apellidoPaterno') }}" required autocomplete="apellidoPaterno" autofocus>
              </div>
              @if ($errors->has('apellidoPaterno'))
                <div id="apeP-error" class="error text-danger pl-3" for="apellidoPaterno" style="display: block;">
                  <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('apellidoMaterno') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="apellidoMaterno" class="form-control" placeholder="{{ __('Apellido materno...') }}" value="{{ old('apellidoMaterno') }}" required autocomplete="apellidoMaterno" autofocus>
              </div>
              @if ($errors->has('apellidoMaterno'))
                <div id="apeM-error" class="error text-danger pl-3" for="apellidoMaterno" style="display: block;">
                  <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="text" name="telefono" class="form-control" placeholder="{{ __('Número de telefono...') }}" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
              </div>
              @if ($errors->has('telefono'))
                <div id="tel-error" class="error text-danger pl-3" for="telefono" style="display: block;">
                  <strong>{{ $errors->first('telefono') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">business</i>
                  </span>
                </div>
                <input type="text" name="empresa" class="form-control" placeholder="{{ __('Empresa...') }}" value="{{ old('empresa') }}" required autocomplete="empresa" autofocus>
              </div>
              @if ($errors->has('empresa'))
                <div id="emp-error" class="error text-danger pl-3" for="empresa" style="display: block;">
                  <strong>{{ $errors->first('empresa') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Correo...') }}" value="{{ old('email') }}" required autocomplete="email">
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" required autocomplete="new-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña...') }}" required autocomplete="new-password">
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>

          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Crear cuenta') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
