@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">
        <div class="row padding-15">
            <div id="content" class="site-content">
                <!-- Breadcrumb -->
                <div>
                    <div class="container">
                        <h2 class="title">WishLists</h2>

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
                                </tr>
                                </thead>

                                <tbody>
                                <?php $total = 0 ?>
                                @if(session('/add-to-wishlists'))
                                    @foreach(session('/add-to-wishlists') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                        <tr>
                                            <td class="product-remove width-20 text-center">
                                                <form action="{{ route('wishlists.remove', $id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa fa-times"></i></button>

                                                </form>
                                            </td>
                                            <td class="width-20 justify-content-center">
                                                <a href="//">
                                                    <img width="80" alt="Product Image" class="img-responsive"
                                                         src="{{ asset($details['photo']) }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="//" class="product-name">{{ $details['name'] }}</a>
                                            </td>
                                            <td class="text-center">
                                                ${{ $details['price'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="checkout-btn">
                            <a href="{{ route('products.products') }}" class="btn btn-primary pull-right"
                               title="Return to products">
                                <span>Return to products</span>
                                <i class="fa fa-angle-right ml-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
