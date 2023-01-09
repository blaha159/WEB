<?php

global $queryResult;

?>

<div class="container text-center p-4 w-500px col-4">
    <div class="border border-secondary rounded-top shadow slightly-green-background p-4">
        <h3 class="">Login</h3>

        <?php
        if (isset($queryResult)) {
            if ($queryResult == 1) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <div class="container">
                    <b>Your username or password is incorrect. Please try again</b>
                </div>
            <?php
            }
        } ?>

	<div class="container-sm col-10">
        <form action="" method="post">
            <div class="form-floating mt-3 mb-3">
                <input type="text" name="lUsername" placeholder="Username" class="form-control" id="labelJmeno" required>
                <label for="labelJmeno" class="smaller-label">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="lPassword" placeholder="Password" class="form-control" id="labelHeslo" required>
                <label for="labelHeslo" class="smaller-label">Password</label>
            </div>
            <button name="lSubmit" class="btn  form-control btn-primary" type="submit">Log in</button>

        </form>
	</div>
    </div>

    <?php
    if(isset($queryResult) && $queryResult == 1){
        echo "</div>";
    } ?>

    <div class="border border-secondary border-bottom rounded-bottom shadow slightly-green-background mt-3">
        <div class="mt-2 mb-2">
            <span>If not registered:</span>
            <a href="index.php?page=register" class="link-primary no-underline-link">Register here</a>
        </div>
    </div>
</div>

