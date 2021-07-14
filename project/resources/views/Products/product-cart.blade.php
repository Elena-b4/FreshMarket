@extends('layouts.main')
@section('content')

    <div class="container-fluid padding-0">
            <div id="content" class="site-content">
                <!-- Breadcrumb -->
                <div>
                    <div class="container">
                        <h2 class="title">Shopping Cart</h2>

                        <ul class="breadcrumb">
                            <li><a href="{{ route('products.index') }}" title="Home">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="page-cart" style="margin-bottom: 100px;">
                        <div class="table-responsive">
                            <table class="cart-summary table table-hover">
                                <thead>
                                <tr>
                                    <th class="width-20 text-center">&nbsp;</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th class="width-100 text-center">Unit price</th>
                                    <th class="width-100 text-center">Qty</th>
                                    <th class="width-100 text-center">Total</th>
                                    <th class="width-100 text-center"></th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $total = 0 ?>
                                @if(session('/product-cart'))
                                    @foreach(session('/product-cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>

                                        <tr>
                                            <td class="product-remove width-20 text-center">
                                                <form action="{{ route('products.remove', $id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa fa-times"></i></button>

                                                </form>

                                            </td>
                                            <td class="width-20 justify-content-center">
                                                <a href="//">
                                                    <img width="80" alt="Product Image" class="img-responsive"
                                                         src="{{ $details['photo'] }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="//"
                                                   class="product-name">{{ $details['name'] }}</a>
                                            </td>
                                            <td class="text-center">
                                                ${{ $details['price'] }}
                                            </td>
                                            <form action="{{ route('products.update', $id) }}" method="post">
                                                @csrf

                                                <td class="col-xs-1">

                                                    <input name="quantity" type="number" min="0" size="3"
                                                           value="{{ $details['quantity'] }}"
                                                           class="col-xs-8"/>
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    ${{ $details['price'] * $details['quantity'] }}
                                                </td>
                                                <td class="col-xs-1">
                                                        <button type="submit" class="btn btn-info btn-sm update-cart">
                                                            <i class="fa fa-refresh"></i>
                                                        </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>

                                <tfoot>
                                <tr class="cart-total">
                                    <td rowspan="3" colspan="3"></td>
                                    <td colspan="2" class="text-right">Total</td>
                                    <td colspan="1" class="text-center">${{ $total }}</td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if($total !== 0)
                        <div class="checkout-btn">
                            <a href="{{ route('products.checkout') }}" class="btn btn-primary pull-right"
                               title="Proceed to checkout">
                                <span>Proceed to checkout</span>
                                <i class="fa fa-angle-right ml-xs"></i>
                            </a>
                        </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>

    </div>
@endsection

