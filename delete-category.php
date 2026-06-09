<?php
/**provjera prijave korisnika */
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

$id = (int)$_GET['id'];

if(isset($_POST['confirm_delete'])) {

    $query = "DELETE FROM categories
              WHERE id=$id";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=11");
    exit;
}

$query = "SELECT * FROM categories
          WHERE id=$id";

$result = mysqli_query($MySQL, $query);

$row = mysqli_fetch_assoc($result);

?>

<h1>Brisanje kategorije</h1>

<p>
Jeste li sigurni da želite obrisati kategoriju:
<strong><?php echo $row['name']; ?></strong> ?
</p>

<form method="post">

    <input type="submit"
           name="confirm_delete"
           value="DA, obriši kategoriju">

</form>

<br>

<a href="index.php?menu=11">
NE, vrati se na kategorije
</a>