<?php

    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="Phonebook";


    //Create a Connection 
    $conn=new mysql($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die ("Connection  Failed". $conn->connect_error);
    }


?>