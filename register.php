<?php
session_start();

if (!empty($_SESSION['auth'])) {
    header('Location: /guestbook.php');
    die;
}

$config = require_once 'config.php';
$infoMessage = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $db = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['name']);

    if (!$db) {
        die('Помилка підключення до БД: ' . mysqli_connect_error());
    }

    $email    = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $check = mysqli_query($db, "SELECT id FROM users WHERE email='$email' LIMIT 1");

    if (mysqli_fetch_assoc($check)) {
        $infoMessage = 'Такий користувач вже існує! <a href="/login.php">Увійти</a>';
    } else {
        mysqli_query($db, "INSERT INTO users (email, password) VALUES ('$email', '$password')");
        mysqli_close($db);
        header('Location: /login.php');
        die;
    }

    mysqli_close($db);

} elseif (!empty($_POST)) {
    $infoMessage = 'Заповніть форму реєстрації!';
}
?>

<!DOCTYPE html>
<html>

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <?php require_once 'sectionNavbar.php' ?>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-success text-light">
            Форма реєстрації
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email"/>
                </div>
                <div class="form-group mb-3">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Зареєструватися"/>
                </div>
            </form>

            <?php if ($infoMessage): ?>
                <hr/>
                <span class="text-danger"><?= $infoMessage ?></span>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>