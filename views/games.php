<?php

global $dataFetch;

?>

<div class="container">
    <div class="container col-8">

        <?php
        if(isset($dataFetch['games'])){
            foreach ($dataFetch['games'] as $res){
                if(!$res['approved']){
                    continue;
                }
                ?>
                <div class="container border border-secondary rounded p-3 mt-2">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4><?= $res['home'] . " x " . $res['away'] ." (".$res['date'].") " ?></h4>
                            <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" onClick="location.href='index.php?page=gamedetail&id=<?= $res['id'] ?>'" class="btn btn-outline-secondary m-1 pull-right">More</button>
                        </div>
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
            if(count($dataFetch['games']) == 0){
                echo "<h3>Games not found.</h3>";
            }
        } ?>

    </div>
</div>
