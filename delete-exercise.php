<?php

if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

$id = (int)$_GET['id'];

if(isset($_POST['confirm_delete'])) {

    $query = "SELECT * FROM exercises
              WHERE id=$id";

    $result = mysqli_query($MySQL, $query);

    $row = mysqli_fetch_assoc($result);

    if($row['picture'] != "") {

        unlink("images/" . $row['picture']);
    }

    $query = "DELETE FROM exercises
              WHERE id=$id";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=15");
    exit;
}

$query = "SELECT * FROM exercises
          WHERE id=$id";

$result = mysqli_query($MySQL, $query);

$row = mysqli_fetch_assoc($result);

?>

<h1>Brisanje vježbe</h1>

<p>
Jeste li sigurni da želite obrisati vježbu:
<strong><?php echo $row['title']; ?></strong> ?
</p>

<form method="post">

    <input type="submit"
           name="confirm_delete"
           value="DA, obriši vježbu">

</form>

<br>

<a href="index.php?menu=15">
NE, vrati se na vježbe
</a>