<?php

global $dataFetch;
global $queryResult;

?>

<div class="container">
 <div class="container col-8">
    <div class="card mt-2">
        <div class="card-header">
            <button class="btn form-control text-start" data-bs-toggle="collapse" data-bs-target="#clanek"><h4>Games</h4></button>
        </div>
        <div id="game" class="collapse show">
            <div class="card-body">
                <?php
                if (isset($queryResult)) {
                    if ($queryResult == 0) { ?>
                        <div class="alert alert-success text-center" role="alert">
                            <div class="container mb-2">
                                <b>Game updated successfuly.</b>
                            </div>
                        </div>
                    <?php
                    } else if ($queryResult == 2) { ?>
                        <div class="alert alert-success text-center" role="alert">
                            <div class="container mb-2">
                                <b>Game deleted successfuly.</b>
                            </div>
                        </div>
                    <?php
                    } else if ($queryResult == 3) { ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <div class="container mb-2">
                                <b>Game cannot be deleted. Reviews exist.</b>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <div class="container mb-2">
                                <b>Game update or delete problem occured.</b>
                            </div>
                        </div>
                    <?php
                    }
                }
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
                    } ?>

                    <div class="container border <?= $border ?> rounded p-3 mt-2">
                        <div class="row">
                            <div class="col-sm-7">
                                <b class="<?= $color ?>"><?= $text ?></b>
                                <h4><?= $res['home'] . " x " . $res['away'] ." (".$res['date']." ".$res['time'].") " ?></h4>
                                <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                            </div>
                            <div class="col-sm-5">
                                    <form method="post">
                                        <button type="button" onClick="location.href='index.php?page=gamedetail&id=<?= $res['id'] ?>'" class="btn <?= $button ?> m-1 pull-right">More</button>
                                        <button type="button" name="gDelete" onclick="if (confirm('Do you really want to delete this game?'))  {this.form.button.value='gDelete';this.form.submit()};" class="btn m-1 pull-right btn-outline-danger">Smazat</button>
                                        <?php
                                        if($res['approved'] == 1){ ?>
                                            <button type="button" name="gRevoke" onClick="this.form.button.value='gRevoke';this.form.submit()" class="btn m-1 pull-right btn-warning ">Recall</button>
                                        <?php } else { ?>
                                            <button type="button" name="gConfirm" onClick="this.form.button.value='gConfirm';this.form.submit()" class="btn  m-1 pull-right btn-success">Approve</button>
                                        <?php } ?>
                                        <input type="hidden" name="id" value="<?= $res['id'] ?>">
                                        <input type="hidden" name="button" value="">

                                    </form>



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
                <?php } ?>

            </div>
        </div>
    </div>
    </div>
</div>
