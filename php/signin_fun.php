<?php
session_start();
include 'process.php';
connect_database();
$username = $_POST['username'];
$password = $_POST['password'];

$arr=[];
if (strlen($username) < 5) {
    $arr["username"] = "length is not enough for username";
} else {
    $arr["username"] = "ok";
}


if (strlen($password) < 1) {
    $arr["password"] = "minimum 8 characters";
}else{
    $arr["password"]="ok";
}



$arr["login"]=0;

$query = "select * from user where username='$username' and password='$password' ";
$ro = $conn->query($query);
if ($ro->num_rows > 0){
    $_SESSION["username"]=$username;
    while ($r=$ro->fetch_assoc()) {
        $_SESSION["id"] = $r['id'];
    }
    $arr["login"] = "ok";
}


echo json_encode($arr);