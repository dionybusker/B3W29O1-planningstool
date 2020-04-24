<?php

    require_once("functions.php");
    
    deletePlanning($_GET['id']);

    header("Location: ../all-plannings.php");
    // alert("Succesvol de planning verwijderd!");
