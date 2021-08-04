Bước 1: Mở Terminal và thực hiện clone dự án và vào thư mục dự án bằng câu lệnh sau:

git clone https://github.com/tantranvn1708/ThucTap.git

Bước 2: Chạy composer và npm để cài đặt các gói cần thiết trong dự án

composer install

Bước 3: Tạo database và config database

 ta thực hiện lệnh sau để copy ra file env:

cp .env.example .env

Cập nhật file env của bạn như sau:

DB_CONNECTION=mysql          
DB_HOST=127.0.0.1            
DB_PORT=3306                 
DB_DATABASE=dtb_mobifone      
DB_USERNAME=root             
DB_PASSWORD=   

Bước 4: Tạo ra key cho dự án

php artisan key:generate

tk admin : admin@gmail.com 
pass: 123456