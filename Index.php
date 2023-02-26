<?php

require_once 'models/Student.php';
require_once 'models/Course.php';
require_once 'models/Enrollment.php';
require_once 'models/User.php';
require_once 'controllers/StudentController.php';
require_once 'controllers/CourseController.php';
require_once 'controllers/EnrollmentController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/AuthMiddleware.php';

include 'views/partials/header.php';

$controller = 'student';
$action = 'index';

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$authMiddleware = new AuthMiddleware();

switch ($controller) {

    case 'auth':
        $authController = new AuthController();
        switch ($action) {
            case 'login':
                $authController->login();
                break;
            case 'register':
                $authController->register();
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                $authController->login();
                break;
        }
        break;

    case 'student':
        $studentController = new StudentController();
        switch ($action) {
            case 'index':
                $studentController->index();
                break;
            case 'create':
                $authMiddleware->handle();
                $studentController->create();
                break;
            case 'update':
                $authMiddleware->handle();
                $studentController->update($_GET['id']);
                break;
            case 'delete':
                $authMiddleware->handle();
                $studentController->delete($_GET['id']);
                break;
            default:
                $studentController->index();
                break;
        }
        break;

    case 'course':
        $courseController = new CourseController();
        switch ($action) {
            case 'index':
                $courseController->index();
                break;
            case 'create':
                $authMiddleware->handle();
                $courseController->create();
                break;
            case 'update':
                $authMiddleware->handle();
                $courseController->update($_GET['id']);
                break;
            case 'delete':
                $authMiddleware->handle();
                $courseController->delete($_GET['id']);
                break;
            default:
                $courseController->index();
                break;
        }
        break;

    case 'enrollment':
        $enrollmentController = new EnrollmentController();
        switch ($action) {
            case 'index':
                $enrollmentController->index();
                break;
            case 'create':
                $authMiddleware->handle();
                $enrollmentController->create();
                break;
            case 'update':
                $authMiddleware->handle();
                $enrollmentController->update($_GET['id']);
                break;
            case 'delete':
                $authMiddleware->handle();
                $enrollmentController->delete($_GET['id']);
                break;
            default:
                $enrollmentController->index();
                break;
        }
        break;

    default:
        $enrollmentController = new EnrollmentController();
        $enrollmentController->index();
        break;
}
