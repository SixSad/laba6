<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Редактирование записи</h2>

<?php
require_once 'dbconnect.php';
require_once 'queryBuilder.php';
if (!empty($_POST['submit']) && $_POST['submit'] == 'UPDATE') {
    updateClassic($_POST, $mysqli);
}

$allEntries = viewSelect($mysqli);
while ($row = mysqli_fetch_assoc($allEntries)) {
    ?>

    <div>
        <h2><?= $row['title']; ?></h2>
        <p>Author: <?= $row['author']; ?></p>
        <p>Category: <?= $row['category']; ?></p>
        <p>Year: <?= $row['year']; ?></p>
        <a href="/6pirvp/update.php?status=upd&id=<?= $row['id']; ?>">Edit</a>
    </div>

    <div style="margin-top: 100px">
        <form action="" method="post">
            <label>Author <input type="text" name="author"></label>
            <label>Title <input type="text" name="title"></label>
            <label>Category <input type="text" name="category"></label>
            <label>Year <input type="date" name="year"></label>
            <input type="submit" name="submit" value="UPDATE">
        </form>

        <a href="/6pirvp/classics.php">Back</a>
    </div>
    <?php
}
?>
</body>
</html>