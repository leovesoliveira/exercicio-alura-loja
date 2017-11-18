<?php
include 'logica-usuario.php';

logout();
$_SESSION["success"] = "Você saiu do sistema!";
header("Location: index.php");
die();
