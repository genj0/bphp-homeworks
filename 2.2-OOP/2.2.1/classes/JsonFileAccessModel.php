<?php
    class JsonFileAccessModel extends Config {
        protected $fileName;
        protected $file;
        public function __construct($fileName) {
            $this->fileName = parent::DATABASE_PATH.$fileName.'.json';
        }
        private function connect() {
            var_dump($this->file);
            if ($this->file == NULL) {
                if (fopen($this->fileName,'r+') == FALSE) {
                    echo 'error during opeining file';
                }else {                    
                    $this->file = fopen($this->fileName,'r+');
                } 
            } 
        }
        private function disconnect() {
            fclose($this->file);
        }
        public function read() {
            $this->connect();
            $text = fread($this->file,3000);
            if ($text !== FALSE) {
                $this->disconnect();
                return $text;
            }else {
                echo 'error during reading this file';
            }  
            
        }
        public function write($text) {
            if(fopen($this->file,'w+') !== FALSE);
            if(fwrite($this->file,$text)!== FALSE) echo 'Done';
            $this->disconnect();
        }
        public function readJson() {
            return json_encode($this->read());
        }
        public function writeJson($jsonObject){
            if(fopen($this->file,'w+') !== FALSE);
            if(fwrite($this->file,json_decode($jsonObject,JSON_PRETTY_PRINT))!== FALSE) echo 'Done';
            $this->disconnect();
        }
    }
    
?>