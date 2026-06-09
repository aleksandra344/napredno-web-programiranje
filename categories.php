<?php
/**provjera prijavljenog korisnika */
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

echo "<h1>Kategorije</h1>";
/**glavni okvir za oblikovanje sadržaja */
echo '<div class="contact-box">';
/**admin izbornik */
echo '
<div class="admin-menu">

    <a href="index.php?menu=12"
       class="admin-link">
       Dodaj novu kategoriju
    </a>

</div>
';
/**dohvaćanje kategorija iz baze */
$query = "SELECT * FROM categories";
$result = mysqli_query($MySQL, $query);

echo '<table class="admin-table">';

echo '
<tr>
    <th>ID</th>
    <th>Naziv</th>
    <th>Uredi</th>
    <th>Obriši</th>
</tr>';

while($row = mysqli_fetch_assoc($result)) {

    echo '<tr>';

    echo '<td>' . $row['id'] . '</td>';

    echo '<td>' .
         htmlspecialchars($row['name']) .
         '</td>';

    echo '
    <td>
        <a class="edit-btn"
           href="index.php?menu=13&id=' . $row['id'] . '">
           Uredi
        </a>
    </td>';

    echo '
    <td>
        <a class="delete-btn"
           href="index.php?menu=14&id=' . $row['id'] . '"
           onclick="return confirm(\'Jeste li sigurni?\')">
           Obriši
        </a>
    </td>';

    echo '</tr>';
}

echo '</table>';

echo '</div>';

?>