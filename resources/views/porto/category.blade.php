@extends('porto.layout.master')

@section('title',$category->name)

@section('content')


<main class="main">
    <div class="category-banner-container bg-gray">
        @if($category->banner)
        <div class="category-banner banner text-uppercase"
            style="background: no-repeat 60%/cover url('{{ asset('storage/' .  $category->banner->image) }}');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                        <h3>Electronic<br>Deals</h3>
                        <a href="category.html" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                            </h4>
                            <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b
                                    class="text-dark">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Men</a></li>
                <li class="breadcrumb-item active" aria-current="page">Accessories</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 main-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>
                            <div class="select-custom">
                                <select id="sort-by" name="orderby" class="form-control">
                                    <option value="date" {{ $sort === 'date' ? 'selected' : '' }} >Sort by newness</option>
                                    <option value="low_to_high" {{ $sort === 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                    <option value="high_to_low" {{ $sort === 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="category-list.html" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>



                <div class="row"  id="productCard">
                    @foreach ($products as $product)
                    <div class="col-6 col-sm-4">
                        <div class="product-default">
                            <figure>
                                <a href="/product/{{ $product->id }}">
                                    <img src='{{ asset("storage/$product->image") }}' style=" min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover" width="280"
                                        height="280" alt="product">

                                    @php
                                    $gallery = $product->gallery;
                                    @endphp

                                    <img src='{{ asset("storage/$gallery[0]") }}' style="min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover" width="280"
                                        height="280" alt="product">
                                </a>

                                @if ($product->discount != 0)

                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-{{ $product->discount }}%</div>
                                </div>
                                @endif
                            </figure>

                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/category/{{ $product->category->id }}" class="product-category">{{ $product->category->name }}</a>
                                    </div>
                                </div>

                                <h3 class="product-title"> <a href="/product/{{ $product->id }}">{{ $product->name }}</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{ $product->stars / 5 * 100 }}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                @if ($product->discount)

                                <div class="price-box">
                                    @php
                                    $discount_price = number_format($product->price + ($product->price * $product->discount / 100));
                                    @endphp
                                    <del class="old-price">${{$discount_price}}</del>
                                    <span class="product-price">${{number_format($product->price,)}}</span>
                                </div>
                                @else
                                <div class="price-box">
                                    <span class="product-price">${{number_format($product->price,2)}}</span>
                                </div>
                                @endif
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/product/{{ $product->id }}" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- End .row -->

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    <ul class="pagination toolbox-item">
                        <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                aria-controls="widget-body-2">Categories</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    <li>
                                        <a href="#widget-category-1" data-toggle="collapse" role="button"
                                            aria-expanded="true" aria-controls="widget-category-1">
                                            Accessories<span class="products-count">(3)</span>
                                            <span class="toggle"></span>
                                        </a>
                                        <div class="collapse show" id="widget-category-1">
                                            <ul class="cat-sublist">
                                                <li>Caps<span class="products-count">(1)</span></li>
                                                <li>Watches<span class="products-count">(2)</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#widget-category-2" class="collapsed" data-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="widget-category-2">
                                            Dress<span class="products-count">(4)</span>
                                            <span class="toggle"></span>
                                        </a>
                                        <div class="collapse" id="widget-category-2">
                                            <ul class="cat-sublist">
                                                <li>Clothing<span class="products-count">(4)</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#widget-category-3" class="collapsed" data-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="widget-category-3">
                                            Electronics<span class="products-count">(2)</span>
                                            <span class="toggle"></span>
                                        </a>
                                        <div class="collapse" id="widget-category-3">
                                            <ul class="cat-sublist">
                                                <li>Headphone<span class="products-count">(1)</span></li>
                                                <li>Watch<span class="products-count">(1)</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#widget-category-4" class="collapsed" data-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="widget-category-4">
                                            Fashion<span class="products-count">(6)</span>
                                            <span class="toggle"></span>
                                        </a>
                                        <div class="collapse" id="widget-category-4">
                                            <ul class="cat-sublist">
                                                <li>Shoes<span class="products-count">(4)</span></li>
                                                <li>Bag<span class="products-count">(2)</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">Music<span class="products-count">(2)</span></a></li>
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                aria-controls="widget-body-3">Price</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                            <form action="{{route('PriceRange')}}"   method="post">
                                @csrf
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div>
                                        <input type="range" min="0" max="40000" step="10" value="400" name="range">
                                    </div>
 
                                    <div
                                        class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="filter-price-text">
                                            Price:
                                            <span id="filter-price-range"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    <!-- End .filter-price-action -->
                                </form>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->


                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">

                                    @foreach ($featured_products as $product )
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="/product/{{$product->id}}">
                                                <img src='{{ asset("storage/$product->image") }}'
                                                    width="84" height="84" style="max-height: 75px; max-width: 84px; min-width: 75px; object-fit: cover;" alt="product">

                                                @php
                                                $gallery = $product->gallery;
                                                @endphp
                                                <img src='{{ asset("storage/$gallery[0]") }}'
                                                    width="84" height="84" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="/product/{{$product->id}}">{{ $product->name }}</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:{{ $product->stars / 5 * 100 }}%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">${{number_format($product->price ,0)}}</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    @endforeach
                                </div>

                                <!-- End .featured-col -->
                            </div>
                            <!-- End .widget-featured-slider -->
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-block">
                    @foreach ($best_selling_product as $product )
                    <h3 class="widget-title">Best seeling</h3>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/product/{{$product->id}}">
                                    <img src='{{ asset("storage/$product->image") }}'
                                        width="84" height="84" style="max-height: 84px; max-width: 84px; min-width: 84px; object-fit: cover;" alt="product">

                                    @php
                                    $gallery = $product->gallery;
                                    @endphp
                                    <img src='{{ asset("storage/$gallery[0]") }}'
                                        width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{ $product->stars / 5 * 100 }}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">${{number_format($product->price ,0)}}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        @endforeach
                                            </div>
                    <!-- End .widget -->
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>



<script>
    document.getElementById('sort-by').addEventListener('change', function() {
        const sortBy = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('orderby', sortBy);

        fetch(url.toString())
            .then(response => response.json())
            .then(data => {
                document.getElementById('products-container').innerHTML = data.html;
            })
            .catch(error => console.error('Error:', error));
    });






    $('#sort-by').change(function() {
    var sortValue = $(this).val();
    $('#productCard').empty();

    // alert(sortValue);
   

    $.ajax({
    url: '/sort',
    method: 'POST',
    data: {
        
        _token: $('meta[name="csrf-token"]').attr('content'), 
        sort: sortValue

    },
    dataType: 'json',
    success: function(response) {
        var hostname = window.location.hostname;
var protocol = window.location.protocol;
var port = window.location.port;
        console.log(response.products);
        console.log(response.sortType);
        var html = '';
            $.each(response.products, function(key, product) {
                var discountPrice = product.discount ? (product.price + (product.price * product.discount / 100)).toFixed(2) : '';
                var price = product.price.toFixed(2);

                html += `
                    <div class="col-6 col-sm-4">
                        <div class="product-default">
                            <figure>
                                <a href="/product/${product.id}">
                                    <img src='http://127.0.0.1:8000/storage/${product.image}' style="min-height: 280px; min-width: 280px; max-height: 280px; max-width: 280px; object-fit: cover" width="280" height="280" alt="product">
                                    
                                    <img src='${product.gallery[0]}' style="min-height: 280px; min-width: 280px; max-height: 280px; max-width: 280px; object-fit: cover" width="280" height="280" alt="product">
                                </a>
                                ${product.discount ? `
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-${product.discount}%</div>
                                    </div>
                                ` : ''}
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/category/${product.category.id}" class="product-category">${product.category.name}</a>
                                    </div>
                                </div>
                                <h3 class="product-title"><a href="/product/${product.id}">${product.name}</a></h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:${(product.stars / 5) * 100}%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    ${product.discount ? `
                                        <del class="old-price">$${discountPrice}</del>
                                        <span class="product-price">$${price}</span>
                                    ` : `
                                        <span class="product-price">$${price}</span>
                                    `}
                                </div>
                                <div class="product-action">
                                    <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                    <a href="/product/${product.id}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            $('#productCard').html(html);
        },
    error: function(error) {
        console.error('An error occurred:', error);
    }
});

});




</script>


<!-- End .main -->
@endsection

@section('title',"Category Page")