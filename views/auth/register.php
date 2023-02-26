<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form method="post" action="index.php?controller=auth&action=register">
        <label>
            Username:
            <input type="text" name="username" required>
        </label><br><br>
        <label>
            Password:
            <input type="password" name="password" required>
        </label>
        <?php if (isset($error)) : ?>
        <div style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>
        <br>
        <a href="index.php?controller=auth&action=login">I am already a user</a>
        <br>
        <input type="submit" value="Register">
    </form>
</body>

</html>