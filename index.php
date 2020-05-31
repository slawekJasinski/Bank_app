<?php include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>KAS Bank</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <form class="box" action="login.php" method="post">
      <h1>Zaloguj się</h1>

      <div class="iconn">
        <i class="fas fa-user"></i>
      </div>
      
      <input type="email" name="login" placeholder="Login" required="required" onfocus="this.placeholder=''" onblur="this.placeholder='Login'">

      <div class="iconn">
        <i class="fas fa-lock"></i>
      </div>

      <input type="password" name="password" placeholder="Hasło" required="required" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
      <input type="submit" name="" value="Zaloguj">
    </form>

  </body>
</html>