<?php require 'lib/Parsedown.class.php'; ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>golang web编程！</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <?php
    if(isset($_GET['file'])){
		$file = $_GET['file'];
	} else {
		$file = '01.0.md';
	}
	$file = str_replace('<', '', $file);
	$file = str_replace('>', '', $file);
	$content = file_get_contents('file/'.$file);
	$Parsedown = new Parsedown();
	echo $Parsedown->text($content); # prints: <p>Hello <em>Parsedown</em>!</p>
?>
    </div><!-- /.container -->
  </body>
</html>
