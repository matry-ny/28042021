@extends('layouts.main')

@section('content')
    {{ Form::open([
        'url' => route('products.upload-images', ['productId' => $product->id]),
        'method' => 'post',
        'enctype' => 'multipart/form-data'
    ]) }}

    {{Form::file('images[]', ['class' => 'form-control', 'multiple' => 'multiple'])}}

    {{ Form::submit('Upload', ['class' => 'btn btn-primary mt-3']) }}

    {{ Form::close() }}
@stop
