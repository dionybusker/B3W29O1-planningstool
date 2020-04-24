<?php

    require_once("functions.php");

    updatePlanning($_GET['id']);

    header("Location: ../all-plannings.php");