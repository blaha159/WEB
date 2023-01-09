<?php

global $queryResult;

?>

<div class="container text-center p-4 w-500px col-4">
    <div class="border border-secondary border-top rounded-top shadow slightly-green-background p-4">
        <h3>Registration</h3>

        <?php
        if (isset($queryResult)) {
            if ($queryResult == 0) { ?>
                <div class="alert alert-success text-center" role="alert">
                    <div class="container">
                        <b>Registration successful.</b>
                    </div>
                <?php
            } else if ($queryResult == 1) { ?>
                <div class="alert alert-danger text-center" role="alert">
                    <div class="container">
                        <b>Registration unsuccessful</b>
                        <p>Username already used.</p>
                    </div>
                <?php
            } else if ($queryResult == 2) { ?>
                <div class="alert alert-danger text-center" role="alert">
                    <div class="container">
                        <b>Registration unsuccessful</b>
                        <p>Email already used.</p>
                    </div>
                <?php
            } else if ($queryResult == 3) { ?>
                <div class="alert alert-danger text-center" role="alert">
                     <div class="container">
                         <b>Registration unsuccessful.</b>
                         <p>Passwords do not match.</p>
                     </div>
                <?php
            }
        } ?>

	<div class="container-sm col-10">
        <form method="post">
            <div class="form-floating mt-3 mb-3">
                <input type="text" name="rUsername" placeholder="Username" class="form-control" id="labelJmeno" required>
                <label for="labelJmeno" class="smaller-label">Username</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="email" name="rMail" placeholder="E-mail" class="form-control" id="labelEmail" required>
                <label for="labelEmail" class="smaller-label">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="rPassword" placeholder="Password" class="form-control" id="labelHeslo" required>
                <label for="labelHeslo" class="smaller-label">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="rPassword2" placeholder="Password again" class="form-control" id="labelHeslo2" required>
                <label for="labelHeslo2" class="smaller-label">Password again</label>
            </div>
            <button name="rSubmit" class="btn btn-primary form-control" type="submit">Register</button>
        </form>
        </div>
    </div>

    <?php
    if(isset($queryResult)){
        echo "</div>";
    } ?>

    <div class="border border-secondary border-bottom rounded-bottom shadow slightly-green-background mt-3">
        <div class="mt-2 mb-2">
            <span>Already have an account?</span>
            <a href="index.php?page=login" class="link-primary no-underline-link">Log in here</a>
        </div>
    </div>
</div>
