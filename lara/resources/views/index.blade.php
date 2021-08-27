@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col col-9">
            <div class="">Products</div>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th></th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->weight }} Kg</td>
                        <td>
                            <a href=""
                               data-product-id="{{ $product->id }}"
                               class="btn btn-success btn-sm add-to-cart">Buy</a>
                            <a href="/products/{{ $product->id }}/add-images"
                               class="btn btn-primary btn-sm">Add images</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div>
        <div class="col col-3">
            <div class="">Cart</div>
            <table id="products-cart" class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @foreach($cart as $cartItem)
                    <tr data-id="{{ $cartItem->id }}">
                        <td>{{ $cartItem->product_id }}</td>
                        <td>{{ $cartItem->product->title }}</td>
                        <td class="quantity">
                            {{ $cartItem->quantity }}
                        </td>
                        <td class="price">
                            ${{ $cartItem->quantity * $cartItem->product->price }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {!! $cart->links() !!}
            </div>
        </div>
    </div>
@stop
