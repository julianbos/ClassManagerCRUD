<!DOCTYPE html>
<html>

<head>
    <title>Create student</title>
</head>

<body>
    <h1>Create Student</h1>

    <form action="index.php?controller=student&action=create" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

</html>