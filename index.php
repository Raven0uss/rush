<?php
session_start();
if (file_exists('database/account') == FALSE)
	include 'install.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href= 'css/style.css'>
		<meta charset="UTF-8">
		<title>minishop</title>
	</head>
	<body bgcolor="#f2effc">
		<table>
			<tr>
				<th><a href="./index.php">HOME</a></th>
				<th><a href="./index.php?link=cat">CATEGORIES</th>
				<th><a href="./index.php?link=bag">MY BAG</th>
<?php
	if ($_SESSION['log'] == 1)
	{
		echo '<th><a href="./index.php?link=myaccount">MY ACCOUNT</a></th>';
		echo '<th><a href="./logout.php">LOGOUT</a></th>';
	}
	else
	{
		echo '<th><a href="./index.php?link=login">LOGIN</a></th>';
		echo '<th><a href="./index.php?link=join">JOIN</a></th>';
	}
?>
			</tr>
		</table>
<?php
//view
	if ($_GET['link'] == "login")
	{
		if ($_GET['error'] == 1)
			echo "WRONG LOGIN / PASSWORD";
		include 'login.php';
	}
	else if ($_GET['link'] == "join")
	{
		include 'join.php';
	}
	else if ($_GET['link'] == "myaccount")
	{
		include 'myaccount.php';
	}
	else if ($_GET['link'] == "cat")
	{
		include 'cat.php';
		include 'add_bag.php';
	}
	else if ($_GET['link'] == "bag")
	{
		include 'bag.php';
		include 'del_item.php';
		include 'modify_qt.php';
	}
	else
		include 'home.php';
?>
	</body>
	<footer class="row">
		<p><a style="font-family: monospace; font-style: italic;">Powered by agaspard | sbelazou</a></p>
	</footer>
</html>
