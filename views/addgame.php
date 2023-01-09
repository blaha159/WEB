<?php

global $dataFetch;

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<div class="container">
    <div class="container align-items-center col-8">
    <div class="card mt-2">
        <div class="card-header">
            <button class="btn form-control text-start" data-bs-toggle="collapse" data-bs-target="#newGame"><h4>New game</h4></button>
        </div>

        <div id="newGame" class="collapse show">
            <div class="card-body">

                <?php
                if (isset($queryResult)) {
                if ($queryResult == 0) { ?>
                    <div class="alert alert-success text-center" role="alert">
                        <div class="container mb-2">
                            <b>Game added successfuly.</b>
                        </div>
                <?php } else if ($queryResult == 1) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <div class="container mb-2">
                            <b>Game add unsuccessful.</b>
                            <p>Game already exists</p>
                        </div>
                <?php } else if ($queryResult == 2) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <div class="container mb-2">
                            <b>Game add unsuccessful.</b>
                            <p>Document is not PDF type.</p>
                        </div>
                <?php } else if ($queryResult == 3) { ?>
                     <div class="alert alert-danger text-center" role="alert">
                         <div class="container mb-2">
                             <b>Game add unsuccessful.</b>
                             <p>Upload error.</p>
                         </div>
                <?php }
                } ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-2">
                        <input type="text" name="cHome" placeholder="Home" class="form-control" id="labelHome" required>
                        <label for="labelHome" class="smaller-label">Home </label>

                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="cAway" placeholder="Away" class="form-control" id="labelAway" required>
                        <label for="labelAway" class="smaller-label">Away</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="cDate" placeholder="Date (YYYY-MM-DD)" class="form-control" id="labelDate" required>
                        <label for="labelDate" class="smaller-label">Date (YYYY-MM-DD)</label>

                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="cTime" placeholder="Time (HH:MM)" class="form-control" id="labelTime" required>
                        <label for="labelTime" class="smaller-label">Time (HH:MM)</label>

                    </div>
                    <textarea name="cText" placeholder="Text" class="form-control" rows="3" required></textarea>
                    <div class="mt-3 mb-2">
                        <input type="file" name="cSoubor" accept="application/pdf" id="cSoubor" class="form-control"    >
                    </div>
    		    <div class="container align-items-center col-4">
                    <div>
                      <button name="cSubmit" class="btn btn-primary form-control" type="submit">Add game</button>
                    </div>
		    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($queryResult)){
        echo "</div>";
    } ?>

    </div>

    <hr class="hr" />

    <div class="container align-items-center">
    <div class="card mt-2">
        <div class="card-header">
            <button class="btn form-control text-start" data-bs-toggle="collapse" data-bs-target="#myGames"><h4>My games</h4></button>
        </div>
        <div id="games" class="collapse show">
            <div class="card-body">

                <?php

                foreach ($dataFetch['games'] as $res){
                    $text = "Unapproved";
                    $border = "border-danger slightly-red-background";
                    $button = "btn-outline-danger";
                    $color = "text-danger";
                    if($res['approved'] == 1) {
                        $text = "Approved";
                        $border = "border-success slightly-green-background";
                        $button = "btn-outline-success";
                        $color = "text-success";
                    }
                    ?>

                    <div class="container border <?= $border ?> rounded p-3 mt-2">
                        <div class="row">
                            <div class="col-sm-8">
                                 <b class="<?= $color ?>"><?= $text ?></b>
                                <h4><?= $res['home'] . " x " . $res['away'] ." (".$res['date']." ".$res['time'].") " ?></h4>
                                <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" onClick="location.href='index.php?page=gamedetail&id=<?= $res['id'] ?>'" class="btn <?= $button ?> m-1 pull-right">More</button>
                            </div>
                        </div>
                        <div>
                            <p><?= $res['text'] ?></p>
                        </div>
                    </div>
                    <?php } ?>

            </div>
        </div>
    </div>
    </div>
</div>

<script>
    //jQuery input mask for control Data and time formats
    $(document).ready(function(){
        $('#labelDate').mask('0000-00-00');
        $('#labelTime').mask('00:00');
    });
    </script>
