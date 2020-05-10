@extends('layouts.html')

@section('content')
    @include('layouts.header')
    @include( 'layouts.title', [ 'title' => $seo['title'] ] )
    
    <section class="shop pb-100">
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
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
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
                                <li>
                                    <a href="{{ route('shop-category', ['url' => $category['url']]) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                
                </div>
                <!-- .col-md-3 end -->
                <div class="col-xs-12 col-sm-12 col-md-9 shop-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="product-num pull-left pull-none-xs">
                                <h3>Pagina {{ $products->currentPage() }}:  {{ $products->count() }} de
                                    <span class="color-theme">{{ $products->total() }}</span>
                                    productos</h3>
                            </div>
                           
                            
                            <!-- .product-num end -->
                            @if (count($products) > 0)
                                <div class="product-options pull-right text-right pull-none-xs">
                                    <form id="orderBy" method="GET">
                                        <select id="orderBySelect" name="orderBy">
                                            <option selected="" value="">Ordenar por:</option>
                                            <option value="created_at:ASC" @if (request()->get('orderBy') === 'created_at:ASC') selected @endif>Los mas nuevos</option>
                                            <option value="created_at:DESC" @if (request()->get('orderBy') === 'created_at:DESC') selected @endif>Ultimos ingresados</option>
                                            <option value="name:ASC" @if (request()->get('orderBy') === 'name:ASC') selected @endif>Nombre de la A a Z</option>
                                            <option value="name:DESC" @if (request()->get('orderBy') === 'name:DESC') selected @endif>Nombre de la Z a A</option>
                                        </select>
                                    </form>
                                </div>
                            @endif
                            <!-- .product-options end -->
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
    });
</script>   
@endsection