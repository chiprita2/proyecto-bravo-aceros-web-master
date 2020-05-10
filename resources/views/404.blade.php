@extends('layouts.html')

@section('content')
    @include('layouts.header')
      <section class="bg-overlay bg-overlay-gradient pb-0">
        <div class="bg-section" >
          <img src="/images/page-title/2.jpg" alt="Background"/>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="page-title title-1 text-center">
                <div class="title-bg">
                  <h2>404 Pagina no encontrada</h2>
                </div>
                <ol class="breadcrumb">
                  <li>
                    <a href="/">Inicio</a>
                  </li>
                  
                </ol>
              </div>
              <!-- .page-title end -->
            </div>
            <!-- .col-md-12 end -->
          </div>
          <!-- .row end -->
        </div>
        <!-- .container end -->
      </section>

      <section class="error-page text-center">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
              <div class="error-title">
                <h1>404</h1>
              </div>
            </div>
            <!-- .col-md-6 end -->
          </div>
          <!-- .row end -->
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
              <div class="error-content mt-50">
                <p>We are sorry, the page you want isn’t here anymore. May be one of the links below can help !</p>
                <a class="btn btn-primary" href="#">homepage</a>
                <a class="btn btn-secondary" href="#">Site map</a>
              </div>
            </div>
            <!-- .col-md-6 end-->
          </div>
          <!-- .row end -->
        </div>
        <!-- .container end  -->
      </section>
    @include('layouts.footer')
@endsection
