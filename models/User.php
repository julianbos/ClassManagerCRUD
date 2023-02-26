<?php

class User
{
    private $id;
    private $username;
    private $password;

    public function __construct($id = null, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function save()
    {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $req->execute(
            array(
                'username' => $this->getUsername(),
                'password' => $this->getPassword()
            )
        );
    }

    public static function findByUsername($username)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $user = $req->fetch();

        if (!$user) {
            return null;
        }

        return new User($user['id'], $user['username'], $user['password']);
    }

    public static function findById($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE id = :id');
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        if (!$user) {
            return null;
        }

        return new User($user['id'], $user['username'], $user['password']);
    }
}
