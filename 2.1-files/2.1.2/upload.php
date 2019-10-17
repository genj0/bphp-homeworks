<?php
function uploadImage($image)
{
    if ($image['error'] == UPLOAD_ERR_OK) {
        $tmpName = $image['tmp_name'];
        if (is_uploaded_file($tmpName)) {
            $pathParts = pathinfo($image['name']);
            if ($pathParts['extension'] != 'php') {
                move_uploaded_file($tmpName, __DIR__ . '/uploads' . '/' . $pathParts['basename']);
            }
        }
    }
};

uploadImage($_FILES['image']);
define('PROTOCOL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
define('DIRECTORY', preg_replace('/\/[a-z0-9-_\.]+\.php$/i', '/', $_SERVER['REQUEST_URI']));
define('TASK_DOMAIN', PROTOCOL . $_SERVER['SERVER_NAME'] . DIRECTORY);

header('Location:' . DIRECTORY);                                                              
?>
