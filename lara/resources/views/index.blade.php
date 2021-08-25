@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col col-8">
            <div class="">Products</div>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->weight }} Kg</td>
                    </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
        </div>
        <div class="col col-4">
            <div class="">Cart</div>
        </div>
    </div>
@stop
