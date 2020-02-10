<?php

class Users extends JsonDataArray
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function displaySortedList() 
    {
        $data = $this->newQuery()->orderBy('name');
        $users = $data->getObjs();
        $guids = $data->getGuids();
        
        foreach ($users as $index => $value) {
            echo "
                <ul>
                    <li>$value->name</li>
                    <li>email: $value->email</li>
                    <li>rate: $value->rate</li>
                    <a href='formActions/removeUser.php?value=$guids[$index]'>Удалить пользователя</a>
                </ul>
            ";
        }
    }
}