<?php
$max_rozmiar = 1024*1024;
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
    } else {
        echo 'Odebrano plik. Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        if (isset($_FILES['plik']['type'])) {
            echo 'Typ: '.$_FILES['plik']['type'].'<br/>';
        }
        move_uploaded_file($_FILES['plik']['tmp_name'],
            $_SERVER['DOCUMENT_ROOT'].'/pliki/'.$_FILES['plik']['name']);
    }
} else {
    echo 'Błąd przy przesyłaniu danych!';
}
$sql = "INSERT INTO `sprawy`(`id_klienta`, `id_typu_sprawy`, `id_statusu_sprawy`, `temat_sprawy`, `tresc_sprawy`, `zalacznik`) VALUES (?,?,?,?,?,?)"
?>
