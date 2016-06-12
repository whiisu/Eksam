<?php 
    session_start(); 

?>
<!DOCTYPE html>
<html>
	<head>		
		<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		<link rel="stylesheet" type="text/css" href="stiil.css" />
	</head>
	<body class="body">
		<div class="menu">
		<ul>
  			
  			<li class="valitud"><a href="vorm.php">Lae pilt</a></li>
  			<p style="clear:both">
		</ul>
		</div>
		
	<div id="sisu" style="text-align: justify";>
	<form action="vorm.php" method="POST" enctype="multipart/form-data">
		<h1>Faili laadimine</h1>
		<br>
		<table>
			<tr>
				<td>Autor:</td>
				<td>Pealkiri:</td>
				<td>Dokument:</td>
				
			</tr>			
			<tr>
				
				<td><input type="text" name="autor"></td>
				<td><input type="text" name="pealkiri"></td>
				<td><input type="file" name="tekstifail" allowed_extensions = set(["txt"])></td>
			</tr>			
			
		</table>
		<br>
		<br>
		<button type="Submit">Lae uus fail</button>
	</form>
	</div>
	</body>
</html>
