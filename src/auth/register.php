<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../templates/css/signIn.css">
    <link rel="stylesheet" href="../templates/css/style.css">
    <link rel="icon" type="image/x-icon" href="../templates/img/user.png">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_POST['submit'])) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $repeatPassword = $_POST['repeat_password'];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if(empty($fullname) OR empty($email) OR empty($password) OR empty($repeatPassword)) {
                    array_push($errors, 'All  fields are required!');
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, 'Email is not valid!');
                }
                if (strlen($password) <8) {
                    array_push($errors, 'Password must be at least 8 characters long!');
                }
                if (!$password == $repeatPassword) {
                    array_push($errors, 'Passwords does not match!');
                }

                require_once '../service/connect.php';
                $sql = "SELECT * FROM users WHERE email = '$email' ";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);

                if($rowCount > 0) {
                    array_push($errors, 'Email already exists!');
                }
                if (count($errors) >0) {
                    foreach($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }
                else {
                    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                    if($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo '<div class="alert alert-success">You are registered successfully!</div>';
                    }
                    else {
                        die("Something went wrong");
                    }
                }
            }
        ?>
        <form action="register.php" method="post">
            <h1>Register</h1>
            <div class="form">
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name:" require>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Your Email:" require>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password:" require>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:" require>
                </div>
                <p><a href="login.php">Already registered ?</a></p>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>