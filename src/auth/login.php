<!-- <?php 
// session_start();
// if (isset($_SESSION["user"])) {
//     header("Location: ../index.php");
// }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../templates/css/signIn.css">
    <link rel="stylesheet" href="../templates/css/style.css">
    <link rel="icon" type="image/x-icon" href="../templates/img/user.png">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                    require_once '../service/connect.php';
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user['password'])) {
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: ../index.php");
                            die();
                        }
                        else {
                            echo "<div class='alert alert-danger'>Password does not match!</div>";
                        }
                    }   
                    else {
                        echo "<div class='alert alert-danger'>Email does not founded!</div>";
                    }
            }
        ?>
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="form" style="height: 300px;">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Your Email:" require>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password:" require>
                </div>
                <p><a href="register.php">You don't have an account?</a></p>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Login" name="login">
                </div>
            </div>
        </form>
    </div>
</body>
</html>