<!DOCTYPE html>
<html>

<head>
	<title>Create Enrollment</title>
</head>

<body>
	<h1>Create Enrollment</h1>

	<form action="index.php?controller=enrollment&action=create" method="post">
		<label for="student_id">Student:</label>
		<select id="student_id" name="student_id">
			<?php foreach ($students as $student) { ?>
				<option value="<?php echo $student->getId(); ?>"><?php echo $student->getName(); ?></option>
			<?php } ?>
		</select>
		<br>
		<label for="course_id">Course:</label>
		<select id="course_id" name="course_id">
			<?php foreach ($courses as $course) { ?>
				<option value="<?php echo $course->getId(); ?>"><?php echo $course->getName(); ?></option>
			<?php } ?>
		</select>
		<br>
		<input type="submit" value="Create Enrollment">
	</form>
</body>

</html>