<h1>Galerija</h1>

<p>
Pregled fitness vježbi i treninga.
</p>

<?php

$query = "SELECT id, title, picture
          FROM exercises
          WHERE picture <> ''";

$result = mysqli_query($MySQL, $query);

echo '<div class="gallery-grid">';

while($row = mysqli_fetch_assoc($result)) {

    echo '<div class="gallery-item">';

    echo '<a href="index.php?menu=21&id=' .
         $row['id'] .
         '">';

    echo '<img src="images/' .
         $row['picture'] .
         '" alt="' .
         htmlspecialchars($row['title']) .
         '">';

    echo '</a>';

    echo '<h3>' .
         htmlspecialchars($row['title']) .
         '</h3>';

    echo '</div>';
}

echo '</div>';

?>