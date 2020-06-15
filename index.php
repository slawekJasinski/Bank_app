<?php include('connect.php');
session_start();
?>
<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <title>KAS Bank - logowanie</title>
    <link rel="stylesheet" href="css/index.css" type="text/css">
  </head>

  <body>
    <nav>
      <a href="admin/index.php">Zaloguj jako <span style="color: #fff;">administrator</span></a>

      
    </nav>

    <form class="box" action="login.php" method="post">
      <?php
        if (isset($_SESSION['error'])) {
      
          echo <<<ERROR
            
            <h3 style="color: red;">{$_SESSION['error']}</h3>
              
          ERROR;
          unset($_SESSION['error']);
        }
      ?>
      <h1>Zaloguj się</h1>

      <label for="login">
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
      </label>

      <input type="email" name="login" id="login" placeholder="Login" autocomplete="off" required="required" onfocus="this.placeholder=''" onblur="this.placeholder='Login'">

      <label for="password">
        <div class="icon">
          <i class="fas fa-lock"></i>
        </div>
      </label>

      <input type="password" name="password" id="password" placeholder="Hasło" required="required" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'">
      <input type="submit" name="" value="Zaloguj">
    </form>
  </body>
</html>