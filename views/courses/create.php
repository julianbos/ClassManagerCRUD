<!DOCTYPE html>
<html>

<head>
    <title>Create Course</title>
</head>

<body>
    <h1>Create Course</h1>

    <form action="index.php?controller=course&action=create" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

</html>