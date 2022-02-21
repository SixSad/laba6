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
    <title>Login</title>
</head>
<body>
<?php
require_once 'dbconnect.php';
require_once 'Src\Query.php';
require_once 'Src\Auth.php';
session_start();
?>
<?php
if(!empty($_SESSION)){
    header('Location: classics.php');
}
?>

<div class="container-fluid text-center my-5">
    <?php
    if (!empty($_POST)) {
        echo Auth::login($_POST['login'], $_POST['password'], $mysqli);
    }
    ?>
    <?php if (Auth::user()) {
        echo " <script> window.setTimeout(function() { window.location = 'classics.php'; }, 1000) </script>";
    } ?>
</div>
<div class="m-3 d-flex justify-content-end">
    <div>
        <?php
        if (empty(Auth::user())):?>
            <button class="btn btn-primary rounded fs-5"
                    onclick="window.location.href='<?php echo "/$root/register.php" ?>'">Register
            </button>
            <button class="btn btn-primary rounded fs-5"
                    onclick="window.location.href='<?php echo "/$root/login.php" ?>'">Login
            </button>
        <?php
        else:
            ?>
            <button class="btn btn-primary rounded fs-5"
                    onclick="window.location.href='<?php echo "/$root/logout.php" ?>'">Logout
            </button>
        <?php
        endif;
        ?>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="form-container d-flex flex-column  col-4  shadow bg-white px-5 py-4"
         style="border-radius: 40px; max-height: 550px">
        <form class="d-flex row g-3" method="post">
            <h2 class="text-center">Login</h2>
            <div class="col-12">
                <label class="form-label ms-2">Login</label>
                <input type="text" class="form-control rounded-pill ps-3 py-2" name="login" placeholder="login">
            </div>
            <div class="col-12">
                <label class="form-label ms-2">Password</label>
                <input type="password" class="form-control rounded-pill ps-3 py-2" name="password"
                       placeholder="password">
            </div>
            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; a">
                <button type="submit" name="submit" class="btn btn-primary rounded fs-5">LogIn</button>
            </div>
        </form>

    </div>
</div>

</body>
</html>