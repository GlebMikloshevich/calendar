<?php


class Auth
{
    private $login;
    private $password;
    private $error = false;
    private $message = '';
    public function execute($array)
    {
        $error = false;
        $this->login = '';
        $this->password = '';
        $this->login = filter_var(trim($array['login']), FILTER_SANITIZE_STRING);
        $this->password = filter_var(trim($array['password']), FILTER_SANITIZE_STRING);
        $this->password = md5($this->password);
        $this->login_in();

        if (!$this->error) {
            Session::forget('auth_error');
            Session::forget('auth_msg');
        } else {
            Session::set('auth_error', true);
            Session::set('auth_msg', $this->message);
        }
    }

    private function login_in() {
        $sql = Database::get_pdo()->prepare('SELECT `login`, `id` FROM `users` WHERE `login` = :login AND `password` = :password LIMIT 1');
        $values = [
            'login' => $this->login,
            'password' => $this->password
        ];
        $sql->execute($values);
        $found_values = $sql->fetchAll();
        if (empty($found_values)) {
            $this->error = true;
            $this->message = 'Ошибка! Неправильный логин или пароль';

        } else {
            $member = new Member();
            $member->init($found_values[0]['login'], $found_values[0]['id']);
            Session::set('user', $member);
        }
    }

    public function getError(): bool
    {
        return $this->error;
    }

    public function getMessage() :string
    {
        return $this->message;
    }

}