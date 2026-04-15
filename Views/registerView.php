<!DOCTYPE html>
<html>

<?php require_once __DIR__ . '/../sectionHead.php'; ?>

<body>

<div class="container">

    <?php require_once __DIR__ . '/../sectionNavbar.php'; ?>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-success text-light">
            Форма реєстрації
        </div>
        <div class="card-body">
            <form method="post" action="/register">
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

            <?php if (!empty($infoMessage)): ?>
                <hr/>
                <span class="text-danger"><?= $infoMessage ?></span>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>