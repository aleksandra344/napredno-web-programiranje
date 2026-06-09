<?php

if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

$id = (int)$_GET['id'];

if(isset($_POST['update'])) {

    $name = $_POST['name'];

    $query = "UPDATE categories
              SET name='$name'
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

<h1>Uređivanje kategorije</h1>

<form method="post">

    <label>Naziv kategorije:</label><br>

    <input type="text"
           name="name"
           value="<?php echo $row['name']; ?>"
           required>

    <br><br>

    <input type="submit"
           name="update"
           value="Spremi promjene">

</form>