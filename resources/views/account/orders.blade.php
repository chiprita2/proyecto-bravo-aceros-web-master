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
        <h3 class="text-uppercase">Mis pedidos</h3>
        <table class="table table-bordered">
          <thead>
            <tr class="cart-product">
              <th class="cart-product-item">Pedido</th>
              <th class="cart-product-price">Estado</th>
              <th class="cart-product-quantity">Fecha</th>
              <th class="cart-product-total">Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $order)
            <tr class="cart-product">
              <td class="cart-product-item">
                {{ $order['id'] }}
              </td>
              <td class="cart-product-price">
                {{ $order['status']['name'] }}
              </td>
              <td class="cart-product-quantity" style="width:150px;">
                {{ $order['created_at'] }}
              </td>
              <td class="cart-product-total">
                $ {{ number_format($order['total_pay']) }}
              </td>
              <td>
                <a target="_blank" href="{{ route('success', ['code' => $order['code_uniq']]) }}">
                  Ver mas
                </a>
              </td>
            </tr>
            @empty
            <tr class="cart-product">
              <td class="cart-product-item" colspan="5">
                <div class="alert" style="margin-bottom: 0;">
                  <p> No hay pedidos en su cuenta </p>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
</section>

@include('layouts.footer')
@endsection