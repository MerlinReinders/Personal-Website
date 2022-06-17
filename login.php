<?php
    include_once 'header.php';
?>

<script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>

<div class="allButFooter">
    <main>
        <section class="login-register-banner">
            <div class="vertical-center">
                <h2>Login</h2>
            </div>
        </section>
        <div class="wrapper">
            <div class="register-form-div">
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="usernameoremail" placeholder="Username/Email...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <div class="form-submit">
                    <button type="submit" name="submit" class="button-submit">Login</button>
                    </div>
                </form>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p> Fill in all fields! </p>"; 
                        } else if ($_GET["error"] == "userdoesnotexist") {
                            echo "<p> This user does not exist in the database, please check your username or email and try again! </p>"; 
                        } else if ($_GET["error"] == "wronglogin") {
                            echo "<p> Password does not match the account you are attempting to access!</p>"; 
                        }
                    } 
                ?>
            </div>
        </div>
    </main>
</div>
<?php 
    include_once 'footer.php';
?>