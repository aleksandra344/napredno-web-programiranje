<?php

include("dbconn.php");
/**definiranje xml formata */
header("Content-Type: text/xml; charset=UTF-8");
/**xml deklaracija */
echo '<?xml version="1.0" encoding="UTF-8"?>';

echo '<exercises>';
/**glavni xml elementi */
$query = "SELECT
            id,
            title,
            difficulty,
            duration,
            muscle_group
          FROM exercises
          WHERE archive='N'";

$result = mysqli_query($MySQL, $query);
/**prolazak kroz rezultate sql upita */
while($row = mysqli_fetch_assoc($result)) {

    echo '<exercise>';

    echo '<id>' .
         $row['id'] .
         '</id>';

    echo '<title>' .
         htmlspecialchars($row['title']) .
         '</title>';

    echo '<difficulty>' .
         htmlspecialchars($row['difficulty']) .
         '</difficulty>';

    echo '<duration>' .
         $row['duration'] .
         '</duration>';

    echo '<muscle_group>' .
         htmlspecialchars($row['muscle_group']) .
         '</muscle_group>';

    echo '</exercise>';
}

echo '</exercises>';

?>