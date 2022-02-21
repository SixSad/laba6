<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<?php
require_once 'dbconnect.php';
require_once 'Src/Query.php';
session_start();
?>
<?php
if (empty($_SESSION)) {
    header('Location: classics.php');
}
?>

<div class="m-3 d-flex justify-content-end">

    <button class="btn btn-primary rounded fs-5"
            onclick="window.location.href='<?php echo "/$root/logout.php" ?>'">Logout
    </button>

</div>
<div class="container-fluid">
    <div class="container-fluid text-center m-5"><?php
        if (!empty($_POST['submit']) && $_POST['submit'] == 'UPDATE') {
            Query::updateClassic($_POST, $mysqli);
        }

        ?>
    </div>
    <div class="d-flex justify-content-around">
        <?php

        $selectEntries = Query::viewSelect($mysqli);
        ?>
        <div class="col-6 d-flex flex-column ">
            <?php
            $row = mysqli_fetch_assoc($selectEntries);
            ?>
            <div class="card m-4">
                <h2 class="card-header"><?= $row['title']; ?></h2>
                <div class="card-body">
                    <p>Author: <?= $row['author']; ?></p>
                    <p>Category: <?= $row['category']; ?></p>
                    <p>Year: <?= $row['year']; ?></p>
                    <div>
                        <button class="btn btn-danger rounded fs-6"
                                onclick="window.location.href='?status=del&id=<?php echo $row['id'] ?>'">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-container d-flex flex-column  col-4  shadow bg-white  px-5 py-3"
             style="border-radius: 40px; max-height: 550px">
            <form class="d-flex row g-3" method="post">
                <h2 class="text-center">Update book</h2>
                <div class="col-12">
                    <label class="form-label ms-2">title</label>
                    <input type="text" class="form-control rounded-pill ps-3 py-2" name="title" placeholder="title"
                           value="<?= $row['title']; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label ms-2">Author</label>
                    <input type="text" class="form-control rounded-pill ps-3 py-2" name="author"
                           placeholder="author" value=" <?= $row['author']; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label ms-2">Category</label>
                    <input type="text" class="form-control rounded-pill ps-3 py-2" name="category"
                           placeholder="category" value=" <?= $row['category']; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label ms-2">Publication date</label>
                    <input type="date" class="form-control rounded-pill ps-3 py-2" name="year"
                           placeholder="date" value=" <?= $row['year']; ?>">
                </div>
                <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; a">
                    <button type="submit" name="submit" value="UPDATE" class="btn btn-primary rounded fs-5">Add</button>
                </div>
            </form>

        </div>
    </div>
    <button class="btn btn-primary rounded fs-5" style="margin-top: 250px"
            onclick="window.location.href='<?php echo "/$root/classics.php" ?>'">
        Back
    </button>
</div>


</body>
</html>