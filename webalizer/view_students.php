<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý điểm sinh viên</title>
    <!-- Bao gồm Bootstrap CSS từ CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>
    <div class="back-button">
        <a href="index.php" class="btn btn-outline-info">Quay lại trang chủ</a>
    </div>
    <div class="container">
        <div class="header">
            <h2>Danh sách điểm sinh viên</h2>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Điểm</th>
                    <th>Lớp</th>
                    <th>Môn học</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT student_id, full_name, email, score, class, subject FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['student_id']}</td>
                            <td>{$row['full_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['score']}</td>
                            <td>{$row['class']}</td>
                            <td>{$row['subject']}</td>
                            <td>
                                <a href='edit_student.php?id={$row['student_id']}' class='btn btn-outline-primary btn-sm'>Sửa</a>
                                <a href='delete_student.php?id={$row['student_id']}' class='btn btn-outline-danger btn-sm' onclick='return confirm(\"Bạn có chắc muốn xóa sinh viên này không?\")'>Xóa</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có sinh viên nào</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Thêm sinh viên</h2>
        <form action="add_student.php" method="post">
            <div class="form-group">
                <label for="student_id">Mã sinh viên:</label>
                <input type="text" id="student_id" name="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="full_name">Họ và tên:</label>
                <input type="text" id="full_name" name="full_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="score">Điểm:</label>
                <input type="number" id="score" name="score" class="form-control" min="0" max="10" required>
            </div>
            <div class="form-group">
                <label for="class">Lớp:</label>
                <input type="text" id="class" name="class" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subject">Môn học:</label>
                <input type="text" id="subject" name="subject" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-outline-success" value="Thêm sinh viên">
        </form>
    </div>

    <!-- Bao gồm Bootstrap JS và jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>







