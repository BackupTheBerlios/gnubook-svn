<?php
session_start();
if((isset($_SESSION['login'])) AND (isset($_GET['id']))) {
$idami = $_GET['id'];
$nomami = $_SESSION['lastname'];
$nom = $_SESSION['login'];
$id = $_SESSION['myid'];
}
?>