<?php

function uploadImage($image) 
{   
    $name = $image['name'];
    $tmpName = $image['tmp_name'];
    foreach ($_FILES ['image']['error'] as $key => $error)
    {
        if($error==UPLOAD_ERR_OK){
            $tmpName=$_FILES['image']['tmp_name'][$key];
            if(is_uploaded_file($tmpName)){
                $pathParts=pathinfo($_FILES['image']['name'][$key]);
                if($pathParts['extension']!='php'){
                move_uploaded_file($tmpName, "/uploads".'/'.$pathParts['basename']);
                }
            }
        }
    }      
    move_uploaded_file($tmpName, "/uploads" . $name);   
};

uploadImage($_FILES['image']);

                                                                           
?>
