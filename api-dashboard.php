<?php
/*Provjera priajve korisnika*/
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

/* ukupan broj vježbi, samo nearhivirane vježbe */

$query = "SELECT COUNT(*) AS total
          FROM exercises
          WHERE archive='N'";

$result = mysqli_query($MySQL, $query);
$total = mysqli_fetch_assoc($result)['total'];

/* broj početničkih vježbi */

$query = "SELECT COUNT(*) AS total
          FROM exercises
          WHERE difficulty='Početnik'
          AND archive='N'";

$result = mysqli_query($MySQL, $query);
$beginner = mysqli_fetch_assoc($result)['total'];

/* broj srednje teških vježbi */

$query = "SELECT COUNT(*) AS total
          FROM exercises
          WHERE difficulty='Srednje'
          AND archive='N'";

$result = mysqli_query($MySQL, $query);
$medium = mysqli_fetch_assoc($result)['total'];

/* broj naprednih vježbi */

$query = "SELECT COUNT(*) AS total
          FROM exercises
          WHERE difficulty='Napredno'
          AND archive='N'";

$result = mysqli_query($MySQL, $query);
$advanced = mysqli_fetch_assoc($result)['total'];

?>

<h1>FitLife API Dashboard</h1>

<div class="api-cards">

    <div class="api-card">
        <h3>Ukupno vježbi</h3>
        <p><?php echo $total; ?></p>
    </div>

    <div class="api-card">
        <h3>Početnik</h3>
        <p><?php echo $beginner; ?></p>
    </div>

    <div class="api-card">
        <h3>Srednje</h3>
        <p><?php echo $medium; ?></p>
    </div>

    <div class="api-card">
        <h3>Napredno</h3>
        <p><?php echo $advanced; ?></p>
    </div>

</div>

<div class="api-links">

    <a href="api-exercise.php"
       target="_blank"
       class="admin-link">
       JSON API
    </a>

    <a href="api-exercises-xml.php"
       target="_blank"
       class="admin-link">
       XML API
    </a>

</div>

<h2>Pregled vježbi</h2>

<table class="admin-table">

<tr>
    <th>ID</th>
    <th>Naziv</th>
    <th>Težina</th>
    <th>Trajanje</th>
    <th>Mišićna skupina</th>
</tr>

<?php

$query = "SELECT *
          FROM exercises
          WHERE archive='N'
          ORDER BY id";

$result = mysqli_query($MySQL, $query);

while($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";

    echo "<td>".$row['id']."</td>";

    echo "<td>".
         htmlspecialchars($row['title']).
         "</td>";

    echo "<td>".
         htmlspecialchars($row['difficulty']).
         "</td>";

    echo "<td>".
         $row['duration']." min".
         "</td>";

    echo "<td>".
         htmlspecialchars($row['muscle_group']).
         "</td>";

    echo "</tr>";
}

?>

</table>