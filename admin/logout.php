<?php
include "config.php";
session_start();
session_unset();
session_destroy();

header("{$hostname}/admin/index.php");




?>
