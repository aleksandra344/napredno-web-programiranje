<?php

/*provjera postojanja prijavljenog korisika*/
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

/*provjera klika na Dodaj kategoriju. dohvaća naziv kategorije
i sprema ga, kreira sql upit koji kreira novu kategoriju*/
if(isset($_POST['add'])) {

    $name = $_POST['name'];

    $query = "INSERT INTO categories (name)
              VALUES ('$name')";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=11");
    exit;
}

?>

<h1>Dodavanje kategorije</h1>

<form method="post">

    <label>Naziv kategorije:</label><br>
    <input type="text" name="name" required>

    <br><br>

    <input type="submit"
           name="add"
           value="Dodaj kategoriju">

</form>