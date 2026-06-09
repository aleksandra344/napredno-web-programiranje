<?php
session_start();

include("dbconn.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FitLife</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="banner">

    <img src="images/banner.jpg"
         alt="FitLife Banner">

    <div class="banner-title">
        FITLIFE
    </div>

</div>

<?php
include("menu.php");
?>

<div class="container">

<?php

if(isset($_GET['menu'])) {

    switch($_GET['menu']) {

        case 1:
            include("home.php");
            break;

        case 2:
            include("exercises-list.php");
            break;

        case 3:
            include("about-us.php");
            break;

        case 4:
            include("contact.php");
            break;

        case 5:
            include("register.php");
            break;

        case 6:
            include("signin.php");
            break;

        case 7:
            include("signout.php");
            break;

        case 8:
            include("admin.php");
            break;

        case 9:
            include("edit-user.php");
            break;

        case 10:
            include("delete-user.php");
            break;

        case 11:
            include("categories.php");
            break;

        case 12:
            include("add-category.php");
            break;

        case 13:
            include("edit-category.php");
            break;

        case 14:
            include("delete-category.php");
            break;

        case 15:
            include("exercises.php");
            break;

        case 16:
            include("add-exercise.php");
            break;

        case 17:
            include("edit-exercise.php");
            break;

        case 18:
            include("delete-exercise.php");
            break;

        case 19:
            include("exercise-details.php");
            break;

        case 20:
            include("gallery.php");
            break;

        case 21:
            include("gallery-details.php");
            break;

        case 22:
            include("fitness-tools.php");
            break;
            
        case 23:
            include("api-dashboard.php");
            break;

        default:
            include("home.php");
    }

}
else {

    include("home.php");

}

?>

</div>

<footer>

    <p>
        Copyright &copy; 2026 Aleksandra Blažeković.

        <a href="https://github.com/aleksandra344/napredno-web-programiranje"
           target="_blank">
           GitHub
        </a>
    </p>

</footer>

</body>
</html>