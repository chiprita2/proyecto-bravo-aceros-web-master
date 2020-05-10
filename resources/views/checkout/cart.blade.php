@extends('layouts.html')

@section('content')
@include('layouts.header')
@include('layouts.title', [ 'title' => $seo['title'] ] )
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        @if (session('status'))
        <div class="alert">
          <div class="alert-icon">
            <i class="fa fa-check-circle"></i>
          </div>
          <div class="alert-content">
            <h4>{{ session('status') }}</h4>
            <p>Su carro de compra fue actualizado!</p>
          </div>
        </div>
        @endif
        <div class="cart-table table-responsive">
          <form action="/actualizar-carro" method="POST">
            @csrf
            <table class="table table-bordered">
              <thead>
                <tr class="cart-product">
                  <th class="cart-product-item">Producto</th>
                  <th class="cart-product-price">Precio</th>
                  <th class="cart-product-quantity">Cantidad</th>
                  <th class="cart-product-total">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cart['products'] as $product )
                <tr class="cart-product">
                  <td class="cart-product-item">
                    <div class="cart-product-name">
                      <h6>{{ $product['name'] }}</h6>
                    </div>
                  </td>
                  <td class="cart-product-price">$ {{ number_format($product['price']) }}</td>
                  <td class="cart-product-quantity" style="width:150px;">
                    <input type="number" class="form-control" name="quantity[]" value="{{ $product['quantity'] }}"
                      placeholder="1" min="1" max="100" style="margin-bottom:0px" />
                  </td>
                  <td class="cart-product-total">$ {{ number_format($product['price'] * $product['quantity']) }}</td>
                  <td style="width:60px;">
                    <a href="{{ route('delete-cart', ['i' => $loop->index]) }}" class="cart-product-remove">
                      <i class="fa fa-close"></i>
                    </a>
                  </td>
                </tr>
                @empty
                <div class="alert alert-success" style="margin-bottom: 0;">
                  <p> No hay productos en su carro </p>
                </div>
                @endforelse
                <tr class="cart-product-action">
                  <td colspan="4">
                    <div class="row clearfix">
                      <div class="col-xs-12 col-sm-6 col-md-6">

                      </div>
                      <!-- .col-md-6 end -->
                      <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                        <button type="submit" class="btn btn-secondary btn-filled" href="#">Actualizar</button>
                        @if ($cart['total'] > $configs['MIN_BUY'])
                        <a class="btn btn-primary" href="{{ route('checkout') }}">Continuar</a>
                        @else
                        <div class="alert alert-danger"
                          style="margin-bottom: 0;display: inline-block;padding: 7px;line-height: 40px;height: 42px;">
                          <p>El minimo de compra es de ${{ number_format($configs['MIN_BUY'], 0, '', '.') }}</p>
                        </div>
                        @endif
                      </div>
                      <!-- .col-md-6 end -->
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
        <!-- .cart-table end -->
      </div>
      <!-- .col-md-12 end -->

      <div class="col-xs-12 col-sm-12 col-md-6">
      </div>
      <!-- .col-md-6 end -->
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="cart-total-amount">
          <h6>Totales :</h6>
          <ul class="list-unstyled">
            <li>Total a pagar :
              <span class="pull-right text-right">$ {{ number_format($cart['total']) }}</span>
            </li>
          </ul>
        </div>
        <!-- .shiping end -->
      </div>
      <!-- .col-md-6 end -->

    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->
</section>
@include('layouts.footer')
@endsection