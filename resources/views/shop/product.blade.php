@extends('layouts.html')

@section('content')
@include('layouts.header')
@include( 'layouts.title', [ 'title' => $seo['name'] ] )
<section class="shop">
  <div class="container">
    @if (session('status'))
    <div class="alert">
      <div class="alert-icon">
        <i class="fa fa-check-circle"></i>
      </div>
      <div class="alert-content">
        <h4>{{ session('status') }}</h4>
        <p>Si desea continuar con la compra haga click <a href="{{ route('cart') }}">aqui</a></p>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 shop-content">

        <!-- Product Image -->
        <div class="product-img product-feature-img mb-50">
          @if ($seo['images'])
          <img src="{{ $seo['images'][0]['image'] }}" alt="{{ $seo['name'] }}" />
          @endif
        </div>
        <!-- .product-img end -->

        <!-- Product Content -->
        <div class="product-content">
          <div class="product-title text-center-xs">
            <h3>{{$seo['name']}}</h3>
          </div>
          <!-- .product-img end -->


          <!-- .product-img end -->

          <div class="product-desc text-center-xs">
            <p>{{ $seo['description_short'] }}</p>
          </div>
          <!-- .product-desc end -->

          <!-- .product-details end -->
          <hr class="mt-30 mb-30">
          <div class="products">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SKU</th>
                  <th scope="col">Nombre</th>
                  @foreach ($products as $product)
                  @foreach ($product->features as $feature)
                  <th scope="col">{{ $feature->name }}</th>
                  @endforeach
                  @endforeach
                  <th scope="col">Precio</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <form action="{{ route('add-cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <tr>
                    <th>{{ $product->sku }}</th>
                    <th>{{ $product->name }}</th>
                    @foreach ($product->features as $feature)
                    <th>{{ $feature->pivot->value }}</th>
                    @endforeach
                    <th>{{ $product->priceFormat }}</th>
                    <td>
                      <input type="number" class="form-control" name="quantity" value=1 min="1" max="100"
                        style="width:80px" />
                    </td>
                    <td>
                      <button type="submit" title="Agregar al carro" style="width: auto;padding: 0 20px;"
                        class="btn btn-small btn-primary" href="#">
                        <i class="fa fa-shopping-cart"></i>
                      </button>
                    </td>
                  </tr>
                </form>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- .product-action end -->
          <hr class="mt-30 mb-30">

          <!-- .product-share end -->
          <div class="product-tabs mb-50">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Descripción</a>
              </li>
              <li role="presentation">
                <a href="#details" aria-controls="details" role="tab" data-toggle="tab">Ficha Técnica</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="description">
                <p>{{$seo['description']}}</p>
              </div>
              <!-- #description end -->
              <div role="tabpanel" class="tab-pane" id="details">
                Archivos!
              </div>
            </div>
            <!-- #tab-content end -->
          </div>
          <!-- .product-tabs end -->
        </div>
        <!-- .product-content -->


        <!-- Related Project -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="widget-related-product">
              <div class="widget-title">
                <h4>Productos Relacionados</h4>
              </div>
              <div class="widget-content">
                <div class="row">
                  <!-- product #1 -->
                  @foreach ($relateds as $product)
                  @include('layouts.productItem')
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- .product-related end -->
      </div>
      <!-- .shop-content end -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar sidebar-full">
        <!-- .sidebar end -->
        <!-- Search
                    ============================================= -->
        <div class="widget widget-search">
          <div class="widget-content">
            <form action="{{ route('shop') }}" method="GET" class="form-search">
              <div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="Buscar..">
                <span class="input-group-btn">
                  <button class="btn" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>
              <!-- /input-group -->
            </form>
          </div>
        </div>

        <!-- Tag Clouds
                    ============================================= -->
        <div class="widget widget-tags">
          <div class="widget-title">
            <h3>Categorias</h3>
          </div>
          <div class="widget-content">
            <ul class="list-inline">
              @foreach ($categories as $category)
              <li>
                <a class="btn" href="{{ route('shop-category', ['url' => $category['url']]) }}"
                  title="{{ $category['name'] }}">{{ $category['name'] }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!-- .col-md-3 end -->
    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->
</section>

@include('layouts.footer')
@endsection