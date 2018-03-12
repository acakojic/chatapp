<?php
$page_title = 'Logout';

include ('includes/header.html');
session_unset();
session_destroy();
include ('includes/navbar.html');
?>

<p>You are now logout! Please <a href='login.php'>login</a></p>

<?php
include ('includes/footer.html');
?>
