<?php
include 'php/process.php';
go_home_if_logged_in();
connect_database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
</head>

<body>
    <div>

        <body class="container-fluid">

            <form class="card mt-5 col-4 offset-4">

                <h3 class="mt-2 text-center">Sign Up</h3>

                <div class=" mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback" id="username_err">Invalid username</div>

                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback" id="password_err">Invalid password</div>

                </div>
                <div class="mb-3">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback" id="email_err">Invalid email</div>

                </div>
                <div class=" mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Mobile" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback" id="mobile_err">Invalid mobile number</div>

                </div>
                <div class="form-group mb-3">
                    <label for="city">city</label>
                    <select class="form-control" id="city" name="" required>
                        <option value="" selected>select city</option>
                        <?php
                        $query = "select * from city";
                        $resultset = $conn->query($query);
                        while ($row = $resultset->fetch_assoc()) {
                            echo "<option value={$row['id']}>{$row['name']}</option>";
                        } ?>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Select a city</div>
                </div>
                <input class="btn btn-primary form-control mb-3" value="submit" onclick="signUp();">

            </form>

    </div>

    <script src="js/ascript.js"></script>
</body>

</html>