<?php
include('db.php');

// Hiển thị lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Xử lý khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu nhận được từ form
    if (isset($_POST['student_id']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['score']) && isset($_POST['class']) && isset($_POST['subject'])) {
        $student_id = $_POST['student_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $score = $_POST['score'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];

        // Tiếp tục xử lý dữ liệu...
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    // Tiếp tục với phần xử lý dữ liệu nếu có
    // Kiểm tra giá trị đầu vào
    if (empty($student_id) || empty($full_name) || empty($email) || empty($score) || empty($class) || empty($subject)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    // Sử dụng prepared statements để tránh SQL Injection
    $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, email, score, class, subject) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $student_id, $full_name, $email, $score, $class, $subject);

        if ($stmt->execute() === TRUE) {
            // Chuyển hướng người dùng sau khi thêm sinh viên thành công
            header("Location: view_students.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
    <!-- Bao gồm Bootstrap CSS từ CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="back-button">
        <a href="index.php" class="btn btn-outline-info">Quay lại trang chủ</a>
    </div>
    <div class="container">
        <h2>Thêm Sinh Viên</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="student_id">Mã sinh viên:</label>
            <input type="text" name="student_id" required>
            <label for="full_name">Họ và tên:</label>
            <input type="text" name="full_name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="score">Điểm:</label>
            <input type="number" name="score" required>
            <label for="class">Lớp:</label>
            <input type="text" name="class" required>
            <label for="subject">Môn học:</label>
            <input type="text" name="subject" required>
            <input type="submit" value="Thêm Sinh Viên">
        </form>
    </div>
    <!-- Bao gồm Bootstrap JS và jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>






