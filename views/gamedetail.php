<?php

global $dataFetch;

?>

<div class="container">
    <div class="container col-8">

        <?php
        if(isset($dataFetch['game'])){
            foreach ($dataFetch['game'] as $res){
                ?>
                <div class="container border border-secondary rounded p-3 mt-2">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>Game: <?= $res['home'] . " x " . $res['away'] ." (".$res['date'].") " ?></h4>
                            <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                        </div>
                <?php
                if(appSession::isSet('id')){


                    ?>

                    <div class="col-sm-4">
                            <button type="button" onClick="location.href='#newReview'" class="btn btn-outline-secondary m-1 pull-right">Add new review</button>
                        </div>

                    <?php
                    }
                    ?>
                    </div>
                    <div>
                        <p><?= $res['text'] ?></p>
                        <?php
                        if ($res['soubor']) {
                            echo "<a href=uploads/".$res['id']."#".$res['soubor'].">".$res['soubor']."</a>";
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            if(count($dataFetch['game']) == 0){
                echo "<h3>Game not found.</h3>";
            }
        }
        ?>
        <h2>Reviews</h2>
        <?php
            if (isset($queryResult)) {
                if ($queryResult == 0) { ?>
                <div class="alert alert-success text-center" role="alert">
                    <div class="container">
                        <b>Review was added.</b>
                    </div>
                </div>
                <?php
                }
            }
            if(isset($dataFetch['reviews'])){
            foreach ($dataFetch['reviews'] as $res) {
                ?>
                <div class="container p-2 mt-1">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                            <h6><?= "risk=" . $res['risk'] . " ... useful= " . $res['useful'] ." " ?></h6>
                        </div>
                    </div>
                    <div>
                        <p><?= $res['text'] ?></p>
                    </div>
                </div>
                <?php
            }
            if(count($dataFetch['reviews']) == 0){
                echo "<h3>No reviews.</h3>";
            }
        }
        ?>


<?php
    if(appSession::isSet('id')){


?>
        <hr/>
	<div class="container align-items-center col-8">
	<div class="card mt-2">
        <div class="card-header">
            <button class="btn form-control text-start" data-bs-toggle="collapse" data-bs-target="#newReview" onClick="location.href='#newReview'"><h4>New review</h4></button>
        </div>

        <div id="newReview" class="collapse show">
            <div class="card-body">
            <form action="" method="post">
                <label for="Risk">Risk (1-10):</label><br>
                <select name="nrRisk" id="risk">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br>
                <label for="Useful">Useful:</label><br>
                <input type="checkbox" name="nrUseful" id="useful"><br>
                <label for="comments">Comments (optional):</label><br>
                <textarea name="nrText" id="text"></textarea><br><br>
		<div class="container align-items-center col-4">
                    <div>
                <button name="nrSubmit" class="btn btn-primary form-control" type="submit">Add</button>
		    </div>
		</div>
            </form>


            </div>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
