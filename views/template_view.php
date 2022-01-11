<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>MVC Site</title>
</head>
<body>
    <a href="<?= 'http://' . $_SERVER['HTTP_HOST']  ?>">Main page</a>
	<?php include 'views/'. $content_view; ?>
</body>
</html>