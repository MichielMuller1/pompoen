
<?php
session_start();

$hashed_password = password_hash('fred2448', PASSWORD_DEFAULT);
echo $hashed_password;

if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])){//only let user go to login if he isn't already logged in
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem">
            <h1 class="text-center pb-5 display-4">LOGIN</h1>

            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
<!--            --><?php //echo $_GET['error']; ?>
                <?=$_GET['error']?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>

</body>
</html>

    <?php
}else{
    header("Location: status.php");
}
?>