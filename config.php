<?php
    $conn = new mysqli("localhost", "root", "", "db_jualmobil");
    if(!$conn){
        echo "Connection Error : ".$conn->connect_error;
    }
?>