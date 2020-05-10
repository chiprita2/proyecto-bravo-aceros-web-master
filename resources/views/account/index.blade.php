@extends('layouts.html')

@section('content')
@include('layouts.header')
@include('layouts.title', [ 'title' => $seo['title'] ] )
<style>
  .form-group input {
    margin-bottom: 10px;
  }
</style>
<section class="asd">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xs-3 sidebar sidebar-full">
        <div class="widget widget-account">
          <div class="widget-title">
            <h3>Mi cuenta</h3>
          </div>
          <div>
            <ul class="list-unstyled">
              <li>
                <a href="{{ route('account') }}"
                  style="padding: 15px 15px;display: block;background-color: #f4f4f4;margin-bottom:2px;">
                  <i class="fa fa-chevron-right" style="margin-right:4px;"></i>Datos
                  personales</a>
              </li>
              <li>
                <a href="{{ route('account-pass') }}"
                  style="padding: 15px 15px;display: block;background-color: #f4f4f4;margin-bottom:2px;">
                  <i class="fa fa-chevron-right" style="margin-right:4px;"></i>Cambiar
                  contraseña</a>
              </li>
              <li>
                <a href="{{ route('account-orders') }}"
                  style="padding: 15px 15px;display: block;background-color: #f4f4f4;">
                  <i class="fa fa-chevron-right" style="margin-right:4px;"></i>Mis
                  pedidos</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xs-9">
        @if (session('status'))
        <div class="alert">
          <div class="alert-icon">
            <i class="fa fa-check-circle"></i>
          </div>
          <div class="alert-content">
            <h4>{{ session('status') }}</h4>
            <p>Sus datos personales fueron actualizados</p>
          </div>
        </div>
        @endif
        <h3 class="text-uppercase">Mis datos Personales</h3>
        <form method="POST" action="{{ route('update-user') }}">
          @csrf
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="name">Nombre completo</label>
                <input id="name" value="{{ $user['name'] }}" type="text" class="form-control" value="" name="name"
                  required="">
                @error('name')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="rut">Rut</label>
                <input id="rut" value="{{ $user['rutFormat'] }}" type="text" class="form-control" value="" name="rut"
                  required="">
                @error('rut')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="email">Email</label>
                <input id="email" value="{{ $user['email'] }}" type="email" class="form-control" value="" name="email"
                  required="">
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="telefono">Telefono</label>
                <input id="telefono" value="{{ $user['phone'] }}" type="phone" class="form-control" value=""
                  name="phone" required="">
                @error('telefono')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-12">
              <button type="submit" class="btn btn-secondary" style="padding: 0 20px;width: auto;">
                Actualizar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>

@include('layouts.footer')
@endsection