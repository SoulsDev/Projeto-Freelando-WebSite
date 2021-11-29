<?php
    session_start();
?>
<html>

<body>
    <?php
        var_dump($_SESSION);
    ?>
    <a href="logoff.php">
        logoff
    </a>
</body>
</html>