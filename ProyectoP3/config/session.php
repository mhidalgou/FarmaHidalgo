<?php
session_start();
if (isset($_SESSION['usuario'])) {
		$rest = $_SESSION['usuario']['time'] - time();
		if ($rest <= 0) {
			header('Location: login/');
		}
}else{
	header('Location: login/');
}
?>
