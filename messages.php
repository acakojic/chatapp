<?php

require ('mysqli_connect.php');

$sql = "(SELECT messages.messages_id, messages.messages_text, users.users_name FROM messages inner join users on messages.id_users = users.users_id ORDER BY messages_id DESC LIMIT 5) ORDER BY messages_id";

$result = mysqli_query ($connection, $sql);


while($row = mysqli_fetch_array($result)) {
    echo $row['users_name'] . ": " . $row['messages_text'];
    echo "<br>";
}

?>