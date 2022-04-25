<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // THêm _token vào danh sách loại trừ khi insert vào bảng product
    protected $guarded = ['_token'];
}
