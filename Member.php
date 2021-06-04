<?php


class Member
{
    private $name;
    private $isLogged = false;
    private $id;

    public function init($login, $id) {
        $this->isLogged = true;
        $this->name = $login;
        $this->id = $id;
    }

    public function logOut(){
        Session::forget('user');
    }

    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }
}