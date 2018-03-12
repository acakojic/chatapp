<?php

$page_title = "Home";
include ('includes/header.html');
include ('includes/navbar.html');
require ('mysqli_connect.php');
if ($_SESSION){
?>

        <form action="" method="POST">
            <input type="text" name="message_text">
            <input type="submit" value="Submit">
        </form>

        <br>
        <br>
        <?php
        $username = $_SESSION['username'];
        echo "<p>Username: " . $username . "</p>";
        ?>
        <br>
        <p>Messages:</p>

        <div id="getData"></div>
        <br>

        <?php

        $sql2 = "(SELECT messages.messages_id, messages.messages_text, users.users_name FROM messages inner join users on messages.id_users = users.users_id ORDER BY messages_id DESC LIMIT 5) ORDER BY messages_id";

        echo "<ul>";
        if ($result2 = mysqli_query ($connection, $sql2)){
            while ($row = mysqli_fetch_assoc ($result2)){
                //echo "<li id='" . $row['messages_id'] ."'>" .$row['messages_id'] . ": " . $row['messages_text'] . " : " . $row['users_name'] ."</li><br>";
            }
            mysqli_free_result ($result2);
        }
        echo "</ul>";

        $sql0 = "SELECT count(*) FROM users WHERE users_name = '{$username}' having count(*) = 1";

        if (!mysqli_num_rows (mysqli_query ($connection, $sql0)) == 1){
            $sql4 = "insert into users (users_name) values ('{$username}')";
            mysqli_query ($connection, $sql4);
        }
        else{

            if ($_POST){
                $message_text = $_POST ['message_text'];
                $sql3 = "INSERT INTO messages (messages_text, id_users ) VALUES ('{$message_text}' , (select users_id FROM users where users_name = '{$username}'))";
                $result = mysqli_query ($connection, $sql3);

                header("Location:  index.php");
                exit();
            }
        }
}
else{
    header ("Location: login.php"); 
}
?>

<script>
function getElement(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', 'messages.php', false);
    xmlhttp.send(null);
    document.getElementById('getData').innerHTML = xmlhttp.responseText;
}

getElement();

setInterval(function (){
    getElement();
}, 2000);

</script>

<?php

mysqli_close ($connection);
include ('includes/footer.html');

?>
