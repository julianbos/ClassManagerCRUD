<?php

class CourseController
{
    public function index()
    {
        $courses = Course::all();
        require_once('views/courses/index.php');
    }

    public function create()
    {
        if (isset($_POST['name'])) {
            $course = new Course(null, $_POST['name']);
            $course->save();
            header('Location: index.php');
        }
        require_once('views/courses/create.php');
    }

    public function update($id)
    {
        if (isset($_POST['name'])) {
            $course = Course::find($id);
            $course->name = $_POST['name'];
            $course->update();
            header('Location: index.php');
        } else {
            $course = Course::find($id);
            require_once('views/courses/update.php');
        }
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        header('Location: index.php?controller=course&action=index');
    }
}
