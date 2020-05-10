@extends('layouts.html')

@section('content')
@include('layouts.header')
@include('layouts.title', [ 'title' => $seo['title'] ] )
<style>
  .form-group input {
    margin-bottom: 10px;
  }

  .payment-methods .item {
    border-radius: 4px;
    border: 1px #ececec solid;
    padding: 24px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
  }

  .payment-methods .item p {
    font-size: 12px;
    font-weight: 400;
    margin: 0;
  }
</style>
<section>
  <div class="container">
    <form action="{{ route('create-order') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="row justify-content-center">

        <div class="col-xs-6">
          <h3 class="text-uppercase">Mis datos</h3>


          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group @error('name') has-error @enderror">
                <label for="name">Nombre y apellido</label>
                <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                @error('name')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group @error('rut') has-error @enderror">
                <label for="rut">Rut</label>
                <input id="rut" type="text" class="form-control" value="{{ old('rut') }}" name="rut" required>
                @error('rut')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group @error('email') has-error @enderror">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email" required>
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group @error('phone') has-error @enderror">
                <label for="telefono">Telefono</label>
                <input id="telefono" type="phone" class="form-control" value="{{ old('phone') }}" name="phone" required>
                @error('phone')
                <span class="help-block">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="create-account" id="create-account"
                  @if(old('create-account')) checked @endif>
                <label class="form-check-label" for="create-account">
                  ¿Crear una cuenta?
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <h3 class="text-uppercase">Datos despacho</h3>
          <div class="row">
            <div class="col-xs-12">
              <div class="radio-check col-xs-6">
                <input class="radio-check-input" type="radio" value="1" value="{{ old('shipping_type') }}"
                  name="shipping_type" id="shipping_type" checked>
                <label class="radio-check-label" for="shipping_type">
                  Despacho
                </label>
              </div>
              <div class="radio-check col-xs-6">
                <input class="radio-check-input" type="radio" value="2" value="{{ old('shipping_type') }}"
                  name="shipping_type" id="shipping_type_2">
                <label class="radio-check-label" for="shipping_type_2">
                  Retiro
                </label>
              </div>
            </div>
            <!-- Despacho -->
            <div id="shipping_home">
              <div class="col-xs-12" style="margin-top:20px;">
                <div class="form-group @error('shipping_name') has-error @enderror">
                  <label for="shipping_name">Nombre de quien recibe</label>
                  <input id="shipping_name" type="text" class="form-control" value="{{ old('shipping_name') }}"
                    name="shipping_name">
                  @error('shipping_name')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                <div class="form-group @error('shipping_address') has-error @enderror">
                  <label for="shipping_address">Dirección de entrega (Direccion, número) </label>
                  <input id="shipping_address" type="text" class="form-control" value="{{ old('shipping_address') }}"
                    name="shipping_address">
                  @error('shipping_address')
                  <span class="help-block">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group @error('shipping_zone') has-error @enderror">
                  <label for="shipping_zone">Comuna de entrega</label>
                  <select class="form-control" name="shipping_zone">
                    <opition value="">Seleccione</opition>
                    @foreach ($zones as $zone)
                    <option data-price="{{ $zone['price'] }}" value="{{ $zone['id'] }}"
                      @if(old('shipping_zone')==$zone['id']) selected @endif>
                      {{ $zone['name'] }} - {{ $zone['priceFormat'] }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="form-group">
                  <label for="shipping_info">Notas del pedido (opcional) </label>
                  <textarea id="shipping_info" type="text" class="form-control"
                    name="shipping_info">{{ old('shipping_info') }}</textarea>
                </div>
              </div>
            </div>
            <!-- Despacho -->
            <!-- Despacho -->
            <div id="shipping_store" style="display: none;">
              <div class="clearfix"></div>
              <div class="alert alert-success" style="margin: 20px 24px;">
                Debe retirar sus productos en <strong>{{ $configs['ADDRESS'] }}</strong>
              </div>
            </div>
            <!-- Despacho -->
          </div>
        </div>
        <div class="col-xs-12" style="margin-top: 50px;">
          <h3 class="text-uppercase">Tu pedido</h3>
          <div class="cart-table table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="cart-product">
                  <th class="cart-product-item">Producto</th>
                  <th class="cart-product-price">Precio</th>
                  <th class="cart-product-total">Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cart['products'] as $product )
                <tr class="cart-product">
                  <td class="cart-product-item">
                    <div class="cart-product-name">
                      <h6>{{ $product['name'] }} x {{ $product['quantity'] }}</h6>
                    </div>
                  </td>
                  <td class="cart-product-price">$ {{ number_format($product['price']) }}</td>
                  <td class="cart-product-total">$ {{ number_format($product['price'] * $product['quantity']) }}</td>
                </tr>
                @empty
                <div class="alert alert-success" style="margin-bottom: 0;">
                  <p> No hay productos en su carro </p>
                </div>
                @endforelse
                <tr class="cart-product">
                  <td class="cart-product-item" style="text-align: right;" colspan="2">
                    <strong>Despacho</strong>
                  </td>
                  <td class="cart-product-shipping" data-number="0" style="text-align: center;"></td>
                </tr>
                <tr class="cart-product">
                  <td class="cart-product-item" style="text-align: right;" colspan="2">
                    <strong>Total</strong>
                  </td>
                  <td class="cart-product-total-amount" style="text-align: center;">$
                    {{  number_format($cart['total']) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-xs-12">
          <h3 class="text-uppercase">Formas de pago</h3>
          <div class="row payment-methods">
            @foreach ($payments as $payment)
            <div class="col-xs-12 col-sm-4">
              <label for="payment_method_1">
                <div class="item">
                  <input type="radio" id="payment_method_1" name="payment_method" value="{{ $payment['id'] }}"
                    @if(old('payment_method')==$payment['id']) checked @endif required>
                  {{ $payment['name'] }}
                  <p>{{ $payment['description'] }}</p>
                </div>
              </label>
            </div>
            @endforeach

          </div>
        </div>
        <div class="col-xs-12">
          <div style="margin-top:24px;" class="product-cta text-right text-center-xs">
            <div class="form-check">
              <label class="form-check-label" for="terminos">
                Acepto los <a target="_blank" title="Terminos y condiciones de uso"
                  href="{{ route('cms', ['id' => 'condiciones-de-uso']) }}">terminos y condiciones de uso</a> de
                BravoAceros
              </label>
              <input class="form-check-input" type="checkbox" value="1" name="terminos" id="terminos"
                @if(old('terminos')==1) checked @endif required>
            </div>
            <button type="submit" class="btn btn-secondary" style="padding: 0 20px;width: auto;">
              Comprar y finalizar
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@include('layouts.footer')
@endsection

@section('scripts')
<script>
  const free_shipping = '{{ $configs['MAX_BUY'] }}';
  const total = '{{ $cart['total'] }}';
  function hide_shipping(val) {
    if (val == 2) {
        $('#shipping_home').hide()
        $('#shipping_store').show()
        return;
      }
    $('#shipping_home').show()
    $('#shipping_store').hide()
  }
  $(document).ready(function() {
    $('.cart-product-shipping').html(`Seleccione una comuna`);
    $('.cart-product-total-amount').html(`$ ${total}`);

    const price = $("select[name='shipping_zone']").find('option:selected').data('price');
    $('.cart-product-shipping').html(`$ ${price.toLocaleString("es-ES")}`);
    $('.cart-product-total-amount').html(`$ ${(parseInt(price) + parseInt(total)).toLocaleString("es-ES")}`);
    
    const val = $("input[name='shipping_type']").val();
    hide_shipping(val)
    $("input[name='shipping_type']").change(function(){
      const val = $(this).val() 
      hide_shipping(val)
    });

    $("select[name='shipping_zone']").change(function(){
      const price = $(this).find('option:selected').data('price');
      $('.cart-product-shipping').html(`$ ${price.toLocaleString("es-ES")}`);
      $('.cart-product-total-amount').html(`$ ${(parseInt(price) + parseInt(total)).toLocaleString("es-ES")}`);
    });
  }) 
</script>
@endsection