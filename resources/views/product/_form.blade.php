<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error': '' }}">
    {!! Form::label('quantity', 'Quantity in Stock') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
    @if ($errors->has('quantity'))
        <span class="help-block">{{ $errors->first('quantity') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error': '' }}">
    {!! Form::label('price', 'Price per Item') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="help-block">{{ $errors->first('price') }}</span>
    @endif
</div>