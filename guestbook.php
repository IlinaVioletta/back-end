<?php
session_start();

$config = require_once 'config.php';

$db = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['name']);

if (!$db) {
    die('Помилка підключення до БД: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['auth'])) {

    if (!empty($_POST['text'])) {
        $userId = (int) $_SESSION['user_id'];
        $text   = mysqli_real_escape_string($db, $_POST['text']);

        mysqli_query($db, "INSERT INTO comments (user_id, text) VALUES ($userId, '$text')");
    }
}

$result   = mysqli_query($db, "SELECT comments.id, comments.text, comments.date, users.email
                                FROM comments
                                JOIN users ON comments.user_id = users.id
                                ORDER BY comments.date DESC");
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($db);
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
            Гостьова книга
        </div>
        <div class="card-body">

            <?php if (!empty($_SESSION['auth'])): ?>
                <div class="row">
                    <div class="col-sm-6">
                        <form method="POST">
                            <div class="mb-3">
                                <textarea name="text" class="form-control" placeholder="Ваше повідомлення" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Надіслати</button>
                        </form>
                    </div>
                </div>
                <br>
            <?php else: ?>
                <p class="text-muted">Щоб залишити коментар, <a href="/login.php">увійдіть</a> або <a href="/register.php">зареєструйтесь</a>.</p>
            <?php endif; ?>

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Коментарі
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    <?php if (empty($comments)): ?>
                        <p class="text-muted">Коментарів ще немає.</p>
                    <?php endif; ?>

                    <?php foreach ($comments as $comment): ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="text-muted"><?= htmlspecialchars($comment['email']) ?></h6>
                                <p><?= htmlspecialchars($comment['text']) ?></p>
                                <small class="text-muted"><?= $comment['date'] ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>