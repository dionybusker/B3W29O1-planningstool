<?php

    require("functions.php");
    
    deletePlanning($_GET['id']);

    header("Location: ../all-plannings.php");
    // alert("Succesvol de planning verwijderd!");
