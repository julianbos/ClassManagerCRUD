<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
</head>

<body>
    <h1>Update Student</h1>

    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $student->getName(); ?>"><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $student->getEmail(); ?>"><br>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>