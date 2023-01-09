<?php

global $dataFetch;
global $queryResult;

?>

<div class="container">
    <div class="container col-8">
    <div class="card mt-2">
        <div class="card-header">
            <button class="btn form-control text-start" data-bs-toggle="collapse" data-bs-target="#reviews"><h4>Reviews</h4></button>
        </div>
        <div id="clanek" class="collapse show">
            <div class="card-body">
                <?php
                if (isset($queryResult)) {
                    if ($queryResult == 0) { ?>
                        <div class="alert alert-success text-center" role="alert">
                            <div class="container mb-2">
                                <b>Review deleted successfuly.</b>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <div class="container mb-2">
                                <b>Review update or delete problem occured.</b>
                            </div>
                        </div>
                    <?php
                    }
                }
                foreach ($dataFetch['reviews'] as $res){
                    $border = "border-success slightly-green-background";
                    $button = "btn-outline-success";
                    $color = "text-success";
                    ?>
                    <div class="container border <?= $border ?> rounded p-3 mt-2">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4><?= "(".$res['home'] ." x " . $res['away'] .") Risk = ".$res['risk']." Useful = ".$res['useful']."" ?></h4>
                                <p class="lead"><i class="fa fa-user"></i> <?= $res['username'] ?></p>
                            </div>
                            <div class="col-sm-4">
                                    <form method="post">

                                        <button type="button" name="rDelete" onclick="if (confirm('Do you really want to delete this review?'))  {this.form.button.value='rDelete';this.form.submit()};" class="btn m-1 pull-right btn-outline-danger">Delete</button>

                                        <input type="hidden" name="id" value="<?= $res['reviewid'] ?>">
                                        <input type="hidden" name="button" value="">

                                    </form>



                            </div>
                        </div>
                        <div>
                            <p><?= $res['reviewtext'] ?></p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    </div>
</div>
