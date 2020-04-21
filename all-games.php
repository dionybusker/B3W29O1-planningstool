<?php
    require("includes/functions.php");

    $result = getAllGames();

?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php") ?>

    <div class="row justify-content-center">
        <?php foreach ($result as $game) { ?>
            <div class="gamecards col-3 m-2 border">
                <a href="game.php?id=<?php echo $game['id']; ?>">
                    <img class="col-8 my-2 card-img-top" src="img/<?php echo $game['image']; ?>" alt="<?php echo $game['name']; ?>">
                </a>
                <h4 class="card-title"><?php echo $game['name']; ?></h4>
                <p id="game<?php echo $game['id']; ?>" class="collapse">
                    Minimaal aantal spelers: <?php echo $game['min_players']; ?> <br>
                    Maximaal aantal spelers: <?php echo $game['max_players']; ?> <br>
                    Duur van het spel: <?php echo $game['play_minutes']; ?> minuten <br>
                    Duur van de uitleg: <?php echo $game['explain_minutes']; ?> minuten
                </p>
                <p class="col-12 mt-2"><a class="btn btn-danger rounded-0" data-toggle="collapse" href="#game<?php echo $game['id']; ?>">Lees meer &hellip;</a></p>
            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>