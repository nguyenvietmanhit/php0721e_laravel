<?php
// namespace
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Kỹ thuật viết tên class trước đối tượng tương ứng khi khai báo tham số của hàm
        //có mục đích là gợi ý ra các phương thức có sẵn của class đó
        Schema::create('products', function (Blueprint $table) {
            // Tạo các trường cho bảng products bằng code LAravel
            // id, name, price, avatar, created_at, updated_at
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('price');
            $table->string('avatar');
            $table->timestamps(); // tạo tự động 2 trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
