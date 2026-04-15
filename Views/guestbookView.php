<!DOCTYPE html>
<html lang="uk">
<?php require_once __DIR__ . '/../sectionHead.php'; ?>

<body>

<div class="container">
    <?php require_once __DIR__ . '/../sectionNavbar.php'; ?>
    <br>

    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Гостьова книга
        </div>
        <div class="card-body">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($isAuth)): ?>
                <div class="row">
                    <div class="col-sm-6">
                        <form method="POST" action="/guestbook">
                            <div class="mb-3">
                                <textarea name="text" class="form-control" placeholder="Ваше повідомлення" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Надіслати</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-muted">
                    Щоб залишити коментар,
                    <a href="/login">увійдіть</a>
                    або
                    <a href="/registe">зареєструйтесь</a>.
                </p>
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
                                <h6 class="text-muted">
                                    <?= htmlspecialchars($comment['email']) ?>
                                </h6>
                                <p><?= htmlspecialchars($comment['text']) ?></p>
                                <small class="text-muted">
                                    <?= htmlspecialchars($comment['date']) ?>
                                </small>
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