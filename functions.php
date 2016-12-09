<?php

function query($query) {
  global $link;
  if ($result = mysqli_query($link, $query)) {
    return $result;
  }
  else {
    set_message("Det blev något fel i frågan " . $query . mysqli_error($link), 'error');
    return FALSE;
  }
}