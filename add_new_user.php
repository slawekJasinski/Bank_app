<?php
session_start();
if($_POST['email']!=$_POST['email2']){
  $error=1;
  $_SESSION['error']="Adresy sie roznia";
}
if($_POST['pass']!=$_POST['pass2']){
  $error=1;
  $_SESSION['error']="Hasła sie roznia";
}
if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['email2']) && !empty($_POST['pass2']) && !empty($_POST['bday'])){
  $error=0;
echo("Wypełniono wszystkie dane");
  if(isset($_POST['terms'])){
    echo 'ok';
  }else {
    $error = 1;
    $_SESSION['error'] = "Zaznacz pole z regulaminem";
    }
   if ($error==1) {
      ?>
      <script>
        history.back(); //skrypt z javascripta do zachowania historii wpisywanych danych
      </script>

      <?php
exit();
    }
}
else{
?>
  <script>
    history.back(); //skrypt z javascripta do zachowania historii wpisywanych danych

  </script>
<?php

}
require_once './connect.php';
if($conn -> connect_errno) {
  echo 'error';
  exit();
  $_SESSION['error'] = "Błędne połączenie z bazą danych";
  header('location:register.php');
}
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  //szyfrowanie hasła za pomoca argon2id
  $pass = password_hash($pass, PASSWORD_ARGON2ID);
  $birthday = $_POST['bday'];
  $city = 1;

$sql="INSERT INTO `user`(`imie`, `nazwisko`, `email`, `pass`, `birthday`,  `city_id`) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $surname, $email, $pass, $birthday, $city);
if($stmt->execute()){
  header('location:../index.php?register=success');
  $stmt->close();
  exit();
}else{
  //sprawdzenie, czy istnieje w bazie danych email podany przez uzytkownika
  $sql="select * from `user` where 'email'=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt -> execute();
if($conn->affected_rows==1){
 $_SESSION['error']="Podany adres juz jest w bazie";
 ?>
<script>
history.back()
</script>
<?php
}
  $stmt->close();
}
echo "ok";
?>
}
}