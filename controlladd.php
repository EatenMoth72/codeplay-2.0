<?php

$query = "INSERT INTO `videos`(`VideoID`, `Video`, `Image`, `Time`, `Title`, `Description`, `Creator`, `Date`) VALUES (NULL,'" . $_POST['name'] . "','" . $_POST['startimg'] . "','" . strip_tags(trim($_POST['time'])) . "','" . strip_tags(trim($_POST['title'])) . "','" . strip_tags(trim($_POST['description'])) . "','" . strip_tags(trim($_POST['creator'])) . "'," . date('h:m:s') . ')"';

mysql_query($query);


header('location:index.php');
exit;