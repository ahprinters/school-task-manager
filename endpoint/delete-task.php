<?php
include ('../conn/conn.php');

if (isset($_GET['task'])) {
    $task = $_GET['task'];

    try {
        // Prepare the SQL statement with a placeholder
        $query = "DELETE FROM `tbl_task` WHERE `tbl_task_id` = :task_id";
        $stmt = $conn->prepare($query);

        // Bind the task ID parameter
        $stmt->bindParam(':task_id', $task, PDO::PARAM_INT);

        // Execute the statement
        $query_execute = $stmt->execute();

        // Check if the query executed successfully
        if ($query_execute) {
            echo "
            <script>
                alert('Task Deleted Successfully');
                window.location.href = 'http://localhost/school-task-manager/index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Failed to Delete Task');
                window.location.href = 'http://localhost/school-task-manager/index.php';
            </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>