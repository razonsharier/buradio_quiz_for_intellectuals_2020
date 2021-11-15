<?php

$db = mysqli_connect("localhost", "root", "", "buradio");
mysqli_set_charset($db, 'utf8');
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
