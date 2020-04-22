<?php
    require("includes/functions.php");

    // $game = getGame($_GET['id']);
    $result = getPlannedGames();

?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>

    <h3>Geplande spellen</h3>
    <div class="row justify-content-center">
        <?php foreach ($result as $planning) { ?>
            <div class="col-3 m-2 border">
                <h4><?php echo $planning['game']; ?></h4>
                <p id="planning<?php echo $planning['id']; ?>" class="collapse">
                    Uitlegger: <?php echo $planning['explainer']; ?> <br>
                    Spelers: <?php echo $planning['players']; ?> <br>
                    Starttijd: <?php echo $planning['time']; ?>
                </p>
                <p class="col-12 mt-2"><a class="btn btn-danger rounded-0" data-toggle="collapse" href="#planning<?php echo $planning['id']; ?>">Lees meer &hellip;</a></p>
            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>