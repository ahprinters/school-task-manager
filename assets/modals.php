<!-- Add Subject Modal -->
<div class="modal fade mt-5" id="subjectModal" tabindex="-1" aria-labelledby="subject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subject">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/add-subject.php" method="POST">
                    <div class="mb-3" hidden>
                        <label for="subjectID" class="form-control">Subject ID</label>
                        <input type="text" class="form-control" id="subjectID" name="tbl_subject_id">
                    </div>
                    <div class="mb-3">
                        <label for="subjectName">Subject Name</label>
                        <input type="text" class="form-control" id="subjectName" name="subject_name">
                    </div>
                    <div class="mb-3">
                        <label for="subjectTeacher">Subject Teacher</label>
                        <input type="text" class="form-control" id="subjectTeacher" name="subject_teacher">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Add</button>
                    </div>
                </form>
            </div>                                    
        </div>
    </div>
</div>

<!-- Update Subject Modal -->
<div class="modal fade mt-5" id="updateSubjectModal" tabindex="-1" aria-labelledby="updateSubject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubject">Update Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/update-subject.php" method="POST">
                    <div class="mb-3" hidden>
                        <label for="updateSubjectID" class="form-control">Subject ID</label>
                        <input type="text" class="form-control" id="updateSubjectID" name="tbl_subject_id">
                    </div>
                    <div class="mb-3">
                        <label for="updateSubjectName">Subject Name</label>
                        <input type="text" class="form-control" id="updateSubjectName" name="subject_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateSubjectTeacher">Subject Teacher</label>
                        <input type="text" class="form-control" id="updateSubjectTeacher" name="subject_teacher">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Add</button>
                    </div>
                </form>
            </div>                                    
        </div>
    </div>
</div>

<!-- Add Task Modal -->
<div class="modal fade mt-5" id="taskModal" tabindex="-1" aria-labelledby="task" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="task">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/add-task.php" method="POST">
                    <div class="mb-3" hidden>
                        <label for="taskID" class="form-control">Task ID</label>
                        <input type="text" class="form-control" id="taskID" name="tbl_task_id">
                    </div>
                    <div class="mb-3">
                        <label for="taskSubject">Subject</label>
                        
                        <?php
                        
                            $stmt = $conn->prepare("SELECT * FROM `tbl_subject`");
                            $stmt->execute();
                            $taskSubject = $stmt->fetchAll();


                        ?>

                        <select class="form-control" name="tbl_subject_id" id="taskSubject">
                            <option value="">-select-</option>
                            <?php 
                            
                                foreach ($taskSubject as $subject) {
                                    ?>

                                    <option value="<?php echo $subject['tbl_subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>

                                    <?php
                                }
                            
                            ?>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="taskName">Task Name</label>
                        <input type="text" class="form-control" id="taskName" name="task_name">
                    </div>
                    <div class="mb-3">
                        <label for="taskStatus">Status</label>
                        <select class="form-control" name="task_status" id="taskStatus">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="taskDeadline">Deadline</label>
                        <input type="datetime-local" class="form-control" id="taskDeadline" name="task_deadline">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Task Modal -->
<div class="modal fade mt-5" id="updateTaskModal" tabindex="-1" aria-labelledby="updateTask" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTask">Update Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./endpoint/update-task.php" method="POST">
                    <div class="mb-3" hidden>
                        <label for="updateTaskID" class="form-control">Task ID</label>
                        <input type="text" class="form-control" id="updateTaskID" name="tbl_task_id">
                    </div>
                    <div class="mb-3">
                        <label for="updateTaskSubject">Subject</label>
                        
                        <?php
                        
                            $stmt = $conn->prepare("SELECT * FROM `tbl_subject`");
                            $stmt->execute();
                            $taskSubject = $stmt->fetchAll();

                        ?>

                        <select class="form-control" name="tbl_subject_id" id="updateTaskSubject">
                            <option value="">-select-</option>
                            <?php 
                            
                                foreach ($taskSubject as $subject) {
                                    ?>

                                    <option value="<?php echo $subject['tbl_subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>

                                    <?php
                                }
                            
                            ?>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="updateTaskName">Task Name</label>
                        <input type="text" class="form-control" id="updateTaskName" name="task_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateTaskStatus">Status</label>
                        <select class="form-control" name="task_status" id="updateTaskStatus">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateTaskDeadline">Deadline</label>
                        <input type="datetime-local" class="form-control" id="updateTaskDeadline" name="task_deadline">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>