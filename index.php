<?php include "header.php"; ?>

<div class="placeholder"></div>

<div class="container">
    <?php include (!isset($_GET['page'])?'pages/home.php' : 'pages/'.$_GET['page'].'.php'); ?>
</div>

<div class="container">
    <?php include "footer.php"; ?>
</div>
			