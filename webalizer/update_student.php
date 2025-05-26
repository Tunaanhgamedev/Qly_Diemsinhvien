<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $score = $_POST['score'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];

    $update_sql = "UPDATE students SET full_name = ?, email = ?, score = ?, class = ?, subject = ? WHERE student_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('ssissi', $full_name, $email, $score, $class, $subject, $student_id);

    if ($stmt->execute()) {
        $success_message = "Sửa thông tin thành công!";
    } else {
        $error_message = "Có lỗi xảy ra: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: view_students.php?success=" . urlencode($success_message));
    exit();
}
?>
