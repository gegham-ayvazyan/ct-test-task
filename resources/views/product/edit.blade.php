@php
    /** @var \App\Models\Product $model */
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

<div class="panel panel-default">
    <div class="panel-heading">Create new Product</div>

    <div class="panel-body">
        {!! Form::model($model, ['url' => route('product.update', $model->id), 'method' => 'put', 'id' => 'edit-form']) !!}

        @include('product._form')

        {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}
    </div>
</div>
