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
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <p>
    <h2><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h2>
    <?= $row['author']; ?><br>
    Category: <?= $row['category']; ?><br>
    Year: <?= $row['year']; ?><br>
    </p>
    <?php
}