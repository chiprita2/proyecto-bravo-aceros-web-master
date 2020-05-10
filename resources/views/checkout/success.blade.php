@extends('layouts.html')

@section('content')
@include('layouts.header')
@include('layouts.title', [
'title' => "Pedido Nº{$order['id']}"
])
<section id="success" class="success">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xs-12 col-sm-4">
        <h2>Forma de pago</h2>
        <p>{{ $order['payment']['name'] }}</p>
        <p>{!! $order['payment']['info'] !!}</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <h2>Datos Clientes</h2>
        <p>{{ $order['name'] }}</p>
        <p>{{ $order['email'] }}</p>
        <p>{{ $order['phone'] }}</p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <h2>Datos de entrega</h2>
        <p>{{ $order['shipping_name'] }}</p>
        <p>{{ $order['shipping_address'] }}</p>
        <p>{{ $order['shipping_address'] }}</p>
        <p>{{ $order['zone']['name'] }}</p>
      </div>
      <div class="col-xs-12">
        <h2>Productos</h2>
        <table class="table table-bordered">
          <thead>
            <tr class="cart-product">
              <th class="cart-product-item">Producto</th>
              <th class="cart-product-price">Precio</th>
              <th class="cart-product-quantity">Cantidad</th>
              <th class="cart-product-total">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order['products'] as $product )
            <tr class="cart-product">
              <td class="cart-product-item">
                <div class="cart-product-name">
                  <h6>{{ $product['name'] }}</h6>
                </div>
              </td>
              <td class="cart-product-price">$ {{ number_format($product['value']) }}</td>
              <td class="cart-product-quantity" style="width:150px;">
                {{ $product['quantity'] }}
              </td>
              <td class="cart-product-total">$ {{ number_format($product['value'] * $product['quantity']) }}</td>
            </tr>
            @endforeach
            <tr class="cart-product-action">
              <td colspan="3" class="text-right">
                <strong>Despacho: </strong>
              </td>
              <td>
                $ {{ number_format($order['total_shipping']) }}
              </td>
            </tr>
            <tr class="cart-product-action">
              <td colspan="3" class="text-right">
                <strong>Total: </strong>
              </td>
              <td>
                $ {{ number_format($order['total_pay'] + $order['total_shipping']) }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@include('layouts.footer')
@endsection