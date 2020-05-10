@extends('layouts.html')

@section('content')
    @include('layouts.header')
    @include( 'layouts.title', [ 'title' => $seo['title'] ] )
    
    
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-4">
                        <div class="heading-bg heading-right">
                            <p class="mb-0"></p>
                            <h2>Contáctanos</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-12 end -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 widgets-contact mb-60-xs">
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-map"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">Dirección</p>
                                    <p class="text-capitalize font-heading">{{$configs['ADDRESS']}}</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-envelope"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize ">Email</p>
                                    <p class="text-capitalize font-heading">{{$configs['EMAIL']}}</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-phone"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">Llamanos</p>
                                    <p class="text-capitalize font-heading">{{$configs['PHONE']}}</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                        </div>
                        <!-- .col-md-4 end -->
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="row">
                                <form id="contact-form" action="assets/php/sendmail.php" method="post">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="contact-name" id="name" placeholder="Nombre" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mb-30" name="contact-email" id="email" placeholder="Email" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="contact-telephone" id="telephone" placeholder="Telefono" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="contact-subject" id="subject" placeholder="Asunto" required/>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control mb-30" name="contact-message" id="message" rows="2" placeholder="Mensaje" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Enviar Correo</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
                                        <!--Alert Message-->
                                        <div id="contact-result">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .col-md-8 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>

    <section class="google-maps pb-0 pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">
                    <div id="googleMap" style="width:100%;height:240px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="assets/js/jquery.gmap.min.js"></script>
    <script type="text/javascript">
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, Australia",
            zoom: 15,
            markers:[
                {
                    address: "Melbourne, Australia",
                    maptype:'ROADMAP',
                }
            ]
        });
    </script>
@endsection
