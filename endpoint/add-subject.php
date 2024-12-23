<?php
include('../conn/conn.php');

$subjectName = $_POST['subject_name'];
$subjectTeacher = $_POST['subject_teacher'];

try {
    $stmt = $conn->prepare("SELECT `subject_name`, `subject_teacher` FROM `tbl_subject` WHERE `subject_name` = :subject_name AND `subject_teacher` = :subject_teacher");
    $stmt->execute([
        'subject_name' => $subjectName,
        'subject_teacher' => $subjectTeacher,
    ]);

    $subjectExist = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($subjectExist)) {
        $conn->beginTransaction();

        // Prepare the SQL statement with placeholders for subject name and teacher
	$insertStmt = $conn->prepare("INSERT INTO `tbl_subject` (`tbl_subject_id`, `subject_name`, `subject_teacher`) VALUES (NULL, :subject_name, :subject_teacher)");

	// Bind parameters to the placeholders
	$insertStmt->bindParam(':subject_name', $subjectName, PDO::PARAM_STR);
	$insertStmt->bindParam(':subject_teacher', $subjectTeacher, PDO::PARAM_STR);

	// Execute the statement to insert the data
	$insertStmt->execute();


        echo "
        <script>
            alert('Subject Added Successfully');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
        $conn->commit();
    } else {
        echo "
        <script>
            alert('Subject already exists, try adding another subject');
            window.location.href = 'http://localhost/school-task-manager/index.php';
        </script>
        ";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

