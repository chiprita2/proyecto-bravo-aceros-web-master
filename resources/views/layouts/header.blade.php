<header id="navbar-spy" class="full-header header-5">
  <div id="top-bar" class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-8 col-md-offset-4 text-right">
          <ul class="list-inline top-contact">
            <li>
              <p>Telefono:
                <span>{{$configs['PHONE_HEADER']}}</span>
              </p>
            </li>
            <li>
              <p>Email:
                <span>{{$configs['EMAIL']}}</span>
              </p>
            </li>
          </ul>
        </div>
        <!-- .col-md-6 end -->
      </div>
    </div>
  </div>
  <nav id="primary-menu" class="navbar navbar-fixed-top style-1">
    <div class="row">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="/">
            <img src="/img/logo-bravo-aceros.jpg" alt="Bravo Aceros" style="width:180px;">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
            <li>
              <a href="{{ route('home') }}" title="Inicio">Inicio</a>
            </li>
            <li>
              <a href="{{ route('cms', ['id' => 'quienes-somos']) }}" title="Quienes somos">Quienes
                Somos</a>
            </li>
            <li class="has-dropdown">
              <a href="{{ route('shop') }}" title="Revisa nuestros productos" class="dropdown-toggle">Tienda</a>
              <ul class="dropdown-menu">
                @foreach ($categories as $category)
                <li>
                  <a href="{{ route('shop-category', ['url' => $category['url']]) }}"
                    title="{{ $category['name'] }}">{{ $category['name'] }}</a>
                </li>
                @endforeach
              </ul>
            </li>
            <li>
              <a href="{{ route('cms', ['id' => 'servicios']) }}" title="Nuestros servicios">Servicios</a>
            </li>
            <li>
              <a href="{{ route('contact-us') }}" title="Contacto">Contacto</a>
            </li>
            @if (Route::has('login'))
            @auth
            <li>
              <a href="{{ route('account') }}" title="Mi cuenta">Mi cuenta</a>
            </li>
            <li>
              <a href="{{ route('logout') }}" title="Salir">Salir</a>
            </li>
            @else
            <li>
              <a href="{{ route('login') }}" title="Iniciar Sesion">Iniciar Sesion</a>
            </li>
            @if (Route::has('register'))
            <li>
              <a href="{{ route('register') }}" title="Registro">Registro</a>
            </li>
            @endif
            @endauth
            @endif
          </ul>

          <!-- Mod-->
          <div class="module module-search pull-left">
            <div class="search-icon">
              <i class="fa fa-search"></i>
              <span class="title">search</span>
            </div>
            <div class="search-box">
              <form method="GET" action="/tienda" class="search-form">
                <div class="input-group">
                  <input name="search" type="text" class="form-control" placeholder="Buscar...">
                  <span class="input-group-btn">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                </div>
                <!-- /input-group -->
              </form>
            </div>
          </div>
          <!-- .module-search-->
          <!-- .module-cart -->
          <div class="module module-cart pull-left">
            <div class="cart-icon">
              <i class="fa fa-shopping-cart"></i>
              <span class="title">shop cart</span>
            </div>
            <div class="cart-box">

              @forelse ($cart['products'] as $product )
              <div class="cart-overview">
                <ul class="list-unstyled">
                  <li>
                    <img class="img-responsive" src="/images/shop/thumb/1h.png" alt="product" />
                    <div class="product-meta">
                      <h5 class="product-title">
                        {{ $product['name'] }}
                      </h5>
                      <p class="product-price">$ {{  number_format($product['price']) }}
                      </p>
                      <p class="product-quantity">
                        Cantidad: {{ $product['quantity'] }}
                      </p>
                    </div>
                    <a class="cancel" href="{{ route('delete-cart', ['i' => $loop->index]) }}">cancel</a>
                  </li>
                </ul>
              </div>
              @empty
              <div class="alert alert-success" style="margin-bottom: 0;">
                <p>No hay productos en su carro</p>
              </div>
              @endforelse
              @if ($cart['products'])
              <div class="cart-total">
                <div class="total-desc">
                  <h5>SUBTOTAL: $ {{ number_format($cart['total']) }}</h5>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="cart-control">
                <a class="btn btn-primary" href="{{ route('cart') }}">Ver el carro</a>
                @if ($cart['total'] > $configs['MIN_BUY'])
                <a class="btn btn-secondary pull-right" href="{{ route('checkout') }}">Comprar</a>
                @else
                <div class="alert alert-danger" style="margin-bottom: 0;display: inline-block;margin-top: 15px;">
                  <p>El minimo de compra es de ${{ number_format($configs['MIN_BUY'], 0, '', '.') }}</p>
                </div>
                @endif

              </div>
              @endif
            </div>
          </div>
          <!-- .module-cart end -->

        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </nav>
</header>