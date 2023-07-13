<?php

session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "DELETE FROM user
            WHERE user.id = {$_SESSION["user_id"]}";
            // DELETE FROM user WHERE `user`.`id` = 7
    $result = $mysqli->query($sql);
}
session_destroy();

header("Location: index.php");
exit;