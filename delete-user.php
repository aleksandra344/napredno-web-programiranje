<?php
/**provjera prijave korisnika */
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}
/**provjera postoji li korisnik */
if(!isset($_GET['id'])) {
    header("Location: index.php?menu=8");
    exit;
}

$id = (int)$_GET['id'];

$query = "DELETE FROM users
          WHERE id = $id";

mysqli_query($MySQL, $query);

header("Location: index.php?menu=8");

?>