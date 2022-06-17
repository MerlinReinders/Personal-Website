<?php
session_start();
?>

<!DOCTYPE html> 
    <html>
    <head>
        <title>Merlin's Website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class="header-name-div">
                <a href="index.php" class="header-name">Merlin Reinders</a>
            </div>
            <nav>
                <ul>
                   <li><a href="#">Projects</a></li>
                   <li><a href="about-me.php">About Me</a></li>
                   <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="header-login-register">
                    <?php
                        if (isset($_SESSION["username"])) {
                            echo "<p class='display-username'>" . $_SESSION['username'] . "</p> 
                            <a href='includes/logout.inc.php' class='login-register-buttons'>Logout</a>";
                        } else {
                            echo "<a href='register.php' class='login-register-buttons'>Register</a>
                            <a href='login.php' class='login-register-buttons'>Login</a>";
                        }  
                    ?>
                </div>  
        </header>