<?php
    include("includes/functions.php");

    $result = getGame($_GET['id']);
?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>

    <div class="row justify-content-center">

        <div class="row col-11">
            <!-- <div class="row"> -->
                <img class="col-4" src="img/<?php echo $result['image']; ?>" alt="<?php echo $result['name']; ?>">
                
                <div class="col-8">
                    <h3><?php echo $result['name']; ?></h3>
                    <?php echo $result['description']; ?>
                </div>
            <!-- </div> -->
        </div>

        <div class="row col-11 mt-5">
            <p class="col-4">
                Minimum aantal spelers: <?php echo $result['min_players']; ?> <br>
                Maximum aantal spelers: <?php echo $result['max_players']; ?> <br>
                Duur van het spel: <?php echo $result['play_minutes']; ?> minuten <br>
                Duur van de uitleg: <?php echo $result['explain_minutes']; ?> minuten <br><br>

                Klik <a href="<?php echo $result['url']; ?>" target="_blank">hier</a> voor meer informatie over <?php echo $result['name']; ?>!
            </p>

            <p class="col-8">
                Uitbreidingen: <?php echo $result['expansions']; ?> <br>
                Skills: <?php echo $result['skills']; ?> <br><br>

                <?php echo $result['youtube']; ?>            
            </p>

        </div>

    </div>

<?php include("includes/footer.php"); ?>