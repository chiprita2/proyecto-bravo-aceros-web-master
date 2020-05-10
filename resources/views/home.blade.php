@extends('layouts.html')

@section('content')
@include('layouts.header')
<!--
    <a href="{{ route('home') }}">Inicio</a><br>
    <a href="{{ route('shop') }}">Tienda</a><br>
    <a href="{{ route('shop-category', ['id' => 1]) }}">Categoria</a><br>
    <a href="{{ route('shop-product', ['id' => 1]) }}">Producto</a><br>
    <a href="{{ route('cart') }}">Carro de compras</a><br>
    <a href="{{ route('checkout') }}">Proceso de compra</a><br>
    <a href="{{ route('success') }}">Exito</a><br>
    <a href="{{ route('contact-us') }}">Contacto</a><br>
    <a href="{{ route('cms', ['cms' => 'condiciones-de-uso']) }}">CMS</a><br>
    <a href="{{ route('account') }}">cuenta</a><br>
    <a href="{{ route('account-orders') }}">account</a><br>
    <a href="{{ route('account-personal') }}">account</a><br>
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
    @endif
    -->
<div class="preloader">
  <div class="spinner">
    <div class="bounce1">
    </div>
    <div class="bounce2">
    </div>
    <div class="bounce3">
    </div>
  </div>
</div>


<!-- Hero Section
    ============================================= -->
<section id="hero" class="hero hero-5">

  <!-- START REVOLUTION SLIDER 5.0 -->
  <div class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider" data-version="5.0">
      <ul>

        <!-- slide 1 -->
        <li data-transition="boxslide" data-slotamount="default" data-easein="Power4.easeInOut"
          data-easeout="Power4.easeInOut" data-masterspeed="2000" style="background-color: rgba(34, 34, 34, 0.3);">
          <!-- MAIN IMAGE -->
          <img src="/images/sliders/11.jpg" alt="" width="1920" height="1280">
          <!-- LAYER NR. 1 -->
          <div class="tp-caption text-uppercase color-theme" data-x="left" data-hoffset="50" data-y="center"
            data-voffset="-100" data-whitespace="nowrap" data-width="none" data-height="none" data-transform_idle="o:1;"
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="2200" data-splitin="none" data-splitout="none" data-responsive_offset="on"
            data-fontsize="['55','17','15','15']" data-lineheight="['50','45','25','25']"
            data-fontweight="['700','500','600','300']" data-color="#ffc527" style="font-family: montserrat; ">
            <h1>¡Ahora más que nunca prefiere despacho!</h1>
            <h2>Quédate en casa</h2>
            <p>Despacho gratis compras sobre $70.000.-</p>
          </div>

          <!-- LAYER NR. 4 -->
          <div class="tp-caption" data-x="left" data-hoffset="60" data-y="center" data-voffset="90" data-width="none"
            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power3.easeOut;"
            data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);"
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
            data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
            data-mask_out="x:inherit;y:inherit;" data-start="3000" data-splitin="none" data-splitout="none"
            data-responsive_offset="on" data-responsive="off">
            <a class="btn btn-primary btn-white" title="Valores de despacho"
              href="{{ route('cms', ['id' => 'valores-de-despacho']) }}">Ver más</a>
          </div>
        </li>

        <!-- slide 2 -->
        <li data-transition="slotslide-vertical" data-slotamount="default" data-easein="Power4.easeInOut"
          data-easeout="Power4.easeInOut" data-masterspeed="2000">
          <!-- MAIN IMAGE -->
          <img src="/images/sliders/2.jpg" alt="" width="1920" height="1280">

          <!-- LAYER NR. 1 -->
          <div class="tp-caption text-uppercase color-theme" data-x="left" data-hoffset="50" data-y="center"
            data-voffset="-100" data-whitespace="nowrap" data-width="none" data-height="none" data-transform_idle="o:1;"
            data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="2000" data-splitin="none" data-splitout="none"
            data-responsive_offset="on" data-fontsize="['55','17','15','15']" data-lineheight="['50','45','25','25']"
            data-fontweight="['700','500','600','300']" data-color="#ffc527" style="font-family: montserrat;">
            Encuentra metales de calidad
          </div>

          <!-- LAYER NR. 2 -->
          <div class="tp-caption" data-x="left" data-hoffset="60" data-y="center" data-voffset="0" data-width="none"
            data-height="none" data-transform_idle="o:1;"
            data-transform_in="x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="3000" data-splitin="none" data-splitout="none"
            data-responsive_offset="on" data-fontsize="['17','17','17','17']" data-lineheight="['26','26','25','25']"
            data-fontweight="['700','500','500','500']" data-color="#fff" style="font-family: raleway; text-align:left">
            Perfiles abiertos, cerrados, laminados, galvanizados, <br> planchas, cañerías, fierro de construcción y
            mucho
            más.
          </div>

          <!-- LAYER NR. 4 -->
          <div class="tp-caption" data-x="left" data-hoffset="60" data-y="center" data-voffset="90" data-width="none"
            data-height="none" data-transform_idle="o:1;"
            data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="5000"
            data-splitin="none" data-splitout="none" data-responsive_offset="on">
            <a class="btn btn-primary btn-white" title="Productos" href="{{ route('shop') }}">Productos</a>
          </div>
        </li>

        <!-- slide 3 -->
        <li data-index='rs-367' data-transition='fadetotopfadefrombottom' data-slotamount='default'
          data-easein='default' data-easeout='default' data-masterspeed='default'>
          <!-- MAIN IMAGE -->
          <img src="/images/sliders/3.jpg" alt="" width="1920" height="1280">
          <!-- LAYER NR. 1 -->
          <div class="tp-caption text-uppercase color-theme" data-x="left" data-hoffset="50" data-y="center"
            data-voffset="-100" data-whitespace="nowrap" data-width="['auto','auto','auto','auto']"
            data-height="['auto','auto','auto','auto']" data-transform_idle="o:1;"
            data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
            data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="2000" data-splitin="chars" data-splitout="none"
            data-responsive_offset="on" data-elementdelay="0.05" data-fontsize="['55','17','15','15']"
            data-lineheight="['50','45','25','25']" data-fontweight="['700','500','600','300']" data-color="#ffc527"
            style="font-family: montserrat; ">
            QUIENES <br />
            SOMOS
          </div>

          <!-- LAYER NR. 2 -->
          <div class="tp-caption" data-x="left" data-hoffset="60" data-y="center" data-voffset="20" data-width="none"
            data-height="none" data-transform_idle="o:1;"
            data-transform_in="x:-50px;skX:100px;opacity:0;s:2000;e:Power4.easeInOut;"
            data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="4810"
            data-splitin="none" data-splitout="none" data-responsive_offset="on" data-fontsize="['17','17','17','17']"
            data-lineheight="['26','26','25','25']" data-fontweight="['700','500','500','500']" data-color="#fff"
            style="font-family: raleway ;text-align:left">
            Bravo Acero es una empresa que se dedica al rubro <br> de comercialización de aceros con más de 10 años de
            experiencia en el mercado.
          </div>

          <!-- LAYER NR. 3 -->
          <div class="tp-caption" data-x="left" data-hoffset="60" data-y="center" data-voffset="100" data-width="none"
            data-height="none" data-transform_idle="o:1;"
            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
            data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(41, 46, 49, 0);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
            data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="5670"
            data-splitin="none" data-splitout="none"
            data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
            data-responsive_offset="on" data-responsive="off">
            <a class="btn btn-primary btn-white" title="Quienes Somos"
              href="{{ route('cms', ['id' => 'quienes-somos']) }}">Ver más</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- END REVOLUTION SLIDER -->
    <div class="container widget-bottom">
      <div class="row">
      </div>
      <!-- .row end -->
    </div>
    <!-- .container end -->
  </div>
  <!-- END OF SLIDER WRAPPER -->
</section>
<!-- #hero end -->

<!-- Shortcode #1 
    ============================================= -->
<section id="shotcode-1" class="shotcode-1 about-home-2 text-center-xs text-center-sm">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="heading heading-4">
              <div class="heading-bg heading-right">
                <p class="mb-0">Acerca de nosotros</p>
                <h2>Quienes somos</h2>
              </div>
            </div>
            <!-- .heading end -->
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="cta-form bg-theme">
              <div class="cta cta-2">
                <div class="cta-icon">
                  <i class="lnr lnr-apartment"></i>
                </div>
                <div class="cta-devider">
                </div>
                <div class="cta-desc">
                  <p class="text-left text-white">¿No estás seguro de lo que buscas?</p>
                  <h5>Cotiza en nuestro catálogo</h5>
                </div>
              </div>
              <!-- .cta-2 end -->

              <div class="cta-model" style="padding: 10px 40px;">
                <a class="btn btn-primary btn-black btn-block" href="#" data-toggle="modal" data-target="#model-quote"
                  id="modelquote">Cotiza aquí</a>
              </div>
            </div>
            <!-- .cta-form -->

          </div>
        </div>
      </div>
      <!-- .col-md-12 end -->
      <div class="col-xs-12 col-sm-12 col-md-6">
        <h3 class="color-heading mb-md">Bravo Aceros es una empresa dentro de las líderes en distribución de metales de
          construcción en el mercado nacional</h3>
        <p>Bravo Aceros nace en el año 2010 luego que su dueño decide independizarse posteriormente a trabajar 18 años
          en una importante distribuidora del mismo rubro. Con una gran pasión por los metales y una amplia experiencia
          se inicia la empresa que somos hoy en día, sin dejar de lado el arduo esfuerzo de estos 9 años en los que más
          de un día se trabaja de 8:00 a 21:00 para cumplir con todos nuestros clientes siendo la rapidez lo que nos
          destaca en el amplio mercado.</p>
        <!-- <a class="btn btn-secondary mt-50 mb-30-xs" href="#">our services</a> -->
      </div>
      <!-- .col-md-6 end -->
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1">
            <div class="feature-icon">
              <i class="lnr lnr-apartment"></i>
            </div>
            <h4 class="text-uppercase">Calidad</h4>
            <p>Tenemos los mejores proveedores de la industria para asegurar la entrega de calidad en nuestros productos
            </p>
          </div>
          <!-- .col-md-6 end -->
          <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1">
            <div class="feature-icon">
              <i class="lnr lnr-briefcase"></i>
            </div>
            <h4 class="text-uppercase">Distribución</h4>
            <p>Contamos con expertos con más de 18 años de experiencia en el rubro de distribución de metales</p>
          </div>
          <!-- .col-md-6 end -->
          <div class="col-xs-12 col-sm-6 col-md-6 feature feature-1 mb-0">
            <div class="feature-icon">
              <i class="lnr lnr-car"></i>
            </div>
            <h4 class="text-uppercase">Despacho</h4>
            <p>Servicio de despacho a pedidos y con capacidad de transportar hasta 15 toneladas</p>
          </div>
          <!-- .col-md-6 end -->
          <div class="col-xs-12 col-sm-6 col-md-6 feature  feature-1 mb-0">
            <div class="feature-icon">
              <i class="lnr lnr-cart"></i>
            </div>
            <h4 class="text-uppercase">Compra Online</h4>
            <p>Puedes realizar tus cotizaciones y compras online en nuestro sitio web</p>
          </div>
        </div>
        <!-- .row end -->
      </div>
      <!-- .col-md-6 end -->
    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->
</section>

<!-- Shortcode #4 
    ============================================= -->
<section id="shortcode-4" class="shortcode-4 bg-gray">
  <div class="container text-center">
    <div class="row">

      <!-- Section Body
          ============================================= -->
      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="facts-box">
          <div class="counter">
            +6000
          </div>
          <h4 class="text-uppercase">ventas concretadas</h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="facts-box">
          <div class="counter">
            35
          </div>
          <h4 class="text-uppercase">Proveedores</h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="facts-box">
          <div class="counter">
            15
          </div>
          <h4 class="text-uppercase">Profesionales</h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="facts-box last">
          <div class="counter">
            +300
          </div>
          <h4 class="text-uppercase">Clientes</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Block #3
    ============================================= -->
<section id="service-3" class="service service-3">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
        <div class="heading heading-2 text-center">
          <div class="heading-bg">
            <p class="mb-0">Profesionales a tu alcance</p>
            <h2>Conoce nuestro servicio de despacho</h2>
          </div>
          <p class="mb-0 mt-md">Entregamos un servicio de calidad brindando seguridad en los productos transportados.
          </p>
          <a class="btn btn-secondary mt-50 mb-30-xs" title="Servicios"
            href="{{ route('cms', ['id' => 'servicios']) }}">Más información</a>
        </div>
        <!-- .heading end -->
      </div>
      <!-- .col-md-6 end -->

    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->
</section>

@include('layouts.footer')
@endsection

@section('scripts')
<!-- RS5.0 Core JS Files -->
<script type="text/javascript" src="/assets/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript" src="/assets/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>

<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js">
</script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() { 
      jQuery("#slider1").revolution({
        sliderType:"standard",
        sliderLayout:"auto",
        delay:6000,
        disableProgressBar:"on",
        spinner:"off",
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          onHoverStop:"off",
          arrows: {
            style:"arrow",
            enable:true,
            hide_onmobile:true,
            hide_onleave:false,
            tmp:'',
            left: {
              h_align:"left",
              v_align:"bottom",
              h_offset:110,
              v_offset:65
            },
            right: {
              h_align:"left",
              v_align:"bottom",
              h_offset:150,
              v_offset:65
            }
          }
        }, 
        gridwidth:1230,
        gridheight:700
      }); 
    }); 
</script>
@endsection