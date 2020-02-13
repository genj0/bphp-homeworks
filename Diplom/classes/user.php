<?php

class user
{
    public function __construct($login = null, $password = null, $query)
    {
        $this->login = $login;
        $this->password = $password;
        $this->query = $query;
    }

    public function checkUser() 
    {
        foreach ($this->query->data_employeers as $key => $value) {
            if ($this->login === null || $this->password === null) {
                return false;
            }

            if ($this->login === $value->login && $this->password === $value->password) {
                $_SESSION['employee_id'] = $key;
                $_SESSION['login'] = $value->login;
                $_SESSION['employee'] = $value->employee;
                header('Location: ./index.php');
                return true;
            }
        }

        throw new Exception('Неверные логин или пароль');
    }
}