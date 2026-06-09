<?php
/**konekcija na bazu i definiranje json formata */
include("dbconn.php");

header("Content-Type: application/json");

$query = "SELECT
            id,
            title,
            difficulty,
            duration,
            muscle_group
          FROM exercises
          WHERE archive='N'";

$result = mysqli_query($MySQL, $query);

$exercises = array();

while($row = mysqli_fetch_assoc($result)) {

    $exercises[] = $row;
}
/**pretavranje u json sa dijakritikama */
echo json_encode(
    $exercises,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

?>