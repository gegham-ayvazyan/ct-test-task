@php
    /** @var \App\Models\Product $model */
@endphp

<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name }}</td>
    <td>{{ $model->quantity }}</td>
    <td>{{ $model->price }}</td>
</tr>