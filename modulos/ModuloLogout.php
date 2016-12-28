<?php
session_start();
include('include/ModuloLogin.php');
$usuario = new User();
$idu = $_SESSION['idu']:
if (!$user ->inicio_sesion()){
	header("location:../index.php");
}

if (isset($_GET['out'])){
	$usuario->fin_sesion();
	header("location:../index.php");

} 
?>