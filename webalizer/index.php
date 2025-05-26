<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý điểm sinh viên</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 36px; /* Tăng kích thước font */
            margin-top: 20px; /* Thêm khoảng cách trên cùng */
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .search-container {
            text-align: center;
            margin-top: 20px;
        }
        input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
            margin-right: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .link-container {
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px;
        }
        .link-container a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Quản lý điểm sinh viên</h1>
    <nav>
        <div class="link-container">
            <a href="add_student.php">Thêm sinh viên</a>
        </div>
        <div class="link-container">
            <a href="view_students.php">Xem danh sách điểm sinh viên</a>
        </div>
    </nav>
    <div class="search-container">
        <form action="search_student.php" method="GET">
            <input type="text" placeholder="Nhập mã sinh viên ..." name="student_id">
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>
</body>
</html>


