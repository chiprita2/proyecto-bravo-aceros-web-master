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
            <p>Su contraseña fue actualizada</p>
          </div>
        </div>
        @endif
        <h3 class="text-uppercase">Cambiar contraseña</h3>
        <form method="POST" action="{{ route('update-pass') }}">
          @csrf
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="password">Contraseña Actual</label>
                <input id="password" type="text" class="form-control" name="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="pass_new">Contraseña nueva</label>
                <input id="pass_new" type="text" class="form-control" name="pass_new">
                @error('pass_new')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group ">
                <label for="pass_new2">Repetir contraseña nueva</label>
                <input id="pass_new2" type="text" class="form-control" name="pass_new2">
                @error('pass_new2')
                <div class="alert alert-danger">{{ $message }}</div>
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