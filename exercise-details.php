<?php

$id = (int)$_GET['id'];

$query = "SELECT e.*, c.name AS category_name
          FROM exercises e
          LEFT JOIN categories c
          ON e.category_id = c.id
          WHERE e.id = $id";

$result = mysqli_query($MySQL, $query);

$row = mysqli_fetch_assoc($result);

?>

<h1><?php echo htmlspecialchars($row['title']); ?></h1>

<?php

if($row['picture'] != "") {

    echo '<img src="images/' . $row['picture'] . '"
              width="300"><br><br>';
}

?>

<p>

<b>Kategorija:</b>
<?php echo htmlspecialchars($row['category_name']); ?>

<br><br>

<b>Težina:</b>
<?php echo htmlspecialchars($row['difficulty']); ?>

<br><br>

<b>Trajanje:</b>
<?php echo $row['duration']; ?> min

<br><br>

<b>Mišićna skupina:</b>
<?php echo htmlspecialchars($row['muscle_group']); ?>

</p>

<h3>Opis</h3>

<p>
<?php echo nl2br(htmlspecialchars($row['description'])); ?>
</p>

<p>
<a  class="back-link"
    href="index.php?menu=2">
Povratak na vježbe
</a>
</p>