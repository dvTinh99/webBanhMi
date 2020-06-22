<?php
session_start();
session_destroy();
//echo "has destroy";
header("Location: http://localhost/WebBanhMi/login.php");


?>