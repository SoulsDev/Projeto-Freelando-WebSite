<?php
    session_start();
?>
<html>

<body>
    <?php
        echo $_SESSION['tipo'];
    ?>
    <a href="logoff.php">
        logoff
    </a>
</body>
</html>