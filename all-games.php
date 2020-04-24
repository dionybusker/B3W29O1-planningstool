<?php
    require_once("includes/functions.php");

    $result = getAllGames();

?>

<?php include("includes/header.php"); ?>

    <h3>Alle spellen</h3>
    <div class="row justify-content-center">
        <?php foreach ($result as $game) { ?>
            <div class="col-3 m-2 border">
                <a href="game.php?id=<?php echo $game['id'] ?>" title="Bekijk meer informatie over <?php echo $game['name'] ?>">
                    <img class="col-8 my-2 card-img-top" src="img/<?php echo $game['image'] ?>" alt="<?php echo $game['name'] ?>">
                </a>
                <h4 class="card-title"><?php echo $game['name'] ?></h4>
                <p id="game<?php echo $game['id']; ?>" class="collapse">
                    Aantal spelers: <?php echo $game['min_players'].'-'.$game['max_players'] ?> <br>
                    Duur van het spel: <?php echo $game['play_minutes'] ?> minuten <br>
                    Duur van de uitleg: <?php echo $game['explain_minutes'] ?> minuten
                </p>
                <p class="col-12 mt-2"><a class="btn btn-info" data-toggle="collapse" href="#game<?php echo $game['id'] ?>">Lees meer &hellip;</a></p>
            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>