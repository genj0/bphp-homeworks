<?php

class data extends Config
{
    protected $filename;

    public function __construct()
    {
        $this->filename = parent::DATABASE_PATH;        
    }

    protected function connect($mode) {
        $this->data = fopen($this->filename, $mode);
    }

    protected function disconnect() {
        fclose($this->data);
    }

    public function read() {
        $this->connect('r+');
        $text = fread($this->data, filesize($this->filename));
        $this->disconnect();
        return $text;
    }

    public function write($write_text) {
        $this->connect('w+');
        fwrite($this->data, $write_text);
        $this->disconnect();
    }

    public function readJson() {
        return json_decode($this->read());
    }

    public function writeJson($write_json) {
        $this->connect('w+');
        fwrite($this->data, json_encode($write_json, JSON_PRETTY_PRINT));
        $this->disconnect();
    }
}