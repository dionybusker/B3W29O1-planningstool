<?php

    // sanitize data
    function sanitizeData($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    // spelleider valideren
    function validateLeader($leader) {
        $isValid = FALSE;
        if ($leader != NULL && $leader != "") {
            if (preg_match("/^[a-zA-Z ]*$/", $leader)) {
                $isValid = TRUE;
            }
        }
        return $isValid;
    }

    // spelers valideren
    function validatePlayers($players) {
        $isValid = FALSE;
        if ($players != NULL && $players != "") {
            if (preg_match("/^[a-zA-Z, ]*$/", $players)) {
                $isValid = TRUE;
            }
        }
        return $isValid;
    }