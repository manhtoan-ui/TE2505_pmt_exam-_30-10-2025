@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Chi tiết Item Sale</h2>

    <div class="card p-3">
        <h4>{{ $item->name }}</h4>
        <p><strong>Giá:</strong> {{ number_format($item->price) }} đ</p>
        <p><strong>Mô tả:</strong> {{ $item->description }}</p>
    </div>

    <a href="{{ route('itemsale.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
