<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý điểm sinh viên</title>
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
    </style>
</head>
<body>
    <h1>Quản lý điểm sinh viên</h1>
    <h2>Danh sách điểm sinh viên</h2>
    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Điểm</th>
            <th>Lớp</th>
            <th>Môn học</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $sql = "SELECT student_id, full_name, email, score, class, subject FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['score']}</td>
                    <td>{$row['class']}</td>
                    <td>{$row['subject']}</td>
                    <td>
                        <a href='edit_student.php?id={$row['student_id']}' class='btn btn-warning'>Sửa</a> | 
                        <a href='delete_student.php?id={$row['student_id']}' class='btn btn-danger' onclick='return confirm(\"Bạn có chắc muốn xóa sinh viên này không?\")'>Xóa</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có sinh viên nào</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <h2>Thêm sinh viên</h2>
    <form action="add_student.php" method="post">
        <label for="student_id">Mã sinh viên:</label>
        <input type="text" id="student_id" name="student_id" required><br><br>
        <label for="full_name">Họ và tên:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="score">Điểm:</label>
        <input type="number" id="score" name="score" min="0" max="10" required><br><br>
        <label for="class">Lớp:</label>
        <input type="text" id="class" name="class" required><br><br>
        <label for="subject">Môn học:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        <input type="submit" value="Thêm sinh viên">
    </form>
</body>
</html>







        