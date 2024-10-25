<?php

    include "db.php"; 

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql= "DELETE FROM contacts WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Conatct Successfully Deleted!";
        } else {
            echo "Error Deleting Record." . $sql . "<br>" . $conn->error;
        }

    }
    header("Location: index.php");




?>