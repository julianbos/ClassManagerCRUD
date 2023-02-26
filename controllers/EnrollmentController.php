<?php

require_once 'models/Enrollment.php';
require_once 'models/Student.php';
require_once 'models/Course.php';

class EnrollmentController
{
    public function index()
    {
        $enrollments = Enrollment::all();
        require_once 'views/enrollments/index.php';
    }

    public function create()
    {
        if (isset($_POST['student_id']) && isset($_POST['course_id'])) {
            $enrollment = new Enrollment(null, $_POST['student_id'], $_POST['course_id']);
            $enrollment->save();
            header('Location: index.php?controller=enrollment&action=index');
        }

        $students = Student::all();
        $courses = Course::all();

        require_once 'views/enrollments/create.php';
    }

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            $enrollment = Enrollment::find($id);
            $enrollment->student_id = $_POST['student_id'];
            $enrollment->course_id = $_POST['course_id'];
            $enrollment->update();
            header('Location: index.php?controller=enrollment&action=index');
        } else {
            $enrollment = Enrollment::find($id);
            $students = Student::all();
            $courses = Course::all();
            require_once 'views/enrollments/update.php';
        }
    }

    public function delete($id)
    {
        $enrollment = Enrollment::find($id);
        $enrollment->delete();
        header('Location: index.php?controller=enrollment&action=index');
    }
}
