<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: registrazione_utente.php");
    exit();

?>