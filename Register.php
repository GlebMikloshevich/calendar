<?php

class Register
{
    private $message;
    private $error;
    private $login;
    private $pass;

    public function init($array) {
        $this->error = false;
        $this->login = filter_var(trim($array['login']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
        $this->pass = md5(filter_var(trim($array['pass']), FILTER_SANITIZE_STRING));
        $this->validate();
        if (!$this->error) {
            Session::forget('reg_error');
            Session::forget('reg_msg');
            $this->send();
        } else {
            Session::set('reg_error', true);
            Session::set('reg_msg', $this->message);
        }
    }


    private function validate() {
        if (mb_strlen($this->login) < 3 || mb_strlen($this->login) > 90){
            $this->error = true;
            $this->message =  'Логин слишком короткий!';
            return;
        }

        $find_sql = Database::get_pdo()->prepare('SELECT `login` FROM `users` WHERE `login` = :login');
        $find_sql->bindParam(':login', $this->login);
        $find_sql->execute();
        $found_values = $find_sql->fetchAll();

        if (!empty($found_values)){
            $this->error = true;
            $this->message =  'Такой логин уже существует!';
        }
    }


    private function send() {
        $sql = Database::get_pdo()->prepare('INSERT INTO `users`  (login, password) VALUES (:login, :pass)');
        $values = [
            'login' => $this->login,
            'pass' => $this->pass
        ];
        $sql->execute($values);
    }


    public function getMessage(){
        return $this->message;
    }


    public function getError() {
        return $this->error;
    }
}