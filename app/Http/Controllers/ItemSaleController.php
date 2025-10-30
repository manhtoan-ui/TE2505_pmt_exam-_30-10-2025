<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemSale;

class ItemSaleController extends Controller
{

     public function update(Request $request, $id)
    {
        $request->validate([
            'item_code' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'item_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'quantity' => 'required|numeric',
            'expired_date' => 'required|date',
        ]);

        $item = ItemSale::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Cập nhật thành công!');
    }

    // Hiển thị danh sách Item Sale
    public function index()
    {
        return view('itemsale.index');
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('itemsale.create');
    }

    // Xử lý khi nhấn "Lưu" form thêm mới
 
        public function store(Request $request)
{
    $request->validate([
        'item_code' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'item_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'quantity' => 'required|numeric',
        'expired_date' => 'required|date',
    ]);

    ItemSale::create($request->all());

    return redirect()->route('items.index')->with('success', 'Thêm sản phẩm thành công!');
}

        // xử lý lưu vào database sau này


    // Hiển thị form sửa
    public function edit($id)
{
    $item = ItemSale::findOrFail($id);
    return view('itemsale.edit', compact('item'));
}

    // Xử lý khi cập nhật

    // Xem chi tiết
    public function show($id)
    {
        return view('itemsale.show');
    }

    // Xóa
    public function destroy($id)
    {
        // xử lý xóa
    }
}
