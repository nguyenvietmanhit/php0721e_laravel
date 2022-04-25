{{--resources/views/layouts/main.blade.php--}}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>@yield('page_title')</title>
{{--    Tạo cấu trúc thư mục sau
    public / css / style.css
           /js / script.js
    --}}
{{--    Laravel sử dụng template engine là Blade để hỗ trợ code PHP gọn và
    dễ đọc hơn --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <body>
        <div class="header">
            HEADER
        </div>
        <div class="main-content">
{{--       Hiển thị lỗi validate tại đây, sử dụng biến errors mà Laravel cung
     cấp sẵn--}}
            @foreach ($errors->all() AS $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach()

            @if(session()->has('success'))
                <p style="color: green">{{ session()->get('success') }}</p>
            @endif()
            @if(session()->has('error'))
                <p style="color: red">{{ session()->get('error') }}</p>
            @endif()

            @yield('content')
        </div>
        <div class="footer">
            FOOTER
        </div>
    </body>
</html>
