<?php

    // sanitize data
    function sanitizeData($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    // uitlegger valideren
    function validateExplainer($explainer) {
        $isValid = FALSE;
        if ($explainer != NULL && $explainer != "") {
            if (preg_match("/^[a-zA-Z ]*$/", $explainer)) {
                $isValid = TRUE;
            }
        }
        return $isValid;
    }

    // spelers valideren
    function validatePlayers($players) {
        $isValid = FALSE;
        if ($players != NULL && $players != "") {
            if (preg_match("/^[a-zA-Z ]*$/", $players)) {
                $isValid = TRUE;
            }
        }
        return $isValid;
    }