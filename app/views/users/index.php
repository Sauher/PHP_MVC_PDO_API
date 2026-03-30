<?php require_once __DIR__ . '/../shared/header.php'; ?>
    <main class="container mt-5">

        <h2>Felhasználók listája</h2>
        <a href="http://localhost/2026/PHP_MVC_PDO_API/public/users/create" class="btn btn-primary">Új felhasználó</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="/users/edit/<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/users/destroy/<?php echo $user['id']; ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

<?php require_once __DIR__ . '/../shared/footer.php'; ?>
