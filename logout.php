<?php
require_once 'logica-usuario.php';

logout();
$_SESSION["warning"] = "Você saiu do sistema!";
header("Location: index.php");
die();
