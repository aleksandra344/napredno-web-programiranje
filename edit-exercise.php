<?php

if(!isset($_SESSION['user'])) {
    header("Location: index.php?menu=6");
    exit;
}

$id = (int)$_GET['id'];
/**je li admin poslao formu */
if(isset($_POST['update'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $difficulty = $_POST['difficulty'];
    $duration = $_POST['duration'];
    $muscle_group = $_POST['muscle_group'];
    $category_id = $_POST['category_id'];

    $query = "UPDATE exercises
              SET title='$title',
                  description='$description',
                  difficulty='$difficulty',
                  duration='$duration',
                  muscle_group='$muscle_group',
                  category_id='$category_id'
              WHERE id=$id";

    mysqli_query($MySQL, $query);

    header("Location: index.php?menu=15");
    exit;
}

$query = "SELECT * FROM exercises
          WHERE id=$id";

$result = mysqli_query($MySQL, $query);
$row = mysqli_fetch_assoc($result);

?>

<h1>Uređivanje vježbe</h1>

<div class="register-box">

<form method="post">

    <label>Naziv vježbe:</label>
    <input type="text"
           name="title"
           value="<?php echo htmlspecialchars($row['title']); ?>"
           required>

    <label>Opis:</label>
    <textarea name="description"
              rows="5"
              required><?php echo htmlspecialchars($row['description']); ?></textarea>

    <label>Težina:</label>

    <select name="difficulty" required>

        <option value="Početnik"
        <?php if($row['difficulty']=="Početnik") echo "selected"; ?>>
        Početnik
        </option>

        <option value="Srednje"
        <?php if($row['difficulty']=="Srednje") echo "selected"; ?>>
        Srednje
        </option>

        <option value="Napredno"
        <?php if($row['difficulty']=="Napredno") echo "selected"; ?>>
        Napredno
        </option>

    </select>

    <label>Trajanje (minute):</label>
    <input type="number"
           name="duration"
           value="<?php echo $row['duration']; ?>"
           required>

    <label>Mišićna skupina:</label>
    <input type="text"
           name="muscle_group"
           value="<?php echo htmlspecialchars($row['muscle_group']); ?>"
           required>

    <label>Kategorija:</label>

    <select name="category_id" required>

        <?php

        $query = "SELECT * FROM categories";
        $categories = mysqli_query($MySQL, $query);

        while($cat = mysqli_fetch_assoc($categories)) {

            echo '<option value="'.$cat['id'].'"';

            if($cat['id'] == $row['category_id']) {
                echo ' selected';
            }

            echo '>'.$cat['name'].'</option>';
        }

        ?>

    </select>

    <input type="submit"
           name="update"
           value="Spremi promjene">

</form>

</div>