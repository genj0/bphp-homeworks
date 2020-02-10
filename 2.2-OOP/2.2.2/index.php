<?php

include 'autoload.php';
include 'config/SystemConfig.php';

?>

<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>

    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 400px;
        }

        label {
            padding: 10px;
        }

        button {
            width: 300px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action='formActions/addUser.php' method='POST'>
        <label>
            <span>Имя:</span>
            <input type='text' name='name' required>
        </label>
        <label>
            <span>Пароль:</span>
            <input type='text' name='password' required>
        </label>
        <label>
            <span>Электронная почта:</span>
            <input type='email' name='email' required>
        </label>
        <label>
            <span>Рейтинг:</span>
            <input type='text' name='rate' required>
        </label>
        <button>Добавить пользователя</button>
    </form>
    <?php
        $show = new Users;
        $show->displaySortedList();
    ?>
</body>
</html>