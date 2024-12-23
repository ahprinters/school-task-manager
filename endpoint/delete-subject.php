<?php
include ('../conn/conn.php');

if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];

    try {

        $query = "DELETE FROM `tbl_subject` WHERE `tbl_subject_id` = '$subject'";

        $stmt = $conn->prepare($query);

        $query_execute = $stmt->execute();

        if ($query_execute) {
            echo "
            <script>
                alert('Subject Deleted Successfully');
                window.location.href = 'http://localhost/school-task-manager/index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Failed to Delete Subject');
                window.location.href = 'http://localhost/school-task-manager/index.php';
            </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>