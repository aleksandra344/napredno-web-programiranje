<?php

if(isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $country = $_POST['country'];

    $plain_password = $_POST['password'];

    if(strlen($plain_password) < 6) {

        echo '
        <div class="contact-success" style="background:#8b0000;">
            Lozinka mora sadržavati najmanje 6 znakova.
        </div>';

    }
    else {

        $password = password_hash(
            $plain_password,
            PASSWORD_DEFAULT
        );

        $check = "SELECT * FROM users
                  WHERE username='$username'";

        $result = mysqli_query($MySQL, $check);

        if(mysqli_num_rows($result) > 0) {

            echo '
            <div class="contact-success" style="background:#8b0000;">
                Korisničko ime već postoji!
            </div>';

        }
        else {

            $query = "INSERT INTO users
            (
                firstname,
                lastname,
                email,
                username,
                password,
                country,
                archive
            )
            VALUES
            (
                '$firstname',
                '$lastname',
                '$email',
                '$username',
                '$password',
                '$country',
                'N'
            )";

            mysqli_query($MySQL, $query);

            echo '
            <div class="contact-success">
                Korisnik je uspješno registriran.
            </div>';
        }
    }
}

?>

<h1>Registracija</h1>

<div class="register-box">

<form action="" method="post">

    <label>
        Ime <span class="required">*</span>
    </label>

    <input type="text"
           name="firstname"
           required>

    <label>
        Prezime <span class="required">*</span>
    </label>

    <input type="text"
           name="lastname"
           required>

    <label>
        E-mail <span class="required">*</span>
    </label>

    <input type="email"
           name="email"
           required>

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

    <label>
        Država <span class="required">*</span>
    </label>

    <select name="country" required>

        <option value="">
            -- Odaberite državu --
        </option>

        <option value="HR">Hrvatska</option>
        <option value="SI">Slovenija</option>
        <option value="AT">Austrija</option>
        <option value="DE">Njemačka</option>

    </select>

    <input type="submit"
           name="register"
           value="Registracija">

</form>

</div>