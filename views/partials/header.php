<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="styling/style.css">
</head>
<nav>
  <ul>
    <li><a href="index.php?controller=enrollment&action=index">Enrollments</a></li>
    <li><a href="index.php?controller=student&action=index">Students</a></li>
    <li><a href="index.php?controller=course&action=index">Courses</a></li>
    <?php if (AuthController::isLoggedIn()) : ?>
      <li><a class="nav-right" href="index.php?controller=auth&action=logout">Logout</a></li>
    <?php else : ?>
      <li><a class="nav-right" href="index.php?controller=auth&action=login">Login</a></li>
    <?php endif; ?>
  </ul>
</nav>

</html>
