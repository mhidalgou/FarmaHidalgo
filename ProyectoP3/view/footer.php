<?php  ?>
	<br>
	<br>
	<span><?php echo $_SESSION['usuario']['nombre']; ?><strong><?php echo "-".$roll; ?></strong></span>
    <?php echo "la session finaliza en ";?>
    <strong><?php echo ($_SESSION['usuario']['time']-time()); ?></strong>
  </body>
</html>
