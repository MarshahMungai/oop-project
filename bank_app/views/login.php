<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include 'navbar.php'?>
    <h1>Login</h1>

    <?php if (isset($error) && $error !== ''): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="../public/login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>

    <script src="js/script.js"></script>
</body>
</html>
