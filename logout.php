<?php

setcookie("user", "", time());
setcookie("type", "", time());
header("Location: login.php");

?>