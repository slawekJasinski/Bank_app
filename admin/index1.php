<?php include('../connect.php');
session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KAS Bank - logowanie Administratora</title>
    </head>

    <body>
        <form action="../admin_login.php" method="post">
            <input type="email" name="login" required>
            <br/>
            <input type="password" name="password" required>
            <br/>
            <button type="submit">login</button>
        </form>
    </body>
</html>