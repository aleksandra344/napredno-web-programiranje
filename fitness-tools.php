<h1>Fitness alati</h1>

<!-- BMI KALKULATOR -->

<div class="register-box">

    <h2>BMI kalkulator</h2>

    <?php

    if(isset($_POST['calculate'])) {

        $height = $_POST['height'] / 100;
        $weight = $_POST['weight'];

        $bmi = $weight / ($height * $height);

        echo '<div class="contact-success">';

        echo '<b>BMI:</b> ' . round($bmi, 2) . '<br><br>';

        if($bmi < 18.5) {
            echo 'Premala tjelesna masa';
        }
        elseif($bmi < 25) {
            echo 'Normalna tjelesna masa';
        }
        elseif($bmi < 30) {
            echo 'Povišena tjelesna masa';
        }
        else {
            echo 'Pretilost';
        }

        echo '</div>';
    }

    ?>

    <form method="post">

        <label>Visina (cm):</label>
        <input type="number"
               name="height"
               required>

        <label>Težina (kg):</label>
        <input type="number"
               name="weight"
               required>

        <input type="submit"
               name="calculate"
               value="Izračunaj BMI">

    </form>

</div>


<!-- MOTIVACIJSKI CITAT -->

<div class="register-box">

    <h2>Motivacijski fitness citat</h2>

    <?php

    $quotes = array(
        "Nema uspjeha bez discipline.",
        "Svaki trening te približava cilju.",
        "Ne odustaj kada postane teško.",
        "Rezultati dolaze upornošću.",
        "Tvoje tijelo može više nego što misliš.",
        "Mali koraci vode do velikih promjena."
    );

    $random = rand(0, count($quotes)-1);

    ?>

    <blockquote style="
        border-left: 4px solid #ff7b00;
        padding-left: 20px;
        font-size: 20px;
        color: white;
        margin: 0;
    ">
        <?php echo $quotes[$random]; ?>
    </blockquote>

</div>


<!-- BMR KALKULATOR -->

<div class="register-box">

    <h2>Kalkulator dnevnih kalorijskih potreba</h2>

    <?php

    if(isset($_POST['calculate_bmr'])) {

        $gender = $_POST['gender'];
        $age = (int)$_POST['age'];
        $height = (int)$_POST['height_bmr'];
        $weight = (float)$_POST['weight_bmr'];

        if($gender == "M") {

            $bmr =
                10 * $weight +
                6.25 * $height -
                5 * $age +
                5;

        } else {

            $bmr =
                10 * $weight +
                6.25 * $height -
                5 * $age -
                161;
        }

        echo '<div class="contact-success">';
        echo '<b>Dnevna potreba:</b> '
             . round($bmr)
             . ' kcal';
        echo '</div>';
    }

    ?>

    <form method="post">

        <label>Spol:</label>

        <select name="gender">

            <option value="M">Muško</option>
            <option value="F">Žensko</option>

        </select>

        <label>Dob:</label>

        <input type="number"
               name="age"
               required>

        <label>Visina (cm):</label>

        <input type="number"
               name="height_bmr"
               required>

        <label>Težina (kg):</label>

        <input type="number"
               step="0.1"
               name="weight_bmr"
               required>

        <input type="submit"
               name="calculate_bmr"
               value="Izračunaj kalorije">

    </form>

</div>


<!-- API -->

<div class="register-box">

    <h2>API pristup podacima</h2>

    <p>
        <a class="admin-link"
           href="api-exercise.php"
           target="_blank">
           JSON API vježba
        </a>
    </p>

    <p>
        <a class="admin-link"
           href="api-exercises-xml.php"
           target="_blank">
           XML API vježba
        </a>
    </p>
    <p>
        <a href="index.php?menu=23"
           class="admin-link">
            API Dashboard
        </a>
    </p>

</div>