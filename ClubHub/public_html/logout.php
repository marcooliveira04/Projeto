<?php
session_start();

require_once 'controller/SessionController.php';

$controller = new SessionController($_SESSION['tipo']);

$controller->logout();

?>