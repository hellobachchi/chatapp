<?php
function connect_database()
{
    $server_name = "eu-cdbr-west-02.cleardb.net";
    $username = "b7c54dcfe526a4";
    $password = "6940843c";
    $database = "heroku_1c8c80c572a6615";
    $port = "3306";
    // $socket = "";
    // $conn = new mysqli($server_name, $username, $password, $database, $port);
    global $conn;
    //$server_name = "localhost";
    //$username = "root";
    //$password = "";
    //$database = "chat_app";
    //$port = "3306";
    $conn = new mysqli($server_name, $username, $password, $database, $port);

    
} 
function go_login_if_not_logged_in(){
    session_start();
    if (!isset($_SESSION["username"])) {
        echo "<script>window.location='signin.php'</script>";
    }
}

function go_home_if_logged_in()
{
    session_start();
    if (isset($_SESSION["username"])) {
        echo "<script>location.href='index.php'</script>";
    }}
?>