<?php

require_once 'dbconnect.php';

class Query
{
    public static function sqlError($sqlData, $query)
    {
        $res = mysqli_query($sqlData, $query);
        if (!$res) die (mysqli_error($sqlData));
        return $res;
    }

    public static function createClassic(array $attributes, $sqlData): bool
    {
        $striped = [];
        foreach ($attributes as $value) {
            if (empty($value)) {
                echo "<h2>Введите все данные</h2>";
                return false;
            }
            array_push($striped, strip_tags($value));
        }
        $query = "INSERT INTO classics (title, author, category, year) VALUES ('$striped[0]', '$striped[1]', '$striped[2]', '$striped[3]')";

        self::sqlError($sqlData, $query);

        if (mysqli_affected_rows($sqlData) !== 1) {
            return false;
        }

        return true;
    }

    public static function deleteClassic($sqlData): string
    {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM classics WHERE id=$id";
        self::sqlError($sqlData, $query);
        if (mysqli_affected_rows($sqlData) == 1) {
            return "<h2>Запись с id = $id удалена</h2>";
        }
        return "Не удалось удалить строку";
    }

    public static function updateClassic($attributes, $sqlData): bool
    {
        $id = (int)$_GET['id'];
        $striped = [];
        foreach ($attributes as $value) {
            if (empty($value)) {
                echo "<h2>Введите все данные</h2>";
                return false;
            }
            array_push($striped, strip_tags($value));
        }
        $query = "UPDATE `classics` SET `author`='$striped[0]',`title`='$striped[1]',`category`='$striped[2]',`year`='$striped[3]' WHERE `id` = $id";

        self::sqlError($sqlData, $query);

        if (mysqli_affected_rows($sqlData) == 1) {
            echo "<h2>Запись обновлена</h2>";
        }
        return true;
    }

    public static function viewAll($sqlData)
    {
        $query = "SELECT * FROM classics";
        return self::sqlError($sqlData, $query);
    }

    public static function viewSelect($sqlData)
    {
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM classics WHERE id=$id";
        return self::sqlError($sqlData, $query);
    }

}


