<!DOCTYPE html>
<html>

<head>
    <title>Update Course</title>
</head>

<body>
    <h1>Update Course</h1>

    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $course->getName(); ?>"><br>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>