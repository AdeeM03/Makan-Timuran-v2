<?php
session_start();
require "get_user.php";

if (isset($_SESSION['user_id'])) {
  $pdo->prepare("
        UPDATE user_sessions 
        SET is_active = 0 
        WHERE user_id = ?
    ")->execute([$_SESSION['user_id']]);
}

session_unset();      
session_destroy();    

header("Location: login.php"); 
exit;
?>
