<?php

global $dataFetch;
global $queryResult;

if(in_array(appSession::get('group_name'), array('superadmin','admin'))){?>
    <div class="container">
        <div class="card table-responsive">
            <div class="card-body">
                <h5 class="card-title mb-0">Manage user</h5>
            </div>

    <?php
    if (isset($queryResult)) {
         if ($queryResult == 1) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <div class="container">
                    <b>Error.</b>
                </div>
            </div>
    <?php
        } else {
             ?>
             <div class="alert alert-success text-center" role="alert">
                 <div class="container mb-2">
                     <b>Updated.</b>
                 </div>
             </div>
                 <?php
         }
    } ?>

            <table class="table table-striped table-sm mb-0">
                <thead>
                <tr>
                    <th class="border-0 col-auto">ID</th>
                    <th class="border-0 col-auto">Username</th>
                    <th class="border-0 col-auto">E-mail</th>
                    <th class="border-0 col-auto">Authorization</th>
                    <th class="border-0 col-auto"></th>
                    <th class="border-0 col-auto"></th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($dataFetch['users'] as $res){ ?>
                    <tr class="align-middle">
                        <td><?= $res['id'] ?></td>
                        <td><?= $res['username'] ?></td>
                        <td><?= $res['mail'] ?></td>
                        <td>
                            <?php
                            if(!in_array(appSession::get('group_name'), array('superadmin'))){
                                echo $res['nazev']."</td><td></td><td></td>";
                            } else {
                                echo "<form method='post'>";
                                echo "<input type='hidden' name='id' value='".$res['id']."'>";
                                echo "<select class='w-110px' name='group_id'>";
                                foreach ($dataFetch['groups'] as $auth) {
                                    $selected = "";
                                    if ($auth['nazev'] == $res['nazev']) {
                                        $selected = "selected";
                                    }
                                    echo "<option value=\"" . $auth['id'] . "\" " . $selected . ">" . $auth['nazev'] . "</option>";
                                } ?>
                            </select>
                        </td>
                        <td>
                            <button name="update" style="width:80px" type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
                        </td>
                        <td>
                            <button name="delete" onclick="return confirm('Do you really want to delete this user? <?= $res['username'] ?>?')" type="submit" style="width:80px" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                        </form>
                        <?php } ?>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

<?php } ?>
