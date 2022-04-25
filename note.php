<?php
/**
 * Cài đặt source code Laravel lấy từ github về:
 * - Clone source code, đặt trong htdocs của XAMPP
 * - Dùng command line, cd vào thư mục source code vừa clone về
 * - Chạy các lệnh sau:
 * composer install
 * - Copy file .env.example thành file .env, sửa thông tin DB trong file
 * .env này cho phù hợp với môi trường của bạn
 * - Tạo thủ công CSDL tương ứng trong file .env: php0721e_laravel
 * - Chạy lệnh sau để tự động sinh bảng theo cơ chế migrate của Laravel:
 * php artisan migrate
 * - Chạy lệnh sau để sinh ra key cho ứng dụng Laravel
 * php artisan key:generate
 */
