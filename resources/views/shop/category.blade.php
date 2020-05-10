@extends('layouts.html')

@section('content')
    @include('layouts.header')
        <section class="bg-overlay bg-overlay-gradient pb-0">
            <div class="bg-section" >
                <img src="/assets/images/page-title/2.jpg" alt="Background"/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="page-title title-1 text-center">
                            <div class="title-bg">
                                <h2>{{$seo['name']}}</h2>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/">Inicio</a>
                                </li>
                                <li>
                                    <a href="/tienda/">Tienda</a>
                                </li>
                                <li class="active">{{$seo['name']}}</li>
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
        <section class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar sidebar-full">
                        <!-- .sidebar end -->
                        <!-- Search
                        ============================================= -->
                        <div class="widget widget-search">
                            <div class="widget-content">
                                <form method="GET" class="form-search">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Buscar...">
                                        <span class="input-group-btn">
                                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form>
                            </div>
                        </div>
                        
                        <!-- Categories
                        ============================================= -->
                        <div class="widget widget-categories">
                            <div class="widget-title">
                                <h3>Categorias</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    @foreach ($categories as $category)
                                    @if ($category['url'] !== $seo['url'])
                                        <li>
                                            <a href="{{ route('shop-category', ['url' => $category['url']]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                      
                    </div>
                    <!-- .col-md-3 end -->                    
                    <div class="col-xs-12 col-sm-12 col-md-9 shop-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <form id="orderBy" method="GET">
                                    <div class="shop-options">
                                        <div class="product-options2 pull-left pull-none-xs">
                                            <ul class="list-inline">
                                                <li>
                                                    <div class="product-sort mb-15-xs">
                                                        <span>Ordenar por:</span>
                                                            <select id="orderBySelect" name="orderBy">
                                                                <option selected="" value="">Ordenar por:</option>
                                                                <option value="created_at:ASC" @if (request()->get('orderBy') === 'created_at:ASC') selected @endif>Los mas nuevos</option>
                                                                <option value="created_at:DESC" @if (request()->get('orderBy') === 'created_at:DESC') selected @endif>Ultimos ingresados</option>
                                                                <option value="name:ASC" @if (request()->get('orderBy') === 'name:ASC') selected @endif>Nombre de la A a Z</option>
                                                                <option value="name:DESC" @if (request()->get('orderBy') === 'name:DESC') selected @endif>Nombre de la Z a A</option>
                                                            </select>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="product-sort">
                                                        <span>Mostrar:</span>
                                                        <select id="porpagina" name="pagina">
                                                            <option value="10" @if (request()->get('pagina') === '10') selected @endif>
                                                                10 productos
                                                            </option>
                                                            <option value="25"@if (request()->get('pagina') === '25') selected @endif>
                                                                25 productos
                                                            </option>
                                                            <option value="50" @if (request()->get('pagina') === '50') selected @endif>
                                                                50 productos
                                                            </option>
                                                            <option value="100" @if (request()->get('pagina') === '100') selected @endif>
                                                                100 productos
                                                            </option>
                                                        </select>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .product-num end -->
                                    </div>
                                </form>
                                <!-- .shop-options end -->
                            </div>
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row end -->
                        <div class="row">
                            <!-- product #1 -->
                            @forelse ($products as $product)
                                @include('layouts.productItem')
                            @empty
                                <div class="col-xs-12">
                                    <div class="alert">
                                        No hay productos.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <!-- .row end -->
                        @if (count($products) >= 12 || request()->get('page'))
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 pager mb-30-xs mb-30-sm">
                                    <div class="page-prev">
                                        <a href="{{ $products->url(($products->currentPage() - 1)) }}"><i class="fa fa-angle-left"></i></a>
                                    </div>
                                    <div class="page-next">
                                        <a href="{{ $products->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- .row end -->
                    </div>
                    <!-- .shop-content end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
    @include('layouts.footer')
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#orderBySelect').change(function(){
            $('#orderBy').submit();
        });
        $('#porpagina').change(function(){
            $('#orderBy').submit();
        });
    });
</script>   
@endsection