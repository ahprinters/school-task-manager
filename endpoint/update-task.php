<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tbl_task_id = $_POST['tbl_task_id'];
    $tbl_subject_id = $_POST['tbl_subject_id'];
    $task_name = $_POST['task_name'];
    $task_status = $_POST['task_status'];
    $task_deadline = $_POST['task_deadline'];

    try {
        $stmt = $conn->prepare("UPDATE `tbl_task` SET `tbl_subject_id` = :tbl_subject_id, `task_name` = :task_name, `task_status` = :task_status, `task_deadline` = :task_deadline WHERE `tbl_task_id` = :tbl_task_id");

        $stmt->bindParam(':tbl_subject_id', $tbl_subject_id, PDO::PARAM_INT);
        $stmt->bindParam(':task_name', $task_name, PDO::PARAM_STR);
        $stmt->bindParam(':task_status', $task_status, PDO::PARAM_STR);
        $stmt->bindParam(':task_deadline', $task_deadline);
        $stmt->bindParam(':tbl_task_id', $tbl_task_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "
        <script>
            alert('Task Updated Successfully');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "
        <script>
            alert('Failed to Update Task.');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
}
?>
