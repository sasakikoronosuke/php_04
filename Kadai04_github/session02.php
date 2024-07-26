<?php

// Sessionp01 を開いてから０２を開く（でないとうまく動かない）

session_start();

$name  = $_SESSION['name'];
$age = $_SESSION['age'];


echo $name . $age;
