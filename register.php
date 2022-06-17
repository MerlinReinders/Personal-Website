<?php
    include_once 'header.php';
?>

<script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>

<main>
    <section class="login-register-banner">
        <div class="vertical-center">
            <h2>Register</h2>
        </div>
    </section>
    <div class="wrapper">
        <div class="register-form-div">
            <form action="includes/register.inc.php" method="post">
                <input type="text" name="name" placeholder="Full Name...">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdRepeat" placeholder="Repeat Password...">
                <div class="form-submit">
                <button type="submit" name="submit" class="button-submit">Register</button>
                </div>
            </form>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill in all fields! </p>"; 
                    } else if ($_GET["error"] == "invalidusername") {
                        echo "<p> Please fill in a valid username! </p>"; 
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p> Please fill in a valid email! </p>"; 
                    } else if ($_GET["error"] == "passwordmatch") {
                        echo "<p> Passwords do not match! </p>"; 
                    } else if ($_GET["error"] == "usernametaken") {
                        echo "<p> This username/email is already registered in the database! </p>";
                    } else if ($_GET["error"] == "weakpassword") {
                        echo "<p> Password should be at least 8 characters in length and should include at least one upper case letter, one lowercase letter, one number, and one special character! </p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p> Something went wrong on our end, please refresh and try again! </p>";
                    } else if ($_GET["error"] == "none") {
                        echo "<p> You have successfully registered! <p>";
                    }
                } 
            ?>
        </div>
    </div>
</main>



<?php 
    include_once 'footer.php';
?>