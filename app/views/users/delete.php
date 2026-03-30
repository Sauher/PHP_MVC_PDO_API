<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Felhasználó törlése</h2>
    <p>Biztosan törölni szeretné a következő felhasználót?</p>
    <ul>
        <li>ID: <?php echo $user['id']; ?></li>
        <li>Név: <?php echo $user['name']; ?></li>
        <li>Email: <?php echo $user['email']; ?></li>
    </ul>
    <form action="http://localhost/2026/PHP_MVC_PDO_API/public/users/destroy/<?php echo $user['id']; ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Törlés megerősítése</button>
    </form>

</body>
</html>