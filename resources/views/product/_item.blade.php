@php
    /** @var \App\Models\Product $model */
@endphp

<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name }}</td>
    <td>{{ $model->quantity }}</td>
    <td>{{ $model->price }}</td>
    <td>
        <a href="{{ route('product.edit', $model->id) }}">
            <i class="fa fa-edit"></i>
        </a>
        <a href="{{ route('product.destroy', $model->id) }}" class="delete-product">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>

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
                        },
                    })
                }
            });
        });
    </script>
@endpush