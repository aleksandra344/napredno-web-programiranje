<?php
/*Provjera prijave korisnika*/
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

echo "<h1>Administracija</h1>";
/*Admin izbornik sa poveznicama*/
echo '
<div class="admin-menu">

    <a href="index.php?menu=11" class="admin-link">
        Kategorije
    </a>

    <a href="index.php?menu=15" class="admin-link">
        Vježbe
    </a>

    <a href="index.php?menu=22" class="admin-link">
        Fitness alati
    </a>

</div>
';
/*Dohvaćanje korisnika iz baze, izvršavanje upita*/
$query = "SELECT * FROM users";
$result = mysqli_query($MySQL, $query);

echo '<table class="admin-table">';
/*Kreiranje tablice za prikaz korisnika*/
echo '
<tr>
    <th>ID</th>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Email</th>
    <th>Korisničko ime</th>
    <th>Država</th>
    <th>Uredi</th>
    <th>Obriši</th>
</tr>';
/*Prolaz korz sve korisnike za ispis osobnih podataka,
sprečavanje HTML oznaka i potencijalnih napada*/
while($row = mysqli_fetch_assoc($result)) {

    echo '<tr>';

    echo '<td>' . $row['id'] . '</td>';

    echo '<td>' .
         htmlspecialchars($row['firstname']) .
         '</td>';

    echo '<td>' .
         htmlspecialchars($row['lastname']) .
         '</td>';

    echo '<td>' .
         htmlspecialchars($row['email']) .
         '</td>';

    echo '<td>' .
         htmlspecialchars($row['username']) .
         '</td>';

    echo '<td>' .
         htmlspecialchars($row['country']) .
         '</td>';

    echo '

    <td>
        <a class="edit-btn"
           href="index.php?menu=9&id=' . $row['id'] . '">
           Uredi
        </a>
    </td>';

    echo '
    
    <td>
        <a class="delete-btn"
           href="index.php?menu=10&id=' . $row['id'] . '"
           onclick="return confirm(\'Jeste li sigurni?\')">
           Obriši
        </a>
    </td>';

    echo '</tr>';
}

echo '</table>';

?>