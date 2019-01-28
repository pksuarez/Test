<?php
    session_start();
    echo "<h1>SuperGlobals Pagina 2</h1>";
    echo $_SESSION['saludo'];
    session_unset();
    session_destroy();

?>