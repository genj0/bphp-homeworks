<?php

include 'const.php';

$login = (isset($_POST['login'])) ? $_POST['login'] : null;
$password = (isset($_POST['password'])) ? $_POST['password'] : null;
$error = '';

try {
    $user = new user($login, $password, $query);
    $user->checkUser();
} catch (Exception $e) {
    $error = $e->getMessage();
}

include 'header.php';
    
?>

        <div class="wrap wrap-login">
            <header>
                <h1 class="title">Информационная система «Бюро переводов»</h1>
            </header>
            <div class="form">
                <span><?php echo $error ?></span>
                <form method='POST'>
                    <div class="form-group login">
                        <label>
                            <span>Логин:</span>
                            <input type='text' name='login' required>
                        </label>
                        <label>
                            <span>Пароль:</span>
                            <input type='text' name='password' required>
                        </label>
                        <button>Войти</button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="copyright login-footer">
            <p>© 2020 Геннадий Кварацхелия</p>
        </footer>
    </div>
</body>
</html>