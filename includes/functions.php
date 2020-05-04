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
    function createPlanning($game, $leader, $players, $time) {
        $conn = dbcon();
        $query = $conn->prepare("INSERT INTO planning (game, leader, players, time) VALUES (:game, :leader, :players, :time)");
        $query->bindParam(":game", $game);
        $query->bindParam(":leader", $leader);
        $query->bindParam(":players", $players);
        $query->bindParam(":time", $time);
        $query->execute();
    }

    // geplande games ophalen
    function getPlannedGames() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT planning.*, games.image
                                 FROM planning, games
                                 WHERE planning.game = games.name
                                 ORDER BY planning.time");
        $query->execute();
        return $query->fetchAll();
    }

    // planning verwijderen
    function deletePlanning($id) {
        $id = sanitizeData($id);
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM planning WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->rowCount();

        if ($result > 0) {
            $query = $conn->prepare("DELETE FROM planning WHERE id = :id");
            $query->bindParam(":id", $id);
            $query->execute();
        }
    }

    // planning bewerken
    function updatePlanning($id, $leader, $players, $time) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM planning WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $leader = $_POST['leader'];
            $players = $_POST['players'];
            $time = $_POST['time'];

            $query = $conn->prepare("UPDATE planning
                                     SET leader = :leader,
                                         players = :players,
                                         time = :time
                                     WHERE id = :id");
            $query->bindParam(":id", $id);
            $query->bindParam(":leader", $leader);
            $query->bindParam(":players", $players);
            $query->bindParam(":time", $time);
            $query->execute();
        }
    }

    function getPlanningById($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT planning.*, games.*
                                 FROM planning, games
                                 WHERE planning.id = :id AND planning.game = games.name");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch();
    }


    // alert ter bevestiging
    function alert($msg) {
        echo "<script type='text-javascript'>alert('$msg')</script>";
    }