
# 🎓 Hệ Thống Quản Lý Điểm Sinh Viên

## 📌 Giới thiệu

Đây là một ứng dụng web được xây dựng bằng **PHP & MySQL**, chạy trên môi trường **XAMPP**, cho phép quản lý thông tin sinh viên và điểm số.

Hệ thống hỗ trợ đầy đủ các thao tác CRUD (Create, Read, Update, Delete) và tìm kiếm dữ liệu.

---

## 🎯 Chức năng chính

* 👨‍🎓 Thêm sinh viên (`add_student.php`)
* ✏️ Sửa thông tin (`edit_student.php`, `update_student.php`)
* ❌ Xóa sinh viên (`delete_student.php`)
* 📋 Xem danh sách (`view_students.php`)
* 📊 Xem điểm (`view_grades.php`)
* 🔍 Tìm kiếm (`search_student.php`)

---

## ⚙️ Cách hệ thống hoạt động

1. Người dùng truy cập `index.php`
2. Thực hiện các thao tác (thêm / sửa / xóa / tìm kiếm)
3. Các file PHP xử lý logic và gửi query đến database qua `db.php`
4. Dữ liệu được trả về và hiển thị trên giao diện

---

## 🛠️ Công nghệ sử dụng

* PHP (Backend)
* MySQL (Database)
* HTML / CSS / JavaScript
* XAMPP (Apache + MySQL)

---

## 📁 Cấu trúc project

```bash id="vbbmgh"
webalizer/
 ├── index.php
 ├── add_student.php
 ├── edit_student.php
 ├── update_student.php
 ├── delete_student.php
 ├── view_students.php
 ├── view_grades.php
 ├── search_student.php
 ├── config.php        # cấu hình DB
 ├── db.php            # xử lý truy vấn
 ├── style.css
 └── delete_student.js
```

---

## ▶️ Hướng dẫn chạy

### 1. Clone project

```bash id="qghhtd"
git clone https://github.com/Tunaanhgamedev/Qly_Diemsinhvien.git
```

### 2. Copy vào XAMPP

```bash id="0e9vcc"
C:\xampp\htdocs\
```

---

### 3. Tạo database

* Truy cập: http://localhost/phpmyadmin
* Tạo database: `ql_diem`
* Import file `.sql` (nếu có)

---

### 4. Cấu hình kết nối

Chỉnh file `config.php`:

```php id="d17dwh"
$host = "localhost";
$user = "root";
$password = "";
$database = "ql_diem";
```

---

### 5. Chạy project

```bash id="3dqb5m"
http://localhost/Qly_Diemsinhvien/webalizer
```

---

## 💡 Điểm nổi bật

* Thực hiện đầy đủ CRUD với PHP thuần
* Có chức năng tìm kiếm
* Tách riêng file xử lý database (`db.php`)
* Dễ hiểu, phù hợp học tập

---

## 🚀 Hướng phát triển

* 🔐 Thêm đăng nhập (Admin/User)
* 📊 Tính điểm trung bình
* 📈 Thống kê dữ liệu
* 🎨 Nâng cấp UI (Bootstrap / Tailwind)

---

## 📄 License

Dự án phục vụ mục đích học tập.
