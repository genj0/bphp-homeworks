<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file"  name="image">
            <button type="submit">Загрузить</button>
        </form>
        <p>Images</p>
        <p> 
    <?php
    define('PROTOCOL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
    define('DIRECTORY', preg_replace('/\/[a-z0-9-_\.]+\.php$/i', '/', $_SERVER['REQUEST_URI']));
    define('UPLOAD_DOMAIN', PROTOCOL . $_SERVER['SERVER_NAME'] . DIRECTORY . 'uploads');
    define('UPLOAD_PATH', __DIR__ . '/uploads');

    $images = scandir(UPLOAD_PATH);
    foreach ($images as $image) {
        if ($image === '.' || $image === '..') continue;
        echo '<span style="text-align:center; margin:10px"><img style="height:200px" src="' .
             UPLOAD_DOMAIN . "/$image\"></span>";
    }
    ?>
</p>
    </body>
</html>