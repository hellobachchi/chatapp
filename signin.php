<?php
include 'php/process.php';
go_home_if_logged_in();
connect_database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
</head>

<body>
    <div>

        <body class="container-fluid">

            <fakeelement class="card mt-5 col-4 offset-4">

                <h3 class="mt-2 text-center">Sign In</h3>

                <div class=" mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                    <div class="invalid-feedback" id="username_err">Empty username</div>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <div class="invalid-feedback" id="password_err">Empty Password</div>
                </div>

                <button class="btn btn-primary form-control mb-3" onclick="signIn();">Sign In</button>
                <a class="text-center mb-3" href="signup.php">No account? create a new account ></a>

            </fakeelement>
            <p class='text-center text-danger' id="err"></p>

    </div>

    <script src="js/ascript.js"></script>
</body>

</html>