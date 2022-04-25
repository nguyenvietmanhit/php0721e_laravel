{{--resources/views/products/create.blade.php--}}
{{--Nhúng layout vào view--}}
@extends('layouts.main')
{{--Truyền giá trị thật cho yield trong layout--}}
@section('page_title', 'Form thêm mới sp')
@section('content')
    <form action="{{ url('insert-data') }}" method="post" enctype="multipart/form-data">
{{--    Token bắt buộc phải có với mọi form của LAravel để tránh lỗi bảo
    mật CSRF Token --}}
        @csrf
        Nhập tên sp:
        <input type="text" name="name" value="" />
        <br />
        Nhập giá sp:
        <input type="text" name="price" value="" />
        <br />
        Ảnh sp:
        <input type="file" name="avatar" />
        <br />
        <input type="submit" name="submit" value="Lưu sp" />
    </form>
@endsection()
{{--    Nghỉ giải lao 20h05--}}
