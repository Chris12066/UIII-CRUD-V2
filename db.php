<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_autopartes'
) or die(mysqli_erro($mysqli));

?>
