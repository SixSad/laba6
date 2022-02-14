<?php
require_once 'dbconnect.php';
require_once 'queryBuilder.php';
?>
    <form action="" method="post">
        <label>Author <input type="text" name="author"></label>
        <label>Title <input type="text" name="title"></label>
        <label>Category <input type="text" name="category"></label>
        <label>Year <input type="date" name="year"></label>
        <input type="submit" name="submit" value="ADD">
    </form>

<?php

//if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
//    deleteClassic($mysqli);
//}
//
//if (!empty($_GET['update']) && !empty((int)$_GET['id'])) {
//    updateClassic($mysqli);
//}

if(!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'del':
            deleteClassic($mysqli);
            break;
        case 'upd':
            updateClassic($mysqli);
            break;
    }
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {
    createClassic($_POST, $mysqli);
}

$allEntries = viewAll($mysqli);
while ($row = mysqli_fetch_assoc($allEntries)) {
    ?>
    <div>
        <h2><?= $row['title']; ?><a href="?status=del&id=<?= $row['id']; ?>">[x]</a></h2>
        <p>Author: <?= $row['author']; ?></p>
        <p>Category: <?= $row['category']; ?></p>
        <p>Year: <?= $row['year']; ?></p>
        <a href="/6pirvp/update.php?status=upd&id=<?= $row['id']; ?>">Edit</a>
    </div>
    <?php
}