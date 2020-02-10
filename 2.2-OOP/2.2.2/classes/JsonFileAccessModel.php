<?php

class JsonFileAccessModel extends FileAccessModel
{   
    function __construct($filename) 
    {
        parent::__construct($filename);
    }
    
    public function readJson() {
        return json_decode($this->read());
    }

    public function writeJson($write_json) {
        $this->connect('w+');
        fwrite($this->file, json_encode($write_json, JSON_PRETTY_PRINT));
        $this->disconnect();
    }
}