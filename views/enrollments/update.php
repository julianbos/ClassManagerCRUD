<!DOCTYPE html>
<html>

<head>
    <title>Update Enrollment</title>
</head>

<body>
    <h1>Update Enrollment</h1>

    <form method="post">
        <label>Student Name:</label><br>
        <select name="student_id">
            <?php foreach ($students as $student) { ?>
                <option value="<?php echo $student->getId(); ?>" <?php echo $student->getId() == $enrollment->getStudentId() ? 'selected' : '' ?>>
                    <?php echo $student->getName(); ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <label>Student Name:</label><br>
        <select name="course_id">
            <?php foreach ($courses as $course) { ?>
                <option value="<?php echo $course->getId(); ?>" <?php echo $course->getId() == $enrollment->getCourseId() ? 'selected' : '' ?>>
                    <?php echo $course->getName(); ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>