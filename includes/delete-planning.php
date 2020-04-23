<?php

    require("functions.php");
    
    deletePlanning($_GET['id']);

    header("Location: ../planned-games.php");
    // alert("Succesvol de planning verwijderd!");
