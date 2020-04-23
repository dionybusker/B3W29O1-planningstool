<?php
    require("includes/functions.php");

    $id = $_GET['id'];
    $planning = getPlanningById($id);
?>

<?php include("includes/header.php"); ?>

    <div>
        <h3>Planning bewerken</h3>
        <p>
            Op deze pagina kun je de planning bewerken.

            <form action="includes/update-planning.php" method="POST">
                <div class="row col-8">
                    <label class="col-2" for="leader">Spelleider:</label>
                    <input class="col-6" type="text" name="leader" value="<?php echo $planning['leader']; ?>">
                </div>

                <div class="row col-8">
                    <label class="col-2" for="players">Spelers:</label>
                    <input class="col-6" type="text" name="players" value="<?php echo $planning['players']; ?>"> <br>
                </div>

                <div class="row col-8">
                    <label class="col-2" for="time">Starttijd:</label>
                    <input class="col-6" type="time" name="time" value="<?php echo $planning['time']; ?>">
                </div>

                <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                <input type="submit" name="update" value="Bewerk planning">
            </form>
        </p>
    </div>

<?php include("includes/footer.php"); ?>