<?php
include_once 'header.php';
?>

<script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>

<div class="allButFooter">
    <main>
        <section class="login-register-banner">
            <div class="vertical-center">
                <h2>Contact</h2>
            </div>
        </section>
        <div class="wrapper">
            <div class="contact-container">
                <?php
                    if (isset($_SESSION["name"])) {
                        echo "<form class='contact-form' action='contactform.php' method='post'>
                            <input type='text' name='name' placeholder='Full Name...' value='" . $_SESSION['name'] . "' readonly='readonly'>
                            <input type='text' name='mail' placeholder='Email...' value=" . $_SESSION['email'] . " readonly='readonly'>
                            <input type='text' name='subject' placeholder='Subject...'>
                            <textarea style='resize:none;' name='message' placeholder='Message...'></textarea>
                            <button class='contact-button-submit' type='submit' name='submit'>Send Email</button>
                        </form>";
                    } else {
                        echo '<form class="contact-form" action="contactform.php" method="post">
                            <input type="text" name="name" placeholder="Full Name...">
                            <input type="text" name="mail" placeholder="Email...">
                            <input type="text" name="subject" placeholder="Subject...">
                            <textarea style="resize:none;" name="message" placeholder="Message..."></textarea>
                            <button class="contact-button-submit" type="submit" name="submit">Send Email</button>
                        </form>';
                    }
                ?>

                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p> Fill in all fields! </p>"; 
                        } else if ($_GET["error"] == "invalidemail") {
                            echo "<<p> Please fill in a valid email! </p>"; 
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











        

