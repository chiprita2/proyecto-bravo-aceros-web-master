<footer id="footer" class="footer-1">
  <!-- Contact Bar
  ============================================= -->
  <div class="container footer-widgtes">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="widgets-contact">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 widget">
              <div class="widget-contact-icon pull-left">
                <i class="lnr lnr-map"></i>
              </div>
              <div class="widget-contact-info">
                <p class="text-capitalize text-white">Nuestra dirección</p>
                <p class="text-capitalize font-heading">{{$configs['ADDRESS']}}</p>
              </div>
            </div>
            <!-- .widget end -->
            <div class="col-xs-12 col-sm-12 col-md-4 widget">
              <div class="widget-contact-icon pull-left">
                <i class="lnr lnr-envelope"></i>
              </div>
              <div class="widget-contact-info">
                <p class="text-capitalize text-white">Email</p>
                <p class="text-capitalize font-heading">{{$configs['EMAIL']}}</p>
              </div>
            </div>
            <!-- .widget end -->
            <div class="col-xs-12 col-sm-12 col-md-4 widget">
              <div class="widget-contact-icon pull-left">
                <i class="lnr lnr-phone"></i>
              </div>
              <div class="widget-contact-info">
                <p class="text-capitalize text-white">Llamanos</p>
                <p class="text-capitalize font-heading">{{$configs['PHONE']}}</p>
              </div>
            </div>
            <!-- .widget end -->
          </div>
          <!-- .row end -->
        </div>
        <!-- .widget-contact end -->
      </div>
      <!-- .col-md-12 end -->
    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->

  <!-- Widget Section
  ============================================= -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 widgets-links">
        <div class="col-xs-12 col-sm-12 col-md-4 widget-about text-center-xs mb-30-xs">
          <div class="widget-about-logo pull-left pull-none-xs">
            <img src="/images/footer-logo.png" alt="logo" />
          </div>
          <div class="widget-about-info">
            <h5 class="text-capitalize text-white">{{$configs['SITE_NAME']}}</h5>
            <p class="mb-0">{{$configs['FOOTER_DESCRIPCION']}}</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 widget-navigation text-center-xs mb-30-xs">
          <h5 class="text-capitalize text-white">General</h5>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <ul class="list-unstyled text-capitalize">
                <li>
                  <a title="Quienes Somos" href="{{ route('cms', ['id' => 'quienes-somos']) }}"> Quienes somos</a>
                </li>
                <li>
                  <a title="Tienda" href="{{ route('shop') }}"> Tienda</a>
                </li>
                <li>
                  <a title="Servicios" href="{{ route('cms', ['id' => 'servicios']) }}"> Servicios</a>
                </li>
              </ul>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <ul class="list-unstyled text-capitalize">
                <li>
                  <a title="Contacto" href="{{ route('contact-us') }}"> Contacto</a>
                </li>
                <li>
                  <a title="Mi cuenta" href="{{ route('account') }}"> Mi cuenta</a>
                </li>
                <li>
                  <a title="Carro de compras" href="{{ route('cart') }}"> Cotizador</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-5 widget-services text-center-xs">
          <h5 class="text-capitalize text-white">Categorias</h5>
          <div class="row">
            @foreach ($categories as $category)
            <div class="col-xs-4 col-sm-4 col-md-4">
              <ul class="list-unstyled text-capitalize" style="margin: 0;">
                <li>
                  <a href="{{ route('shop-category', ['url' => $category['url']]) }}"
                    title="{{ $category['name'] }}">{{ $category['name'] }}</a>
                </li>
              </ul>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyrights
  ============================================= -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 copyrights text-center">
        <p class="text-capitalize">© 2020 BravoAceros. todos los derechos reservados</p>
      </div>
    </div>
  </div>
</footer>