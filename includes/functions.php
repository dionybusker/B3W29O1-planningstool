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

    // alle planningen ophalen uit de database
    // function getAllPlannings() {
    //     $conn = dbcon();
    // }

    // planning toevoegen
    function createPlanning() {
        $conn = dbcon();

        $game = $_POST['games'];
        $explainer = sanitizeData($_POST['leader']);
        // $valid_explainer = validateExplainer($explainer);
        $players = sanitizeData($_POST['players']);
        // $valid_players = validatePlayers($players);
        $time = $_POST['time'];
        // $time = date('H:i', strtotime($time));

        // if ($valid_explainer == TRUE) {
        //     if ($valid_players == TRUE) {
                $query = $conn->prepare("INSERT INTO planning (game, leader, players, time) VALUES (:game, :leader, :players, :time)");
                $query->bindParam(":game", $game);
                $query->bindParam(":leader", $leader);
                $query->bindParam(":players", $players);
                $query->bindParam(":time", $time);
                $query->execute();
        //     }
        // }
    }

    // geplande games ophalen
    function getPlannedGames() {
        $conn = dbcon();

        // $query = $conn->prepare("SELECT * FROM planning");
        // $query->execute();
        // return $query->fetchAll();

        $query = $conn->prepare("SELECT games.*, planning.*
                                 FROM games, planning
                                 WHERE games.id = planning.game");
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
    function updatePlanning($id) {
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

        $query = $conn->prepare("SELECT leader, players, time FROM planning WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch();
    }


    // alert ter bevestiging
    // function alert($msg) {
    //     echo "<script type='text-javascript'>alert('$msg')</script>";
    // }