<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "cmpe-deneme");


if ($conn) {

    echo "okey";
} else {
    echo "error conn";
}

?>