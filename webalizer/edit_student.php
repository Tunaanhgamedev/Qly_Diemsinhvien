<?php
include('db.php');

$student_id = $_GET['id'];

$sql = "SELECT * FROM students WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
} else {
    echo "Không tìm thấy sinh viên!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Sửa thông tin sinh viên</h1>
        <form id="editForm" method="post" action="update_student.php">
            <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
            <div class="form-group">
                <label for="full_name">Họ và tên:</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo htmlspecialchars($student['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($student['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="score">Điểm:</label>
                <input type="number" id="score" name="score" class="form-control" min="0" max="10" value="<?php echo htmlspecialchars($student['score']); ?>" required>
            </div>
            <div class="form-group">
                <label for="class">Lớp:</label>
                <input type="text" id="class" name="class" class="form-control" value="<?php echo htmlspecialchars($student['class']); ?>" required>
            </div>
            <div class="form-group">
                <label for="subject">Môn học:</label>
                <input type="text" id="subject" name="subject" class="form-control" value="<?php echo htmlspecialchars($student['subject']); ?>" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Lưu thông tin</button>
        </form>
    </div>

    <!-- Bao gồm Bootstrap JS và jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>












