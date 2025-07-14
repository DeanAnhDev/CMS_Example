# 📄 CMS_Example

Dự án CMS đơn giản sử dụng **Laravel**, hỗ trợ quản lý bài viết, danh mục, người dùng với frontend tích hợp **Vite** và **TailwindCSS**.

---

## 🚀 Hướng dẫn cài đặt

### 1. Clone repository và di chuyển vào thư mục dự án

```bash
git clone https://github.com/DeanAnhDev/CMS_Example.git

cd cms-app
```
### 2. Cài đặt thư viện PHP với Composer
```bash
composer install
```
### 3. Tạo file cấu hình .env
```bash
cp .env.example .env
```
### 4. Tạo khóa bí mật cho ứng dụng
```bash
php artisan key:generate
```

### 5.Cấu hình CSDL
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ten_database
DB_USERNAME=root
DB_PASSWORD=matkhau
```

### 6. Chạy seed 
```bash
php artisan db:seed
```

###  7. Cài đặt & build frontend
```bash
npm install
```

```bash
npm run dev

```

### 8. Khởi chạy Laravel Server
```bash
php artisan serve

```