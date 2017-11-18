<?php
session_start();
function mostraAlerta($tipo) {
    if (isset($_SESSION[$tipo])) {
        echo "<div class=\"alert alert-{$tipo} text-center\" role=\"alert\">{$_SESSION[$tipo]}</div>";
        unset($_SESSION[$tipo]);
    }
}
