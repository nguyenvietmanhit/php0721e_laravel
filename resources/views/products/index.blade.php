{{--resources/views/products/index.blade.php--}}
@extends('layouts.main')
@section('page_title', 'Trang liệt kê sp')
@section('content')
    <h1>Liệt kê sản phẩm</h1>
    <a href="{{ url('them-moi-sp') }}">Thêm mới sp</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Avatar</th>
            <th>Created_at</th>
        </tr>
        @foreach ($products AS $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>{{ number_format($product['price']) }} đ</td>
                <td>
                    @if(!empty($product['avatar']))
                        <img src="{{ public_path('uploads/' . $product['avatar']) }}"
                             height="50px" />
                    @endif
                </td>
                <td>{{ date('d-m-Y H:i:s', strtotime($product['created_at'])) }}</td>
                <td>
                    <a href="#">Sửa</a>
                    <a href="#" onclick="return confirm('Xóa?')">Xóa</a>
                </td>
            </tr>
        @endforeach()
    </table>
    {{ $products->links() }}
@endsection()
