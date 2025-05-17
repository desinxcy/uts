<?php
    $hostname = "localhost";
    $username = "root";
    $password = "none";
    $database_name = "presen";

    $data = mysqli_connect ($hostname, $username, $password, $database_name);

    if($data->connect_error) {
        echo "salah";
        die("error");
    }
?>