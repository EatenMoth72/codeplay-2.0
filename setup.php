<?php
//Kopplar upp sig
// filen settings.php versionshanteras inte...
include(__DIR__ . '/settings.php');
include(__DIR__ . '/functions.php');
$link = mysqli_connect($host, $login, $passwd, $db);
$query ="SET NAMES utf8 COLLATE utf8_swedish_ci";
query($query);