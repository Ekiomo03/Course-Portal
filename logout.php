<?php
// session start

session_start();

// unset session variables

session_unset();

// destroy session

session_destroy();

// redirect to login.php

header("location: login.php");
exit;

?>