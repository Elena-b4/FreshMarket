@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">
        <div class="row">
            <!-- Sidebar -->
            <div id="left-column" class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">

                <!-- Block - Filter -->
                <form action="{{ route('products.products') }}" method="get">
                    <div class="block product-filter">
                        <h3 class="block-title">Catalog</h3>
                        <!-- Categories - Filter -->
                        <div class="block-content">
                            <div class="filter-item">
                                <h3 class="filter-title">Categories</h3>
                                <div>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <label class="check">
														<span class="custom-checkbox">
															<input type="checkbox" name="category_id[]" id="category_id"
                                                                   @if( is_array(request('category_id')) && in_array($category->id, request('category_id')) ) checked="checked"
                                                                   @endif value="{{ $category->id }}">
															<span class="checkmark"></span>
														</span>
                                                    <a>{{ $category->title }} <span class="quantity">({{ $category->products->count() }})</span></a>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Manufacture - Filter -->

                            <div class="filter-item">
                                <h3 class="filter-title">Manufacture</h3>
                                <div class="filter-content">
                                    <ul>
                                        @foreach($manufactures as $manufacture)
                                            <li>
                                                <label class="check">
														<span class="custom-checkbox">
															<input type="checkbox" name="manufacture_id[]"
                                                                   id="manufacture_id"
                                                                   @if( is_array(request('manufacture_id')) && in_array($manufacture->id, request('manufacture_id')) ) checked="checked"
                                                                   @endif value="{{ $manufacture->id }}">
															<span class="checkmark"></span>
														</span>
                                                    <a>{{ $manufacture->title }} <span class="quantity">({{ $manufacture->products->count() }})</span></a>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- In stock - Filter -->
                            <div class="filter-item">
                                <h3 class="filter-title">Availability</h3>
                                <div class="filter-content">
                                    <label class="check">
														<span class="custom-checkbox">
															 <input type="checkbox"
                                                                    name="in_stock"
                                                                    id="in_stock"
                                                                    @if(request('in_stock') == true) checked="checked"
                                                                    @endif value="1">
															<span class="checkmark"></span>
														</span>
                                        <a>In stock </a>
                                    </label>
                                </div>
                            </div>


                            <!-- Price - Filter -->

                            <div class="filter-item">
                                <h3 class="filter-title">Sort</h3>
                                <div class="filter-content">
                                    <select class="form-control input-sm" name="sale_price">
                                        <option value="">Sort By price</option>
                                        <option
                                            @if(request('sale_price') == "ASC") selected="selected"
                                            @endif value="ASC">Price: Lowest first
                                        </option>
                                        <option
                                            @if(request('sale_price') == "DESC") selected="selected"
                                            @endif
                                            value="DESC">Price: Highest first
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-item">
                                <div class="filter-content">
                                    <select class="form-control input-sm" name="name">
                                        <option value="">Sort By name</option>
                                        <option name="name"
                                                @if(request('name') == "ASC") selected="selected"
                                                @endif value="ASC">Product name: A to Z
                                        </option>
                                        <option name="name"
                                                @if(request('name') == "DESC") selected="selected"
                                                @endif value="DESC">Product name: Z to A
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-2">
                                <input type="submit" value="filter" class="btn btn-outline-dark">
                                <a href="{{ route('products.products') }}" class="btn btn-outline-info">Cleanse</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Page Content -->
            <div id="center-column" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-category-page">
                    <!-- Nav Bar -->
                    <div class="products-bar">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#products-grid" data-toggle="tab"
                                                          aria-expanded="true"><i
                                                class="fa fa-th-large"></i></a></li>
                                    <li class=""><a href="#products-list" data-toggle="tab" aria-expanded="false"><i
                                                class="fa fa-bars"></i></a></li>
                                </ul>
                                <!-- Count products -->
                                <div class="total-products">There are {{ $products->count() }} products</div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- Products Grid -->
                        <div class="tab-pane active" id="products-grid">
                            <div class="products-block">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        @if(strpos(asset($product->main_image_path), 'images') !== false)
                                                            <img class="img-responsive"
                                                                 src="{{ str_replace('images/storage', 'storage', asset($product->main_image_path)) }}"
                                                                 alt="Product Image">
                                                        @else
                                                            <img class="img-responsive"
                                                                 src="{{ asset($product->main_image_path) }}"
                                                                 alt="Product Image">
                                                        @endif
                                                    </a>
                                                </div>

                                                <div class="product-title">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <h2>{{ $product->name }}</h2>
                                                    </a>
                                                </div>


                                                <div class="product-price">
                                                    <span class="sale-price">${{ $product->sale_price }}</span>
                                                    <span class="base-price">${{ $product->base_price }}</span>
                                                </div>

                                                <div class="product-buttons">
                                                    @if($product->in_stock == true)
                                                        <a class="add-to-cart"
                                                           href="{{ route('products.add', $product->id) }}">
                                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                    @endif
                                                    <a class="add-wishlist"
                                                       href="{{ route('wishlists.add', $product->id) }}">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="quickview"
                                                       href="{{ route('products.show', $product->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Products List -->
                        <div class="tab-pane" id="products-list">
                            <div class="products-block layout-5">
                                @foreach($products as $product)
                                    <div class="product-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        @if(strpos(asset($product->main_image_path), 'images') !== false)
                                                            <img class="img-responsive"
                                                                 src="{{ str_replace('images/storage', 'storage', asset($product->main_image_path)) }}"
                                                                 alt="Product Image">
                                                        @else
                                                            <img class="img-responsive"
                                                                 src="{{ asset($product->main_image_path) }}"
                                                                 alt="Product Image">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                <div class="product-detail">
                                                    <div class="product-title">
                                                        <a href="{{ route('products.show', $product->id) }}">
                                                            <h2>{{ $product->name }}</h2>
                                                        </a>
                                                    </div>
                                                    <div class="product-short-description">
                                                        {{ $product->description }}
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="sale-price">${{ $product->sale_price }}</span>
                                                        <span class="base-price">${{ $product->base_price }}</span>
                                                    </div>
                                                    @if($product->in_stock == true)
                                                        <div class="product-stock">
                                                            <i class="fa fa-check-square-o" aria-hidden="true"></i>In
                                                            stock
                                                        </div>
                                                    @else
                                                        <div class="product-stock">
                                                            <i class="fa fa-square-o" aria-hidden="true"></i>In stock
                                                        </div>
                                                    @endif
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

                                                    <div class="product-buttons">
                                                        @if($product->in_stock == true)
                                                            <a class="add-to-cart"
                                                               href="{{ route('products.add', $product->id) }}">
                                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                                <span>Add To Cart</span>
                                                            </a>
                                                        @else
                                                        @endif
                                                        <a class="add-wishlist"
                                                           href="{{ route('wishlists.add', $product->id) }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                        <a class="quickview"
                                                           href="{{ route('products.show', $product->id) }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- Pagination Bar -->
                    <div class="pagination-bar">
                        <div class="row">
                            <div class="col-lg-12">
                                {{ $products->withQueryString()->links('vendor/pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
