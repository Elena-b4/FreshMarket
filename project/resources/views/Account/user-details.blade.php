@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">
        <div class="row" style="margin-bottom: 110px; margin-top: 10px; margin-right: 10px;">
            <div class="block-cards">

                <div class="row">
                    <div class="checkout-center col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card" style="width: 45rem;">
                            <form action="{{ route('user.updateUserDetails', $user->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div style="margin-bottom: 10px;">
                                    @if($user->avatar_path === 'img/avatar.png')
                                        <label>Add your avatar</label>
                                    @else
                                        <label>Update your avatar</label>
                                    @endif
                                    <input type="file" id="exampleInputFile" name="avatar_path">
                                    @error('avatar_path')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <img style="width: 45rem;" src="{{ asset($user->avatar_path) }}" alt="avatar">
                                <div class="card-body">
                                    <h2 class="card-title text-center">{{ $user->name }}</h2>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Email: {{ $user->email }}</li>
                                    <li class="list-group-item d-flex">
                                        <p style="margin-right: 5px;">Address: </p>
                                        <textarea
                                            class="form-control" name="address" placeholder="Address"
                                        >{{ $user->address }}</textarea>
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>

                                    <li class="list-group-item">Orders: {{ $user->orders->count() }}</li>
                                </ul>
                                <button type="submit" class="btn btn-primary">
                                    Save changes
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="checkout-center col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Products</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->orders as $order)
                                <tr>
                                    <th class="text-center" scope="row">{{ $order->id }}</th>
                                    <td class="text-center">@foreach($order->products as $product){{ $product->name }}
                                        <br>@endforeach</td>
                                    <td class="text-center">@foreach($order->quantities as $quantity){{ $quantity->value }}
                                        <br>@endforeach</td>
                                    <td class="text-center">{{ $order->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('products.index') }}" class="btn btn-primary">
                                Continue shopping
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection
