<?php

    // connectie met de database
    function dbcon() {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "mysql";
        $dbname = "planningstool";
        $conn = null;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        }

        catch(PDOEception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }