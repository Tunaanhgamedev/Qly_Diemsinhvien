<?php
include('db.php');

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Sử dụng prepared statement để xóa sinh viên
    $delete_sql = "DELETE FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($delete_sql);

    if ($stmt) {
        $stmt->bind_param("i", $student_id);

        if ($stmt->execute()) {
            // Chuyển hướng người dùng trở lại trang danh sách sinh viên sau khi xóa
            header("Location: view_students.php");
            exit();
        } else {
            echo "Lỗi khi xóa sinh viên: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
    }
} else {
    echo "ID sinh viên không hợp lệ.";
}

$conn->close();
?>

