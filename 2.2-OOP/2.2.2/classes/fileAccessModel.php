<?php

class FileAccessModel extends Config
{
    protected $filename;
    protected $file;

    function __construct($filename) 
    {
        $this->filename = $_SERVER['DOCUMENT_ROOT'] . '/2.2-OOP/2.2.2' . parent::DATABASE_PATH . $filename . '.json';
    }

    protected function connect($mode) {
        $this->file = fopen($this->filename, $mode);
    }

    protected function disconnect() {
        fclose($this->file);
    }

    public function read() {
        $this->connect('r+');
        $text = fread($this->file, 3000);
        $this->disconnect();
        return $text;
    }

    public function write($write_text) {
        $this->connect('w+');
        fwrite($this->file, $write_text);
        $this->disconnect();
    }
}