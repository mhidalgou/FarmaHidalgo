<?php  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <title>Farmacias Hidalgo</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="js/funciones.js"></script>
      <link rel="stylesheet" href="css/formatos.css">
    </head>
    <?php include('menu.php'); ?>
    <?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
      <body style="background-color:rgba(254,254,254,0.1);">
    <?php endif; ?>
    <?php if ($_SESSION['usuario']['fk_idrol'] == 2): ?>
      <body style="background-color:rgba(235,245,251,0.5);">
    <?php endif; ?>

