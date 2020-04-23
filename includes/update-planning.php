<?php

    require("functions.php");

    updatePlanning($_GET['id']);

    header("Location: ../planned-games.php");