<?php
session_start();
require_once('../global/inc/config.inc.php');
if (!empty($_SESSION['admin_pass']) && $_SESSION['admin_pass'] == $password) {
    echo '<script>window.location.href = "index.php";</script>';
    die;
    return;
}

if (!empty($_POST['supersecretpass'])) {
    if ($_POST['supersecretpass'] == $password) {
        $_SESSION['admin_pass'] = $_POST['supersecretpass'];
        echo '<script>window.location.href = "index.php";</script>';
        die;
        return;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Admin Panel - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../global/panel_css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../global/panel_css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="post" action="login.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="../global/panel_css/key.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
  </div>

  <div class="form-label-group">
    <input type="password" name="supersecretpass" class="form-control" placeholder="Password" required>
    <label for="supersecretpass">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2012-2020</p>
</form>
</body>
</html>
