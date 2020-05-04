<?php
    require_once("includes/functions.php");

    $result = getAllGames();
    // $idGame = $_GET['id'];

    $game = $leader = $players = $time = "";
    $gameError = $leaderError = $playersError = $timeError = "";
    $valid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["games"])) {
            $gameError = "* verplicht veld";
        } else {
            $game = sanitizeData($_POST["games"]);
        }

        if (empty($_POST["leader"])) {
            $leaderError = "* verplicht veld";
        } else {
            $leader = sanitizeData($_POST['leader']);
            if (!preg_match("/^[a-zA-Z ]*$/", $leader)) {
                $leaderError = "alleen letters toegestaan";
            }
        }

        if (empty($_POST["players"])) {
            $playersError = "* verplicht veld";
        } else {
            $players = sanitizeData($_POST['players']);
            if (!preg_match("/^[a-zA-Z ]*$/", $players)) {
                $playersError = "alleen letters en spaties toegestaan";
            }
        }

        if (empty($_POST["time"])) {
            $timeError = "* verplicht veld";
        } else {
            $time = sanitizeData($_POST["time"]);
        }

        if (!empty($_POST["games"]) && !empty($_POST["leader"]) && !empty($_POST["players"]) && !empty($_POST["time"])) {
            $valid = true;
        }

        if ($valid) {
            createPlanning($game, $leader, $players, $time);
            echo "<script>alert('Planning is succesvol toegevoegd.'); window.location.href='all-plannings.php';</script>";
        }
    }
?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php") ?>

    <div>
        <h3>Planning maken</h3>
        <p>
            Op deze pagina kun je een planning maken voor een spel.

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class="row col-8">
                    <label class="col-2" for="games">Spel:</label>
                    <select class="col-6" name="games">
                        <?php foreach ($result as $game) { ?>
                            <option value="<?php echo isset($_POST['games']) ? htmlspecialchars($_POST['games']) : $game['name'] ?>"><?php echo isset($_POST['games']) ? htmlspecialchars($_POST['games']) : $game['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="row col-8 my-3">
                    <label class="col-2" for="leader">Spelleider:</label>
                    <input class="col-6" type="text" name="leader" placeholder="Wie legt het spel uit?" value="<?php echo isset($_POST['leader']) ? htmlspecialchars($_POST['leader']) : '' ?>"><span class="text-danger"> <?php echo $leaderError; ?></span>
                </div>

                <div class="row col-8 my-3">
                    <label class="col-2" for="players">Spelers:</label>
                    <input class="col-6" type="text" name="players" placeholder="Wie spelen er mee?" value="<?php echo isset($_POST['players']) ? htmlspecialchars($_POST['players']) : '' ?>"><span class="text-danger"> <?php echo $playersError; ?></span> <br>
                </div>

                <div class="row col-8 my-3">
                    <label class="col-2" for="time">Starttijd:</label>
                    <input class="col-6" type="time" name="time" value="<?php echo isset($_POST['time']) ? htmlspecialchars($_POST['time']) : '' ?>"><span class="text-danger"> <?php echo $timeError; ?></span>
                </div>

                <div class="row col-8 my-3">
                    <input class="btn btn-info" type="submit" value="Maak planning">
                </div>


            </form>
        </p>
    </div>

<?php include("includes/footer.php"); ?>