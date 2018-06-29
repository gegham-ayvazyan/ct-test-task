@php
    /** @var \App\Models\Product $model */
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new Product</div>

                    <div class="panel-body">
                        {!! Form::model($model, ['url' => route('product.store'), 'method' => 'post']) !!}

                        @include('product._form')

                        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
