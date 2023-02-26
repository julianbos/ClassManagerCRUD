<!DOCTYPE html>
<html>

<head>
	<title>Course List</title>
</head>

<body>
	<h1>Course List</h1>

	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($courses as $course) { ?>
			<tr>
				<td><?php echo $course->getId(); ?></td>
				<td><?php echo $course->getName(); ?></td>
				<td>
					<a href="index.php?controller=course&action=update&id=<?php echo $course->getId(); ?>">Edit</a>
					<a href="index.php?controller=course&action=delete&id=<?php echo $course->getId(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	<a style="margin-left: 10%" href="index.php?controller=course&action=create">Add course</a>
</body>

</html>