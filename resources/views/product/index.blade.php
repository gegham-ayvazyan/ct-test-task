@php
    /** @var \App\Models\Product[]|\Illuminate\Support\Collection $models */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>All Products</span>
                        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm pull-right create-product">Add New</a>
                    </div>

                    <div class="panel-body">
                        <div id="form-wrapper" style="display: none;"></div>
                        <table class="table table-condensed table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @each('product._item', $models, 'model', 'product._empty')
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete-product', function(evt) {
                evt.preventDefault();
                if (confirm('Are you sure you want to delete this item?')) {
                    var self = this;
                    $.ajax({
                        method: 'post',
                        url: $(self).attr('href'),
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'delete'
                        },
                        success: function() {
                            $(self).parents('tr').remove();
                            $('#form-wrapper').html('');
                        },
                    })
                }
            });
            $(document).on('click', '.create-product, .edit-product', function(evt) {
                evt.preventDefault();
                var self = this;
                $.ajax({
                    method: 'get',
                    url: $(self).attr('href'),
                    success: function(data) {
                        $('#form-wrapper').html(data).slideDown();
                    },
                })
            });
            $(document).on('submit', '#create-form', function(evt) {

            });
            $(document).on('submit', '#edit-form', function(evt) {

            });
        });
    </script>
@endpush