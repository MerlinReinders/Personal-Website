<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo = "merlinreinders@gmail.com";
    $headers = "From: ". $mailFrom;
    $txt = "You have received an email from ".$name.".\n\n".$message;

    if (emptyInputContact($name, $mailFrom) != false) {
        header("location: ../contact.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($mailFrom) != false) {
        header("location: ../contact.php?error=invalidemail");
        exit();
    }

    mail($mailTo, $subject, $txt, $headers);
    header("location: ../index.php?mailsent");
}