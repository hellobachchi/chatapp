<?php
session_start();
include 'process.php';
connect_database();

$username = $_POST["username"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$email = $_POST["email"];
$city = $_POST["city"];

$arr = [];
$query = "select * from user where email='$email'";
$email_ro=$conn->query($query);

$query = "select * from user where mobile='$mobile'";
$mobile_ro = $conn->query($query);

if (strlen($username) < 5) {
    $arr["username"] = "length is not enough for username";
} else {
    $arr["username"] = "ok";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $arr["email"] = "invalid email";
}elseif($email_ro->num_rows > 0){
    $arr["email"]="this email has been already used";
} else {
    $arr["email"] = "ok";
}

if (strlen($password) < 8) {
    $arr["password"] = "minimum 8 characters";
}
// elseif (!preg_match("[A-z]", $password)) {
//     $arr["password"] = "Password must contain at least one number, one upper case letter, one lower case letter and one special character.\n";
//     $v = false;
// } 
else {
    $arr["password"] = "ok";
}
if ($mobile_ro->num_rows > 0) {
    $arr["mobile"] = "mobile already used";
}
elseif (strlen($mobile) == 10 and (int) $mobile) {
    $arr["mobile"] = "ok";
} 
else {
    $arr["mobile"] = "invalid mobile";
}

if (strlen($city) > 0) {
    $arr["city"] = "ok";
} else {
    $arr["city"] = "select a city";
}
echo json_encode($arr); 
if ($arr["username"] === "ok" and $arr["email"] == "ok" and $arr["password"] == "ok" and $arr["mobile"] == "ok" and $arr["city"] == "ok") {
    $query = "INSERT INTO user (`username`,`email`,`password`,`mobile`,`city`) values ('$username','$email','$password','$mobile','$city')";
    $conn->query($query);
    $_SESSION["username"]=$username;
    
}



// echo "data</br>$username</br>$mobile</br>$password</br>$city</br>";
