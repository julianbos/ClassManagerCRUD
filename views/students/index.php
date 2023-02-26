<!DOCTYPE html>
<html>

<head>
	<title>Student List</title>
</head>

<body>
	<h1>Student List</h1>

	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		<?php foreach ($students as $student) { ?>
			<tr>
				<td><?php echo $student->getId(); ?></td>
				<td><?php echo $student->getName(); ?></td>
				<td><?php echo $student->getEmail(); ?></td>
				<td>
					<a href="index.php?controller=student&action=update&id=<?php echo $student->getId(); ?>">Edit</a>
					<a href="index.php?controller=student&action=delete&id=<?php echo $student->getId(); ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<a style="margin-left: 10%" href="index.php?controller=student&action=create">Add Student</a>
</body>

</html>