<?PHP
SESSION_START();
require 'function.php';
$acc = pass_get();

if (isset($_SESSION['login'])) {
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
    header("location:home.php");
} else {
    if (isset($_POST['username'])) {
        $username_asli = $acc["username"];
        $password_asli = $acc["password"];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if ($username_asli == $username and $password_asli == $password) {
            $_SESSION['login'] = 1;
            header("location:index.php");
        } else {
            $ae['error_msg'] = 'Username and password doesn\'t exists!';
        }
    }
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MovieStream | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>MOVIE</b>Stream</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php if (isset($ae['error_msg'])) { ?>
                <div class="alert alert-danger"><?php echo $ae['error_msg']; ?></div>
            <?php } elseif (isset($ae['success_msg'])) { ?>
                <div class="alert alert-success"><?php echo $ae['success_msg']; ?></div>
            <?php } ?>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name='username' class="form-control" placeholder="Username">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name='password' class="form-control" placeholder="Password">
                </div>
                <div class="form-group has-error">
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>