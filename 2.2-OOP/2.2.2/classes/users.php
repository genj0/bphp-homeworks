  
<?php
    class Users extends JsonDataArray {
      public function __construct() {
        parent::__construct();
      }
      public function displaySortedList(){
        $data = $this->newQuery()->orderBy('name');
        $users = $data->getObjs();
        $guids = $data->getGuids();
        
        foreach ($users as $index => $value) {
            echo "
                <ul>
                    <li>$value->name</li>
                    <li>email: $value->email</li>
                    <li>rate: $value->rate</li>
                </ul>
            ";
        }
      }
    }
?>