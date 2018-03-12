<?php

$page_title = 'Check login';
include ('includes/header.html');

require ('mysqli_connect.php');

if ($_SESSION){
    include ('includes/navbar.html');
    echo "<p>Logged in with username: '{$_SESSION['username']}'</p>";
    echo "<p>Please go to <a href='index.php'>chat</a> or <a href='logout.php'>logout</a></p>";
}
else if ($_GET){
    $username = $_GET['username'];
    $sql0 = "SELECT count(*) FROM users WHERE users_name = '{$username}' having count(*) = 1";

    if (mysqli_num_rows (mysqli_query ($connection, $sql0)) == 1){
        header ('Location: login.php');
    }
    else{
        $_SESSION['username'] = $username;
        include ('includes/navbar.html');
        echo "Welcome " . $username . ", Click <a href='index.php'>here</a>";
    }
}else{
    include ('includes/navbar.html');
    echo "<p>Something is wrong! Please <a href='login.php'>login</a></p>";
}

?>
