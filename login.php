<?php

$page_title = "Login";
include ("includes/header.html");
include ("includes/navbar.html");

if ($_SESSION){
    echo "<p>You are logged in with username '{$_SESSION['username']}' you can <a href='logout.php'>logout</a></p>";
}else{
?>
    <form action="check_login.php" method="GET">
        <label>Login username:</label>
        <br>
        <input type="text" name="username" value="<?php echo "guest" . rand(1,10000); ?>">
        <input type="submit" value="Submit">
    </form>
<?php
}

include ('includes/footer.html');
?>
