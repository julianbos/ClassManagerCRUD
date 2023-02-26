<?php

require_once 'lib/Db.php';

class Course
{
    public $id;
    public $name;

    public function __construct($id = null, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM courses");

        foreach ($req->fetchAll() as $course) {
            $list[] = new Course($course['id'], $course['name']);
        }

        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare("SELECT * FROM courses WHERE id = :id");
        $req->execute(array('id' => $id));
        $course = $req->fetch();

        return new Course($course['id'], $course['name']);
    }

    public function save()
    {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO courses (name) VALUES (:name)");
        $req->execute(array('name' => $this->name));
    }

    public function update()
    {
        $db = Db::getInstance();
        $req = $db->prepare("UPDATE courses SET name = :name WHERE id = :id");
        $req->execute(array('name' => $this->name, 'id' => $this->id));
    }

    public function delete()
    {
        $db = Db::getInstance();

        $req = $db->prepare("DELETE FROM enrollments WHERE course_id = :id");
        $req->execute(array('id' => $this->getId()));

        $req = $db->prepare("DELETE FROM courses WHERE id = :id");
        $req->execute(array('id' => $this->id));
    }
}
