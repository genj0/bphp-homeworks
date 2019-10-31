Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@genj0 
Learn Git and GitHub without any code!
Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.


1
00Evgeniy-Varlamov/bphp-homeworks
 Code Issues 0 Pull requests 0 Projects 0 Wiki Security Insights
bphp-homeworks/2.2-OOP/2.2.2/scripts/addUser.php
@Evgeniy-Varlamov Evgeniy-Varlamov 2.5-OOP__second-commit
a5b5f88 4 days ago
34 lines (27 sloc)  639 Bytes
  
<?php
include '../autoload.php';
include '../config/SystemConfig.php';
$name = NULL;
$email = NULL;
$password = NULL;
$rate = NULL;
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['rate'])) {
    $rate = (int)$_POST['rate'];
}
if (in_array(NULL, array($name, $email, $password, $rate))) {
    echo 'Произошла ошибка';
} else {
    header("Location: ../index.php");
    $add = new User($name, $email, $password, $rate);
    $add->addUserFromForm();    
}
?>
© 2019 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
