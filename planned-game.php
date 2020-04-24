<?php
    require("includes/functions.php");

    // $game = getGame($_GET['id']);
    // $result = getGame($_GET['idGame']);
    $result = getPlanningById($_GET['id']);
    // $idGame = $_GET['id'];

?>

<?php include("includes/header.php"); ?>

    <div class="row justify-content-center">
        <div class="row col-11">
            <!-- <div class="row"> -->
                <img class="col-4" src="img/<?php echo $result['image'] ?>" alt="<?php echo $result['name'] ?>">
                
                <div class="col-8">
                    <h3><?php echo $result['name'] ?></h3>
                    <?php echo $result['description'] ?>
                </div>
            <!-- </div> -->
        </div>

        <div class="row col-11 mt-5">
            <p class="col-4">
                Spelleider: <?php echo $result['leader'] ?> <br>
                Spelers: <?php echo $result['players'] ?> <br>
                Duur van het spel: <?php echo $result['play_minutes'] ?> minuten <br>
                Duur van de uitleg: <?php echo $result['explain_minutes'] ?> minuten <br><br>

                Het spel begint om: <?php echo $result['time'] ?> uur. <br><br>

                Klik <a href="<?php echo $result['url'] ?>" target="_blank">hier</a> voor meer informatie over <?php echo $result['name'] ?>!
            </p>

            <p class="col-8">
                <?php if ($result['expansions'] != NULL) { ?>
                    Uitbreidingen: <?php echo $result['expansions'] ?> <br>
                <?php } else { ?>
                    Uitbreidingen: <span class="font-italic">dit spel bevat geen uitbreiding(en).</span> <br>
                <?php } ?>

                Skills: <?php echo $result['skills'] ?> <br><br>

                <?php echo $result['youtube'] ?>            
            </p>

        </div>
    </div>

<?php include("includes/footer.php"); ?>