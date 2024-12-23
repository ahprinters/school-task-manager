<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subjectID = $_POST['tbl_subject_id'];
    $taskName = $_POST['task_name'];
    $taskStatus = $_POST['task_status'];
    $taskDeadline = $_POST['task_deadline'];

    try {
        $stmt = $conn->prepare("INSERT INTO `tbl_task` (`tbl_task_id`, `tbl_subject_id`, `task_name`, `task_status`, `task_deadline`) VALUES (NULL, :tbl_subject_id, :task_name, :task_status, :task_deadline)");

        $stmt->bindParam(':tbl_subject_id', $subjectID, PDO::PARAM_INT);
        $stmt->bindParam(':task_name', $taskName, PDO::PARAM_STR);
        $stmt->bindParam(':task_status', $taskStatus, PDO::PARAM_STR);
        $stmt->bindParam(':task_deadline', $taskDeadline);

        $stmt->execute();

        echo "
        <script>
            alert('Task Added Successfully');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "
        <script>
            alert('Failed to Add Task');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
}
?>
