@php
/** @var \App\Models\Product $model */
/** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

<div class="panel panel-default">
    <div class="panel-heading">Create new Product</div>

    <div class="panel-body">
        {!! Form::model($model, ['url' => route('product.store'), 'method' => 'post', 'id' => 'create-form']) !!}

        @include('product._form')

        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
</div>
