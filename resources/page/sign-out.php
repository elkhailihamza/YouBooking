<?php
    session_start();
    session_destroy();
    header("location:sing-in.php");
?>