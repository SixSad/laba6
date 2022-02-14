<?php
require_once 'dbconnect.php';


function createClassic(array $attributes, $sqlData)
{
    $striped = [];
    foreach ($attributes as $value) {
        if (empty($value)) {
            echo "<h2>Введите все данные</h2>";
            return false;
        }
        array_push($striped, strip_tags($value));
    }
    $query = "INSERT INTO classics (author, title, category, year) VALUES ('$striped[0]', '$striped[1]', '$striped[2]', '$striped[3]')";
    $res = mysqli_query($sqlData, ($query));
    if (!$res) die (mysqli_error($sqlData));

    if (mysqli_affected_rows($sqlData) == 1) {
        echo "<h2>Запись добавлена</h2>";
    }
    return true;
}

function deleteClassic($sqlData)
{
    $id = (int)$_GET['id'];
    $query = "DELETE FROM classics WHERE id=$id";
    $res = mysqli_query($sqlData, $query);

    if (!$res) die (mysqli_error($sqlData));

    if (mysqli_affected_rows($sqlData) == 1) {
        echo "<h2>Запись с id = $id удалена</h2>";
    }
}


if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
    deleteClassic($mysqli);
}

if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {
    createClassic($_POST, $mysqli);
}
?>
