<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="post" action="index.php?controller=auth&action=login">
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
        <a href="index.php?controller=auth&action=register">Not a user yet?</a>
        <br>
        <input type="submit" value="Login">
    </form>
</body>

</html>