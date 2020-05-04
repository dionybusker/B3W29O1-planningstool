<?php
    require_once("includes/functions.php");

    $result = getAllGames();

?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php") ?>

    <h3 class="text-center">Alle spellen</h3><br>
    <div class="row justify-content-center">
        <?php foreach ($result as $game) { ?>
            <div class="col-3 m-2 border img-game-container max-height">
                <img class="col-12 my-2 img-game max-height-img" src="img/<?php echo $game['image'] ?>" alt="<?php echo $game['name'] ?>">

                <div class="info-game">
                    <a class="btn btn-info" href="game.php?id=<?php echo $game['id'] ?>" title="Bekijk meer informatie over <?php echo $game['name'] ?>">MEER INFO</a>
                    
                </div>


            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>