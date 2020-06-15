<?php
session_start();
$id=$_SESSION['id'];
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
//wybór typu reklamacji
//varchar - temat reklamacji(40 znaków)
//varchar - tekst reklamacji(nieograniczony)
?>
<form action="plik2.php" method="POST" ENCTYPE="multipart/form-data">
    <select name="typ_reklamacji">
        <option name = "1">Reklamacja</option>
        <option name = "2">Zgłoszenie</option>
    </select><br>
    <input type="text" name="rekl1" placeholder="Temat reklamacji"><br>
    <input type="textarea" name="rekl2" rows="10" cols="30" placeholder="Tekst reklamacji"><br>
    <input type="file" name="plik"><br>
    <input type="submit" value="Przekaż"><br>
</form>