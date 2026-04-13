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

    $result = mysqli_query($db, "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1");
    $user   = mysqli_fetch_assoc($result);

    mysqli_close($db);

    if ($user) {
        $_SESSION['auth']    = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email']   = $user['email'];
        header('Location: /guestbook.php');
        die;
    } else {
        $infoMessage = 'Невірний email або пароль. <a href="/register.php">Зареєструватися</a>';
    }

} elseif (!empty($_POST)) {
    $infoMessage = 'Заповніть форму входу!';
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
        <div class="card-header bg-primary text-light">
            Форма входу
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
                    <input type="submit" class="btn btn-primary" value="Увійти"/>
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