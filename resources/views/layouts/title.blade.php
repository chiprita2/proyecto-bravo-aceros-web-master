<section class="bg-overlay bg-overlay-gradient pb-0">
  <div class="bg-section" >
      <img src="/images/page-title/8.jpg" alt="Background"/>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="page-title title-1 text-center">
                  <div class="title-bg">
                      <h2>{{ $title ?? '' }}</h2>
                  </div>
                  <ol class="breadcrumb">
                      <li>
                          <a href="/" title="Inicio">Inicio</a>
                      </li>
                      <li class="active">
                        {{ $title ?? '' }}
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
</section>