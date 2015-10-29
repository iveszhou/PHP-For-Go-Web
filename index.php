<?php
require 'lib/Parsedown.class.php';
if(isset($_GET['file'])){
	$file = $_GET['file'];
} else {
	$file = 'preface.md';//默认首页
}
$file = 'file/'.$file;//文件路径（相对路径）
$content = '';//初始化$content
if(file_exists($file)){
	$content = file_get_contents($file);
} else {
	header('HTTP/1.1 404 Not Found');
}
?>

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
  <div class="col-sm-12 col-lg-12 col-md-12">
<?php
if(empty($content)){
	echo '<h1>页面不存在！</h1>';
} else {
	$Parsedown = new Parsedown();
	echo $Parsedown->text($content); # prints: <p>Hello <em>Parsedown</em>!</p>
}
?>
  </div>
  <div class="col-sm-12 col-lg-12 col-md-12">
    <footer>
	<hr>
	Go Web编程的github地址为：https://github.com/astaxie/build-web-application-with-golang<br />
	本项目的github地址为：https://github.com/iveszhou/PHP-For-Go-Web<br />
	</footer>
  </div>
</div><!-- /.container -->
</body>
</html>
