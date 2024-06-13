<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // check if username already exists
    $checkUsername = $db->prepare("SELECT * FROM users WHERE username = :username");
    $checkUsername->bindParam(':username', $username);
    $checkUsername->execute();

    if($checkUsername->rowCount() > 0) {
        // username already exists, display error message
        $failedRegister = true;
        $existingUsernameMessage = "Username $username already exists. Please choose a different username.";
    } else {
        // username does not exist, proceed with registration

        // prepare query
        $sql = "INSERT INTO users (name, username, email, password) 
                VALUES (:name, :username, :email, :password)";
        $stmt = $db->prepare($sql);

        // bind parameters to query
        $params = array(
            ":name" => $name,
            ":username" => $username,
            ":password" => $password,
            ":email" => $email
        );

        // execute query to save data to database
        $saved = $stmt->execute($params);

        // if registration is successful, redirect to login page
        if($saved) {
            header("Location: login.php");
            exit;
        } else {
            echo "Registration failed. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="script" href="js/bootstrap.min.js" />
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12">
            <h4>Join thousands of others...</h4>
            <p>Already have an account? <a href="login.php">Login here</a></p>
            <?php if(isset($failedRegister)): ?>
              <div class="card-alert text-start mt-3" role="alert">
                <h6 class="h6 fw-medium m-0">Invalid Username</h6>
                <p class="m-0 fw-ligth fs-7"><?= $existingUsernameMessage ?></p>
              </div>
            <?php endif; ?>
            <form action="" method="POST" class="row">
                <div class="form-group mb-3 col-sm-12 col-md-6">
                    <label for="name">Full Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Your name" required/>
                </div>
                <div class="form-group mb-3 col-sm-12 col-md-6">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required/>
                </div>
                <div class="form-group mb-3 col-sm-12 col-md-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email address" required/>
                </div>
                <div class="form-group mb-3 col-sm-12 col-md-6">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-success btn-block" name="register" value="Register" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>