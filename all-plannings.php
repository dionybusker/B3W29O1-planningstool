<?php
    require_once("includes/functions.php");

    // $game = getGame($_GET['id']);
    $result = getPlannedGames();
    // $idGame = $_GET['id'];

?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php") ?>

    <h3 class="text-center">Geplande spellen</h3><br>
    <div class="row justify-content-center">
        <?php foreach ($result as $planning) { ?>
            <div class="col-3 m-2 border img-game-container max-height">
                <img class="col-12 my-2 img-game max-height-img" src="img/<?php echo $planning['image']; ?>" alt="<?php $planning['game'] ?>">

                <div class="info-game min-width">
                    <h4><?php echo $planning['game'] ?></h4>

                    Spelleider: <?php echo $planning['leader'] ?> <br>
                    Spelers: <?php echo $planning['players'] ?> <br>
                    Starttijd: <?php echo $planning['time'] ?> <br><br>

                    <a class="btn btn-success text-decoration-none" href="update-planning-form.php?id=<?php echo $planning['id'] ?>" title="Bewerk deze planning voor <?php echo $planning['game'] ?>"><i class="fas fa-edit"></i></a>

                    <a class="btn btn-danger text-decoration-none" href="includes/delete-planning.php?id=<?php echo $planning['id'] ?>" title="Verwijder deze planning voor <?php echo $planning['game'] ?>" onClick="javascript: return confirm('Weet je zeker dat je de planning wilt verwijderen?');"><i class="fas fa-trash-alt"></i></a>

                    <a class="btn btn-info text-decoration-none" href="planned-game.php?id=<?php echo $planning['id'] ?>" title="Bekijk meer over deze planning voor <?php echo $planning['game'] ?>"><i class="fas fa-question"></i></a>
                </div>

            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>