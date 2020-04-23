<?php
    require("includes/functions.php");

    // $game = getGame($_GET['id']);
    $result = getPlannedGames();
    // $idGame = $_GET['id'];

?>

<?php include("includes/header.php"); ?>

    <h3>Geplande spellen</h3>
    <div class="row justify-content-center">
        <?php foreach ($result as $planning) { ?>
            <div class="col-3 m-2 border">
                <h4><?php echo $planning['game']; ?></h4>
                <p id="planning<?php echo $planning['id']; ?>" class="collapse">
                    Spelleider: <?php echo $planning['leader']; ?> <br>
                    Spelers: <?php echo $planning['players']; ?> <br>
                    Starttijd: <?php echo $planning['time']; ?> <br><br>

                    <a href="update-planning-form.php?id=<?php echo $planning['id']; ?>" title="Bewerk <?php echo $planning['id'].'. '.$planning['game']; ?>"><button class="btn btn-info">Bewerken</button></a>

                    <a href="includes/delete-planning.php?id=<?php echo $planning['id']; ?>" title="Verwijder <?php echo $planning['id'].'. '.$planning['game']; ?>" onClick="javascript: return confirm('Weet je zeker dat je de planning wilt verwijderen?');"><button class="btn btn-danger">X</button></a>
                </p>
                <p class="col-12 mt-2"><a class="btn btn-danger rounded-0" data-toggle="collapse" href="#planning<?php echo $planning['id']; ?>">Lees meer &hellip;</a></p>
            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>