<!-- views/register.html -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <!-- Add CSS stylesheets and other necessary meta tags and scripts -->
</head>
<body>
<?php include 'navbar.php'?>
    <!-- Registration Form -->
    <h2>User Registration</h2>
    <form method="POST" action="../public/register.php">
        <div>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div>
            <input type="email" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <div>
        <button type="submit" name="register">Signup</button>
        </div>
    </form>

    <!-- Add CSS styles for the page -->
</body>
</html>
