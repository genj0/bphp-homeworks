  
<?php
  class JsonFileAccessModel extends Config {
    protected $fileName;
    protected $file;
    public function __construct($fName) {
      $this->fileName = $_SERVER['DOCUMENT_ROOT'] . '/2.2-OOP/2.2.2' . parent::DATABASE_PATH . $fName . '.json';
    }
    private function connect($method) {
        if (fopen($this->fileName, $method) == FALSE ) {
          echo "<br> Открытие файла - ОШИБКА";
        } else {
          $this->file = fopen($this->fileName, $method);
          echo "<br> Открытие файла - ОК";
        }
    }
    
    private function disconnect() {
      fclose($this->file);
    } 
    public function read() {
      $this->connect("r+");
      $text = fread($this->file, filesize($this->fileName));
      if ($text !== FALSE) {
        $this->disconnect();
        echo "<br> Чтение файла - ОК";
        return $text;
      } else {
        echo "<br> Чтение файла - ОШИБКА";
      }
    }
    public function write($text) {
      $this->connect("w+");
      if (fwrite($this->file, $text) !== FALSE) {
        $this->disconnect();
        echo "<br> Запись в файла - ОК";
      } else {
        echo "<br> Запись в файла - ОШИБКА";
      }
    }
    public function readJson() {
      return json_decode($this->read());
    }
    public function writeJson($jsonObj) {
      $this->connect("w+");
      if (fwrite($this->file, json_encode($jsonObj, JSON_PRETTY_PRINT)) !== FALSE) {
        $this->disconnect();
        echo "<br> Запись в файла JSON - ОК";
      } else {
        echo "<br> Запись в файла JSON - ОШИБКА";
      }
    }
  }
?>