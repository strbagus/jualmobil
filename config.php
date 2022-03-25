<?php
    $conn = new mysqli("localhost", "bagusw", "1sampai8", "db_jualmobil");
    if(!$conn){
        echo "Connection Error : ".$conn->connect_error;
    }
?>