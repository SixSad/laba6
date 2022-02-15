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
    <title>Home</title>
</head>
<body>
<?php
require_once 'dbconnect.php';
require_once 'Src\Query.php';
?>

<div class="m-3 d-flex justify-content-end">
    <div>
        <button class="btn btn-primary rounded fs-5" onclick="window.location.href='<?php echo "/$root/register.php" ?>'">Register</button>
        <button class="btn btn-primary rounded fs-5" onclick="window.location.href='<?php echo "/$root/login.php" ?>'">Login</button>
    </div>
</div>
<div class="container-fluid text-center my-5">
    <?php
    if (!empty($_GET['status']) && !empty((int)$_GET['id'])) {
        echo Query::deleteClassic($mysqli);
    }

    if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {
        Query::createClassic($_POST, $mysqli);
    }
    ?>
</div>

<div class="d-flex justify-content-around">
    <div class="col-6 d-flex flex-column ">
        <?php
        $allEntries = Query::viewAll($mysqli);
        while ($row = mysqli_fetch_assoc($allEntries)) {
            ?>
            <div class="card mb-3">
                <h2 class="card-header"><?= $row['title']; ?></h2>
                <div class="card-body">
                    <p>Author: <?= $row['author']; ?></p>
                    <p>Category: <?= $row['category']; ?></p>
                    <p>Year: <?= $row['year']; ?></p>
                    <div>
                        <button class="btn btn-primary rounded fs-6"
                                onclick="window.location.href='<?php echo "/$root/update.php?status=upd&id=$row[id]"; ?>'">
                            Edit
                        </button>
                        <button class="btn btn-danger rounded fs-6"
                                onclick="window.location.href='?status=del&id=<?php echo $row['id'] ?>'">Delete
                        </button>
                    </div>

                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="form-container d-flex flex-column  col-4  shadow bg-white px-5 py-3"
         style="border-radius: 40px; max-height: 550px">
        <form class="d-flex row g-3" method="post">
            <h2 class="text-center">Add book</h2>
            <div class="col-12">
                <label class="form-label ms-2">title</label>
                <input type="text" class="form-control rounded-pill ps-3 py-2" name="title" placeholder="title">
            </div>
            <div class="col-12">
                <label class="form-label ms-2">Author</label>
                <input type="text" class="form-control rounded-pill ps-3 py-2" name="author"
                       placeholder="author">
            </div>
            <div class="col-12">
                <label class="form-label ms-2">Category</label>
                <input type="text" class="form-control rounded-pill ps-3 py-2" name="category"
                       placeholder="category">
            </div>
            <div class="col-12">
                <label class="form-label ms-2">Publication date</label>
                <input type="date" class="form-control rounded-pill ps-3 py-2" name="year"
                       placeholder="date">
            </div>
            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; a">
                <button type="submit" name="submit" value="ADD" class="btn btn-primary rounded fs-5">Add</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>

