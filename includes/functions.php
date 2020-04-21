<?php
    require_once("connection/dbcon.php");
    require("validator.php");
    
    // alle games ophalen uit de database
    function getAllGames() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM games");
        $query->execute();

        return $query->fetchAll();
    }

    // specifieke game (id) ophalen uit de database
    function getGame($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM games WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        return $query->fetch();
    }

    // planning toevoegen
    function createPlanning() {
        $conn = dbcon();

        $game = $_POST['games'];
        $explainer = sanitizeData($_POST['explainer']);
        $valid_explainer = validateExplainer($explainer);
        $players = sanitizeData($_POST['players']);
        $valid_players = validatePlayers($players);
        $time = $_POST['time'];

        if ($valid_explainer == TRUE && $valid_players == TRUE) {
            $query = $conn->prepare("INSERT INTO planning (game, explainer, players, time) VALUES (:game, :explainer, :players, :time)");
            $query->bindParam(":game", $game);
            $query->bindParam(":explainer", $explainer);
            $query->bindParam(":players", $players);
            $query->bindParam(":time", $time);
            $query->execute();
        }
    }