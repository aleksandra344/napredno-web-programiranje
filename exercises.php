<?php

if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

echo "<h1>Vježbe</h1>";

echo '<div class="contact-box">';

echo '
<div class="admin-menu">

    <a href="index.php?menu=16"
       class="admin-link">
       Dodaj novu vježbu
    </a>

</div>
';

$query = "SELECT * FROM exercises";
$result = mysqli_query($MySQL, $query);

echo '<table class="admin-table">';

echo '
<tr>
    <th>ID</th>
    <th>Naziv</th>
    <th>Težina</th>
    <th>Trajanje</th>
    <th>Mišićna skupina</th>
    <th>Uredi</th>
    <th>Obriši</th>
</tr>';

while($row = mysqli_fetch_assoc($result)) {

    echo '<tr>';

    echo '<td>' . $row['id'] . '</td>';

    echo '<td>' .
         htmlspecialchars($row['title']) .
         '</td>';

    echo '<td>' .
         htmlspecialchars($row['difficulty']) .
         '</td>';

    echo '<td>' .
         $row['duration'] .
         ' min</td>';

    echo '<td>' .
         htmlspecialchars($row['muscle_group']) .
         '</td>';

    echo '
    <td>
        <a class="edit-btn"
           href="index.php?menu=17&id=' . $row['id'] . '">
           Uredi
        </a>
    </td>';

    echo '
    <td>
        <a class="delete-btn"
           href="index.php?menu=18&id=' . $row['id'] . '"
           onclick="return confirm(\'Jeste li sigurni?\')">
           Obriši
        </a>
    </td>';

    echo '</tr>';
}

echo '</table>';

echo '</div>';

?>