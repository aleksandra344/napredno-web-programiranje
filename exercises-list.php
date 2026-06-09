<?php

echo "<h1>Vježbe</h1>";

echo '<form method="get">';

echo '<input type="hidden" name="menu" value="2">';

echo '<label>Kategorija:</label><br>';

echo '<select name="category">';

echo '<option value="">Sve kategorije</option>';

$query_cat = "SELECT * FROM categories ORDER BY name";
$result_cat = mysqli_query($MySQL, $query_cat);

while($cat = mysqli_fetch_assoc($result_cat)) {

    $selected = '';

    if(isset($_GET['category']) &&
       $_GET['category'] == $cat['id']) {

        $selected = 'selected';
    }

    echo '<option value="' . $cat['id'] . '" ' . $selected . '>';
    echo $cat['name'];
    echo '</option>';
}

echo '</select>';

echo '<br><br>';

echo '<label>Pretraži vježbu:</label><br>';

echo '<input type="text"
             name="search"
             value="' .
             (isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '') .
             '">';

echo '<br><br>';

echo '<input type="submit" value="Filtriraj">';

echo '</form>';

echo '<br><br>';

/* SQL upit */

$query = "SELECT e.*,
                 c.name AS category_name
          FROM exercises e
          LEFT JOIN categories c
          ON e.category_id = c.id
          WHERE e.archive='N'";

if(isset($_GET['category']) &&
   $_GET['category'] != '') {

    $category_id = (int)$_GET['category'];

    $query .= " AND e.category_id=$category_id";
}

if(isset($_GET['search']) &&
   $_GET['search'] != '') {

    $search = mysqli_real_escape_string(
        $MySQL,
        $_GET['search']
    );

    $query .= " AND e.title LIKE '%$search%'";
}

$query .= " ORDER BY e.title";

$result = mysqli_query($MySQL, $query);

echo '<div class="exercise-grid">';

while($row = mysqli_fetch_assoc($result)) {

    echo '<div class="exercise-card">';

    if($row['picture'] != '') {

        echo '<img src="images/' .
             htmlspecialchars($row['picture']) .
             '" alt="' .
             htmlspecialchars($row['title']) .
             '">';
    }

    echo '<h3>' .
         htmlspecialchars($row['title']) .
         '</h3>';

    echo '<p>';

    echo '<strong>Kategorija:</strong> ' .
         htmlspecialchars($row['category_name']);

    echo '<br>';

    echo '<strong>Težina:</strong> ' .
         htmlspecialchars($row['difficulty']);

    echo '<br>';

    echo '<strong>Trajanje:</strong> ' .
         htmlspecialchars($row['duration']) .
         ' min';

    echo '</p>';

    echo '<a href="index.php?menu=19&id=' .
         $row['id'] .
         '">Više...</a>';

    echo '</div>';
}

echo '</div>';

?>