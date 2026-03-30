<?php require_once __DIR__ . '/../shared/header.php'; ?>
    <main class="container mt-5">

        <h2>Felhasználó módosítása</h2>
        <form action="http://localhost/2026/PHP_MVC_PDO_API/public/users/update/<?php echo $user['id']; ?>" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Módosítás</button>
        </form>

    </main>

<?php require_once __DIR__ . '/../shared/footer.php'; ?>
