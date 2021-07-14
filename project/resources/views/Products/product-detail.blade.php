@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">
            <div class="product-detail">
                <div class="products-block layout-5">
                    <div class="product-item">

                        <div class="row">

                            <div class="product-left col-md-5 col-sm-5 col-xs-12">
                                <div class="product-image vertical">
                                    <div class="main-image">
                                        @if(strpos(asset($product->main_image_path), 'images') !== false)
                                            <img class="img-responsive"
                                                 src="{{ str_replace('images/storage', 'storage', asset($product->main_image_path)) }}"
                                                 alt="Product Image">
                                        @else
                                            <img class="img-responsive"
                                                 src="{{ asset($product->main_image_path) }}"
                                                 alt="Product Image">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="product-right col-md-7 col-sm-7 col-xs-12">
                                <div class="product-info">
                                    <div class="product-title">
                                        {{ $product->name }}
                                    </div>
                                    @if($product->in_stock == true)
                                        <div class="product-stock" style="margin-right: 60px;">
                                            <span>Availability :</span>
                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>In
                                            stock
                                        </div>
                                    @else
                                        <div class="product-stock" style="margin-right: 60px;">
                                            <span>Availability :</span>
                                            <i class="fa fa-square-o" aria-hidden="true"></i>In
                                            stock
                                        </div>
                                    @endif
                                    <div class="product-price">
                                        <span class="sale-price">${{ $product->sale_price }}</span>
                                        <span class="base-price">${{ $product->base_price }}</span>

                                    </div>

                                    <div class="product-short-description">
                                        {{ $product->description }}
                                    </div>


                                    <div class="product-add-to-cart border-bottom">

                                        <div class="product-buttons">
                                            @if($product->in_stock == true)
                                                <a class="add-to-cart" href="{{ route('products.add', $product->id) }}">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    <span>Add To Cart</span>
                                                </a>
                                            @else
                                            @endif
                                            <a class="add-wishlist" href="{{ route('wishlists.add', $product->id) }}">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="item">
                                            <span class="control-label">Category :</span>
                                            <a href="#"
                                               title="{{ $product->category->title }}">{{ $product->category->title }}</a>
                                        </div>
                                        <div class="item">
                                            <span class="control-label">Manufacture :</span>
                                            <a href="#"
                                               title="{{ $product->manufacture->title }}">{{ $product->manufacture->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
