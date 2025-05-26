// Function to delete student
function deleteStudent(id) {
    if (confirm("Bạn có chắc muốn xóa sinh viên này không?")) {
        // Send delete request to delete_student.php
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_student.php?id=" + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // If delete successful, remove row from table
                var tableRow = document.getElementById("row_" + id);
                if (tableRow) {
                    tableRow.remove();
                }
            }
        };
        xhr.send();
    }
}

