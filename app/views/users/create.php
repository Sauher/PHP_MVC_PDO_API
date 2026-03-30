<?php require_once __DIR__ . '/../shared/header.php'; ?>
    <main class="container mt-5">

        <h2>Új felhasználó létrehozása</h2>
        <form action="http://localhost/2026/PHP_MVC_PDO_API/public/users/store" method="POST">
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Jelszó</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Létrehozás</button>
        </form>

    </main>

<?php require_once __DIR__ . '/../shared/footer.php'; ?>
