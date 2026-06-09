<?php
/*Provjera prijave korisnika */
if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}
/*Provjera slanja forme i dohvaćanje podataka iz forme*/
if(isset($_POST['add'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $difficulty = $_POST['difficulty'];
    $duration = $_POST['duration'];
    $muscle_group = $_POST['muscle_group'];
    $category_id = $_POST['category_id'];

    $picture = "";
/*VArijabla za sliku i provjera je li slika odabrana,
generiranje jedisntvenog naziva da se spriječi prepisivanje 
postojećih slika*/
    if(!empty($_FILES['picture']['name'])) {

        $picture = time() . "_" . $_FILES['picture']['name'];
/*Upload slike na server */
        move_uploaded_file(
            $_FILES['picture']['tmp_name'],
            "images/" . $picture
        );
    }
/*Popunjavanje stupaca određenim vrijednostima */
    $query = "INSERT INTO exercises
              (
                title,
                description,
                difficulty,
                duration,
                muscle_group,
                picture,
                category_id,
                archive
              )
              VALUES
              (
                '$title',
                '$description',
                '$difficulty',
                '$duration',
                '$muscle_group',
                '$picture',
                '$category_id',
                'N'
              )";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=15");
    exit;
}

?>

<h1>Dodavanje vježbe</h1>

<div class="register-box">

<form method="post" enctype="multipart/form-data">

    <label>Naziv vježbe:</label>
    <input type="text" name="title" required>

    <label>Opis:</label>
    <textarea name="description" rows="5" required></textarea>

    <label>Težina:</label>
    <select name="difficulty" required>
        <option value="Početnik">Početnik</option>
        <option value="Srednje">Srednje</option>
        <option value="Napredno">Napredno</option>
    </select>

    <label>Trajanje (minute):</label>
    <input type="number" name="duration" required>

    <label>Mišićna skupina:</label>
    <input type="text" name="muscle_group" required>

    <label>Kategorija:</label>

    <select name="category_id" required>

        <?php

        $query = "SELECT * FROM categories";
        $result = mysqli_query($MySQL, $query);
/*Petlja koja prolazi kroz sve kategorije */
        while($row = mysqli_fetch_assoc($result)) {
/*Generiranje opcija u padajućem izborniku */
            echo '<option value="'.$row['id'].'">' .
                 $row['name'] .
                 '</option>';
        }

        ?>

    </select>

    <label>Slika:</label>
    <input type="file" name="picture">

    <input type="submit"
           name="add"
           value="Dodaj vježbu">

</form>

</div>