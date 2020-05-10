<div class="col-xs-12 col-sm-4 col-md-4 product-item clearfix">
  <div class="product-img">
    <a title="{{ $product['name'] }}" href="{{ route('shop-product', [ 'url' => $product['url' ] ]) }}">
      <img src="{{ $product['images'][0]['image'] }}" alt="{{ $product['name'] }}">
    </a>
  </div>

  <!-- .product-img end -->
  <div class="product-bio">
    <h4>
      <a title="{{ $product['name'] }}"
        href="{{ route('shop-product', [ 'url' => $product['url' ] ]) }}">{{ $product['name'] }}</a>
    </h4>
  </div>
  <!-- .product-bio end -->
</div>