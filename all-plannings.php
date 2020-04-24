<?php
    require_once("includes/functions.php");

    // $game = getGame($_GET['id']);
    $result = getPlannedGames();
    // $idGame = $_GET['id'];

?>

<?php include("includes/header.php"); ?>

    <h3>Geplande spellen</h3>
    <div class="row justify-content-center">
        <?php foreach ($result as $planning) { ?>
            <div class="col-3 m-2 border">
                <img class="col-8 my-2 card-img-top" src="img/<?php echo $planning['image']; ?>" alt="<?php $planning['game'] ?>">
                <h4><?php echo $planning['game'] ?></h4>
                <p>
                    Spelleider: <?php echo $planning['leader'] ?> <br>
                    Spelers: <?php echo $planning['players'] ?> <br>
                    Starttijd: <?php echo $planning['time'] ?> <br><br>

                    <a class="text-decoration-none" href="update-planning-form.php?id=<?php echo $planning['id'] ?>" title="Bewerk deze planning voor <?php echo $planning['game'] ?>">
                        <button class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>

                    <a class="text-decoration-none" href="includes/delete-planning.php?id=<?php echo $planning['id'] ?>" title="Verwijder deze planning voor <?php echo $planning['game'] ?>" onClick="javascript: return confirm('Weet je zeker dat je de planning wilt verwijderen?');">
                        <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>

                    <a class="text-decoration-none" href="planned-game.php?id=<?php echo $planning['id'] ?>" title="Bekijk meer over deze planning voor <?php echo $planning['game'] ?>">
                        <button class="btn btn-info">
                            <i class="fas fa-question"></i>
                        </button>
                    </a>
                </p>
            </div>
        <?php } ?>
    </div>

<?php include("includes/footer.php"); ?>