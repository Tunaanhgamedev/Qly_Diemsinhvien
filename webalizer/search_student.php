<?php
include('db.php');

// Hiển thị lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Kiểm tra xem có tham số mã sinh viên được gửi từ URL không
if(isset($_GET['student_id'])) {
    // Lấy mã sinh viên từ tham số truy vấn
    $student_id = $_GET['student_id'];

    // Chuẩn bị truy vấn SQL để lấy thông tin sinh viên dựa trên mã sinh viên
    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có bản ghi sinh viên nào được tìm thấy không
    if ($result->num_rows > 0) {
        // Lấy thông tin sinh viên từ kết quả truy vấn
        $student = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <title>Thông tin sinh viên</title>
            <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .student-info {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .student-info h2 {
        color: #333;
    }
    .student-info table {
        width: 100%;
        border-collapse: collapse;
    }
    .student-info td {
        padding: 10px;
        border: 1px solid #ddd;
    }
    .back-btn {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .back-btn:hover {
        background-color: #45a049;
    }
</style>

        </head>
        <body>
            <div class="student-info">
                <h2>Thông tin sinh viên</h2>
                <table>
                    <tr>
                        <td>Mã sinh viên:</td>
                        <td><?php echo $student['student_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Họ và tên:</td>
                        <td><?php echo $student['full_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $student['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Điểm:</td>
                        <td><?php echo $student['score']; ?></td>
                    </tr>
                    <tr>
                        <td>Lớp:</td>
                        <td><?php echo $student['class']; ?></td>
                    </tr>
                    <tr>
                        <td>Môn học:</td>
                        <td><?php echo $student['subject']; ?></td>
                    </tr>
                </table>
                <a href="index.php" class="back-btn">Quay lại trang chủ</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Nếu không tìm thấy sinh viên, hiển thị thông báo
        echo "Không tìm thấy sinh viên!";
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
} else {
    // Nếu không có tham số mã sinh viên được gửi từ URL, hiển thị thông báo lỗi
    echo "Vui lòng cung cấp mã sinh viên để tìm kiếm!";
}
?>





