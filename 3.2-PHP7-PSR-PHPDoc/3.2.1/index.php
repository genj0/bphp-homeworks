<?php
class Person 
{
    public $name;
    public $surname;
    public $patronymic;
    public $gender;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = -1;
    const GENDER_UNDEFINED = 0;
    
    public function __construct($name, $surname, $patronymic = null)
    {
        $this->name = $name; 
        $this->surname = $surname;
        $this->patronymic = ($patronymic != null) ? $patronymic : null;
        $patronymicEnding = mb_substr($patronymic, -3);
      
        if ($patronymicEnding == 'вич' || $patronymicEnding == 'ьич' || $patronymicEnding == 'тич' || $patronymicEnding == 'глы') {
            $this->gender = self::GENDER_MALE;
        } elseif ($patronymicEnding == 'вна' || $patronymicEnding == 'чна' || $patronymicEnding == 'шна' || $patronymicEnding == 'ызы') {
            $this->gender = self::GENDER_FEMALE; 
        } else {
            $this->gender = self::GENDER_UNDEFINED;
        }
    }
  
    public function getFio() 
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic . ' ';
    }
    public function getGender() 
    {
        switch ($this->gender) {
            case self::GENDER_MALE: 
                return 'male';
            case self::GENDER_UNDEFINED: 
                return 'undefined';
            case self::GENDER_FEMALE:
                return 'female';
        }
    }
    public function getGenderSymbol()
    {
        switch ($this->gender) {
            case self::GENDER_MALE: 
                return '♂';
            case self::GENDER_UNDEFINED: 
                return '😎';
            case self::GENDER_FEMALE:
                return '♀';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 3.2.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php $newPerson = new Person('Иван', 'Иванов'/*, 'Иванович'*/) ?>
    <h2><span class="gender-<?php echo $newPerson->getGender() ?>"><?php echo $newPerson->getGenderSymbol() ?></span> <?php echo $newPerson->getFio() ?></h2>
</body>
</html>