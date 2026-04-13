<?php
session_start();
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
            Головна сторінка
        </div>
        <div class="card-body">
            <h5 class="card-title">Вітаємо на головній сторінці!</h5>
            <p class="card-text">Це простий приклад веб-додатку з аутентифікацією та гостьовою книгою.</p>
            <a href="/guestbook.php" class="btn btn-primary">Перейти до гостьової книги</a>
        </div>
    </div>
</div>

</body>
</html>
