<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

session_start();
$_SESSION['id'] = null;

echo '<script>document.location="index.php"</script>'

    ?>

