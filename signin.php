<?php

if(isset($_POST['signin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users
              WHERE username='$username'
              AND archive='N'";

    $result = mysqli_query($MySQL, $query);

    if(mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        if(password_verify($password, $row['password'])) {

            $_SESSION['user'] = $row['username'];

            header("Location: index.php");
            exit;

        } else {

            echo '<div class="contact-success">
                    Pogrešna lozinka.
                  </div>';
        }

    } else {

        echo '<div class="contact-success">
                Korisnik ne postoji.
              </div>';
    }
}

?>

<h1>Prijava</h1>

<div class="register-box">

<form action="" method="post">

    <label>
        Korisničko ime <span class="required">*</span>
    </label>

    <input type="text"
           name="username"
           required>

    <label>
        Lozinka <span class="required">*</span>
    </label>

    <input type="password"
           name="password"
           required>

    <input type="submit"
           name="signin"
           value="Prijava">

</form>

</div>