<?php
class Enrollment
{
    public $id;
    public $student_id;
    public $course_id;

    public function __construct($id = null, $student_id, $course_id)
    {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->course_id = $course_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    public function getCourseId()
    {
        return $this->course_id;
    }

    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }

    public function getStudent()
    {
        return Student::find($this->student_id);
    }

    public function getCourse()
    {
        return Course::find($this->course_id);
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM enrollments');

        foreach ($req->fetchAll() as $enrollment) {
            $list[] = new Enrollment($enrollment['id'], $enrollment['student_id'], $enrollment['course_id']);
        }

        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM enrollments WHERE id = :id');
        $req->execute(array('id' => $id));
        $enrollment = $req->fetch();

        return new Enrollment($enrollment['id'], $enrollment['student_id'], $enrollment['course_id']);
    }

    public function save()
    {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)");
        $req->execute(array(
            'student_id' => $this->getStudentId(),
            'course_id' => $this->getCourseId()
        ));
        return $db->lastInsertId();
    }

    public function update()
    {
        $db = Db::getInstance();
        $req = $db->prepare("UPDATE enrollments SET student_id = :student_id, course_id = :course_id WHERE id = :id");
        $req->execute(array(
            'id' => $this->getId(),
            'student_id' => $this->getStudentId(),
            'course_id' => $this->getCourseId()
        ));
    }

    public function delete()
    {
        $db = Db::getInstance();
        $req = $db->prepare("DELETE FROM enrollments WHERE id = :id");
        $req->execute(array(
            'id' => $this->getId()
        ));
    }
}
