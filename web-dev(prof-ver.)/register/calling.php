<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'foogs_db');

    $fN = 'select firstname from users where email = '.$_SESSION['email'].'';

    $firstname = mysqli_query($conn, $fN);
?>