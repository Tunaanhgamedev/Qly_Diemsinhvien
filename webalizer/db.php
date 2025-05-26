<?php
$servername = "localhost";
$username = "root"; // Thay đổi nếu cần thiết
$password = ""; // Thay đổi nếu cần thiết
$dbname = "student_management"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
