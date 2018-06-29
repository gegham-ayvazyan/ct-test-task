@php
    /** @var \App\Models\Product $model */
@endphp

<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name }}</td>
    <td>{{ $model->quantity }}</td>
    <td>{{ $model->price }}</td>
    <td>
        <a href="{{ route('product.edit', $model->id) }}" class="edit-product">
            <i class="fa fa-edit"></i>
        </a>
        <a href="{{ route('product.destroy', $model->id) }}" class="delete-product">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
