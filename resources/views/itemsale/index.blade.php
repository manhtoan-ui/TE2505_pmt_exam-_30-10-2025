@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Danh sách sản phẩm đang giảm giá</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expired Date</th>
                <th>Note</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->expired_date }}</td>
                <td>{{ $item->note }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('items.create') }}" class="btn btn-primary mt-3">Thêm sản phẩm mới</a>
</div>
@endsection