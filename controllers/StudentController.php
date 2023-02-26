<?php

class StudentController
{
    public function index()
    {
        $students = Student::all();
        require_once('views/students/index.php');
    }

    public function create()
    {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $student = new Student(null, $_POST['name'], $_POST['email']);
            $student->save();
            header('Location: index.php');
        }
        require_once('views/students/create.php');
    }

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            $student = Student::find($id);
            $student->name = $_POST['name'];
            $student->email = $_POST['email'];
            $student->update();
            header('Location: index.php?controller=student&action=index');
        } else {
            $student = Student::find($id);
            require_once 'views/students/update.php';
        }
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        header('Location: index.php?controller=student&action=index');
    }
}
