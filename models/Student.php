<?php
require_once 'lib/Db.php';
class Student
{

    public $id;
    public $name;
    public $email;

    public function __construct($id = null, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM students");
        foreach ($req->fetchAll() as $student) {
            $list[] = new Student($student['id'], $student['name'], $student['email']);
        }
        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare("SELECT * FROM students WHERE id = :id");
        $req->execute(array('id' => $id));
        $student = $req->fetch();

        return new Student($student['id'], $student['name'], $student['email']);
    }

    public function save()
    {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO students (name, email) VALUES (:name, :email)");
        $req->execute(array(
            'name' => $this->getName(),
            'email' => $this->getEmail()
        ));
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $db = Db::getInstance();
        $req = $db->prepare("UPDATE students SET name = :name, email = :email WHERE id = :id");
        $req->execute(array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail()
        ));
    }

    public function delete()
    {
        $db = Db::getInstance();

        $req = $db->prepare("DELETE FROM enrollments WHERE student_id = :id");
        $req->execute(array('id' => $this->getId()));

        $req = $db->prepare("DELETE FROM students WHERE id = :id");
        $req->execute(array('id' => $this->getId()));
    }
}
