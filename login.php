<?php
session_start();


$backgroundImage = 'images/login.jpg';


define('USERNAME', 'admin');
define('PASSWORD', 'password123');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === USERNAME && $password === PASSWORD) {
        $_SESSION['loggedin'] = true;
        header('Location: manage.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <style>
        
        body {
            background: url('<?php echo $backgroundImage; ?>') no-repeat center center/cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <?php include 'header.inc'; ?>
    <?php include 'menu.inc'; ?>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <?php include 'footer.inc'; ?>
</body>
</html>
