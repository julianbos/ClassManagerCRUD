<!DOCTYPE html>
<html>

<head>
	<title>Enrollment List</title>
</head>

<body>
	<h1>Enrollment List</h1>

	<table>
		<tr>
			<th>Name</th>
			<th>Course</th>
			<th>Action</th>
		</tr>
		<?php foreach ($enrollments as $enrollment) { ?>
			<tr>
				<td><?php echo $enrollment->getStudent()->getName(); ?></td>
				<td><?php echo $enrollment->getCourse()->getName(); ?></td>
				<td>
					<a href="index.php?controller=enrollment&action=update&id=<?php echo $enrollment->getId(); ?>">Edit</a>
					<a href="index.php?controller=enrollment&action=delete&id=<?php echo $enrollment->getId(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	<a style="margin-left: 10%" href="index.php?controller=enrollment&action=create">Add enrollment</a>
</body>

</html>