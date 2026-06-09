<?php
/**uspostavljanje veze s poslužiteljem */
$MySQL = mysqli_connect(
    "localhost",
    "root",
    "",
    "fitlife"
);
/**provjera uspješnosti povezivanja */
if (!$MySQL) {
    die("Greška kod spajanja na bazu!");
}

mysqli_set_charset($MySQL, "utf8");
?>