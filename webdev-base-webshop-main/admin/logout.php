<?php
session_start();
unset($_SESSION['Sadmin_id']);
unset($_SESSION['Sadmin_email']);
header("location:index.php");
?>