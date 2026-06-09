<?php

if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

$id = (int)$_GET['id'];

if(isset($_POST['update'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    $query = "UPDATE users
              SET firstname='$firstname',
                  lastname='$lastname',
                  email='$email',
                  country='$country'
              WHERE id=$id";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=8");
    exit;
}

$query = "SELECT * FROM users
          WHERE id=$id";

$result = mysqli_query($MySQL, $query);

$row = mysqli_fetch_assoc($result);

?>

<h1>Uređivanje korisnika</h1>

<div class="register-box">

    <form method="post">

        <label>Ime:</label>

        <input type="text"
               name="firstname"
               value="<?php echo htmlspecialchars($row['firstname']); ?>"
               required>

        <label>Prezime:</label>

        <input type="text"
               name="lastname"
               value="<?php echo htmlspecialchars($row['lastname']); ?>"
               required>

        <label>E-mail:</label>

        <input type="email"
               name="email"
               value="<?php echo htmlspecialchars($row['email']); ?>"
               required>

        <label>Država:</label>

        <select name="country">

            <option value="HR"
            <?php if($row['country'] == "HR") echo "selected"; ?>>
            Hrvatska
            </option>

            <option value="SI"
            <?php if($row['country'] == "SI") echo "selected"; ?>>
            Slovenija
            </option>

            <option value="AT"
            <?php if($row['country'] == "AT") echo "selected"; ?>>
            Austrija
            </option>

            <option value="DE"
            <?php if($row['country'] == "DE") echo "selected"; ?>>
            Njemačka
            </option>

        </select>

        <input type="submit"
               name="update"
               value="Spremi promjene">

    </form>

</div>