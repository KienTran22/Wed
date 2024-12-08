1. Giới thiệu về Laravel

Laravel được tạo ra bởi Taylor Otwell (năm 2011).
Phiên bản mới nhất: 10.x (https://laravel.com/docs/10.x).
Đặc điểm nổi bật:
Eloquent ORM: Giúp tương tác với cơ sở dữ liệu dễ dàng.
Blade Template Engine: Quản lý các layout động dễ dàng.
Migrations & Seeders: Quản lý và di chuyển dữ liệu hiệu quả.
Artisan CLI: Tự động hóa nhiều tác vụ (tạo models, controllers,...).
Middleware, Routing, Authentication: Quản lý điều hướng và bảo mật.
2. Kiến trúc Laravel
Laravel sử dụng kiến trúc MVC (Model-View-Controller):

Model: Xử lý dữ liệu và truy vấn cơ sở dữ liệu thông qua Eloquent ORM.
View: Hiển thị giao diện với Blade templates.
Controller: Xử lý logic và kết nối Model với View.

3. Cấu trúc dự án Laravel

/app: Chứa models, controllers và các lớp PHP khác.
/bootstrap: Chứa tệp khởi động và tối ưu hiệu suất.
/config: Chứa tệp cấu hình.
/database: Quản lý migrations, seeds.
/public: Thư mục gốc của web server.
/resources: Chứa Blade templates, CSS, JS.
/routes: Định nghĩa các routes của ứng dụng.
/storage: Chứa logs, cache, và file upload.
/tests: Chứa các bài kiểm thử.
/vendor: Chứa các thư viện từ Composer.
4. Routing và Controller

Routes được định nghĩa trong routes/web.php cho web hoặc routes/api.php cho API.
- Ví dụ route đơn giản:
<!-- Route::get('/example', function () {
    return 'Hello World';
}); -->
- Tạo Controller
<!-- php artisan make:controller ExampleController -->
-Kết nối Route với Controller:
<!-- Route::get('/example', [ExampleController::class, 'show']); -->



<!-- Hướng dẫn chi tiết quy trình tạo ứng dụng Laravel đơn giản: -->
1. Tạo dự án Laravel
Chạy lệnh tạo dự án:
<!-- BASH 
laravel new lr-project
 -->
2. Tạo CSDL
Tạo một cơ sở dữ liệu, ví dụ: lr-project.

3. Cấu hình tệp .env
Cập nhật thông tin kết nối cơ sở dữ liệu trong tệp .env:

<!-- DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lr-project
DB_USERNAME=your_username
DB_PASSWORD=your_password -->

4. Tạo bảng dữ liệu
Chạy lệnh tạo migration:

<!-- php artisan make:migration create_posts_table -->
Định nghĩa cấu trúc bảng posts:

<!-- Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->timestamps();
}); -->
5. Thực thi migration
Tạo bảng trong CSDL:

<!-- bash
php artisan migrate -->
6. Tạo Seeder để sinh dữ liệu mẫu
Chạy lệnh tạo Seeder:

<!-- bash
php artisan make:seeder PostsTableSeeder -->
Thực thi Seeder:
<!-- bash
php artisan db:seed --class=PostsTableSeeder -->

7.  Tạo Model
Tạo model Post:
<!-- bash
php artisan make:model Post -->

8. Tạo Controller
Tạo controller PostController với 7 phương thức chuẩn:

<!-- bash
php artisan make:controller PostController --resource -->

9. Tạo Blade Template
Tạo view home:
<!-- bash
php artisan make:view home -->

Định nghĩa nội dung trong home.blade.php:
<!-- bash
@foreach($posts as $post)
    <p>{{ $post->content }}</p>
@endforeach -->


10.Sửa đổi route
Mở tệp routes/web.php và thêm route:

<!-- php
Route::get('/', [HomeController::class, 'index']);
Route::get('posts', [PostController::class, 'index']); -->
11. Chạy ứng dụng
Chạy server:
<!-- bash
php artisan serve -->
