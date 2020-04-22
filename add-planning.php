<?php
    require("includes/functions.php");

    $result = getAllGames();
    // $idGame = $_GET['id'];
?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>

    <div>
        <h3>Planning maken</h3>
        <p>
            Op deze pagina kun je een planning maken voor een spel.

            <form action="includes/create-planning.php" method="POST">
                <div class="row col-8">
                    <label class="col-2" for="games">Spel:</label>
                    <select class="col-6" name="games">
                        <option>Selecteer een spel</option>
                        <?php foreach ($result as $game) { ?>
                            <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="row col-8">
                    <label class="col-2" for="explainer">Uitlegger:</label>
                    <input class="col-6" type="text" name="explainer" placeholder="Wie legt het spel uit?">
                </div>

                <div class="row col-8">
                    <label class="col-2" for="players">Spelers:</label>
                    <input class="col-6" type="text" name="players" placeholder="Wie spelen er mee?"> <br>
                </div>

                <div class="row col-8">
                    <label class="col-2" for="time">Starttijd:</label>
                    <input class="col-6" type="time" name="time">
                </div>

                <input type="submit" value="Maak planning">
            </form>
        </p>
    </div>

<?php include("includes/footer.php"); ?>