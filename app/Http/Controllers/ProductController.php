<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create() {
//        echo 'Form thêm mới';
        //Tạo cấu trúc thư mục view như sau:
        /**
         * resources / views /
         *                   /products/
         *                            /create.blade.php
         *                            /index.blade.php
         *                            /update.blade.php
         *                   /layouts/
         *                           /main.blade.php
         */

        return view('products.create');
    }

    // Laravel hỗ trợ cơ chế inject các class vào mọi phương thức của controller
    public function insert(Request $request) {
//        dump($request->all());
        // Validate form:
        $rules = [
            'name' => ['required', 'min:3'],
            'price' => ['required', 'numeric'],
            'avatar' => ['image']
        ];
        $messages = [
            'name.required' => 'Tên sp phải nhập',
            'name.min' => 'TÊn sp ít nhất 3 ký tự',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giá phải là số',
            'avatar.image' => 'File upload phải là ảnh'
        ];
        $request->validate($rules, $messages);
        // Xử lý upload file
        $avatar = '';
        if (!empty($request->avatar)) {
            // Tạo file có tên duy nhất
            $avatar = time() . '-' . $request->avatar->getClientOriginalName();
            // Tạo thư mục sẽ upload
            $dir_upload = public_path('uploads'); //public/uploads
            // Upload file
            $request->avatar->move($dir_upload, $avatar);
        }
        // Xử lý thêm dữ liệu vào db, thêm tự động với điều kiện name của input trùng
        //với tên trường trong bảng products
        $requests = $request->all(); //_token
        // Gán lại các trường mà định dạng chưa đúng
        $requests['avatar'] = $avatar;
        dump($requests);
        // Gọi Model để insert vào CSDL
        // Tạo model bằng artisan: php artisan make:model Product
        $product = Product::create($requests);
        if (!empty($product)) {
            session()->flash('success', 'Thêm sp thành công');
        } else {
            session()->flash('error', 'Thêm sp thất bại');
        }
        return redirect('ds-sp');

    }

    public function index() {
//        echo 'list sp';
        // Lấy sp theo cơ chế phân trang:
        //Laravel có 2 cơ chế truy vấn CSDL:
        // - Eloquent: dùng model
        // - Query Builder: dùng truy vấn thuần
        // Lấy bản ghi theo cơ chế phân trang sử dụng Eloquent
        $products = Product::paginate(1); //1 bản ghi trên 1 trang
        return view('products.index', [
            'products' => $products
        ]);
    }
}
