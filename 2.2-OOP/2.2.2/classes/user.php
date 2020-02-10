<?php 

class User extends DataRecordModel
{
    public $name;
    public $email;
    public $password;
    public $rate;
    public $guid;

    function __construct($name = null, $email = null, $password = null, $rate = null, $guid = null) 
    {
        parent::__construct($guid);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->rate = $rate;
    }

    public function addUserFromForm() 
    {
        $this->commit();
    }

    public function removeUser()
    {
        $this->delete();
    }
}