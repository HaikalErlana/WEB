<?php 
    session_start();

    unset($_SESSION["username"]);
    session_destroy();
    ?>
    <script>
        alert('Logout Berhasil!!');
        window.location = '../index.php?pesan=logout';
    </script>
    <?php
?>