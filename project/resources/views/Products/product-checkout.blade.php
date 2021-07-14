@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">



            <div id="content" class="site-content">
                <!-- Breadcrumb -->
                <div>
                    <div class="container">
                        <h2 class="title" style="padding-left: 10px;">Shopping Cart</h2>

                        <ul class="breadcrumb">
                            <li><a href="{{ route('products.index') }}" title="Home">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>


                <div class="container">
                    <div class="page-checkout" style="margin-bottom: 100px;">
                        <div class="row">
                            <div class="checkout-center col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            </div>
                            <div class="checkout-center col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                @guest()
                                    <div class="panel-body">
                                        <h3>Registration is required to order goods. <a
                                                href="{{ route('register.index') }}" class="btn btn-primary"
                                                style="color: white;">REGISTER</a></h3>
                                        <h3>If you are already registered, please login to your account. <a
                                                href="{{ route('login.login') }}" class="btn btn-primary"
                                                style="color: white;">LOGIN</a></h3>
                                    </div>
                                @endguest
                                <div class="panel-body">
                                    <form action="{{ route('order.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <table class="cart-summary table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Image</th>
                                                <th class="text-center">Name</th>
                                                <th class="width-100 text-center">Unit price</th>
                                                <th class="width-100 text-center">Qty</th>
                                                <th class="width-100 text-center">Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $total = 0 ?>
                                            @if(session('/product-cart'))
                                                @foreach(session('/product-cart') as $id => $details)
                                                    <?php $total += $details['price'] * $details['quantity'] ?>

                                                    <input type="hidden" value="{{ $id }}" name="products[]">
                                                    <input type="hidden" value="{{ $details['quantity'] }}" name="quantity[]">
                                                    <input type="hidden" value="{{ $total }}" name="total">
                                                    <tr>
                                                        <td>
                                                            <img width="80" alt="Product Image"
                                                                 class="img-responsive"
                                                                 src="{{ $details['photo'] }}">
                                                        </td>

                                                        <td class="text-center">
                                                            {{ $details['name'] }}

                                                        </td>
                                                        <td class="text-center">
                                                            ${{ $details['price'] }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $details['quantity'] }}
                                                        </td>
                                                        <td class="text-center">
                                                            ${{ $details['price'] * $details['quantity'] }}
                                                        </td>
                                                    </tr>



                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>

                                        <h4 class="heading-primary">Cart Total</h4>
                                        <table class="table cart-total">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    Cart Subtotal
                                                </th>
                                                <td class="total">
                                                    ${{ $total }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Shipping
                                                </th>
                                                <td>
                                                    Free Shipping
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <strong>Order Total</strong>
                                                </th>
                                                <td class="total">
                                                    ${{ $total }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        @if(Auth::check())
                                            <input type="submit" value="Place order"
                                                   class="btn pull-right">
                                        @endif
                                    </form>

                                </div>


                            </div>
                            <div class="checkout-center col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
