<?php
session_start();
$file = unserialize(file_get_contents('database/products'));
?>
<html><body>
<br />
<td><a href="./index.php?link=cat&cat=katana">KATANAS</a></td>
<br />
<?php
if ($_GET['cat'] == 'katana')
{
	$i = 0;
	while ($file[$i] != NULL)
	{
		if ($file[$i]['type1'] != $_GET['cat'])
		{
			echo $file[$i]['item']."- NOW ON SALES !"."\n";
			echo '<br />';
			echo '<img src='.$file[$i]['picture'].' />'."\n";
			echo '<br />';
			echo $file[$i]['carac']."\n";
			echo '<br />';
			echo "Price: was ".$file[$i]['price']."€  -  NOW 999€ ONLY !"."\n";
			echo '<br />';
		}
		$i++;
	}
}
?>
<br />
<td><a href="./index.php?link=cat&cat=shuriken">SHURIKENS</a></td>
<br />
<br />
<td><a href="./index.php?link=cat&cat=nunchuk">NUNCHUKS</a></td>
<br />
<br />
<td><a href="./index.php?link=cat&cat=sales">SALES</a></td>
<br />
<?php
if ($_GET['cat'] == 'sales')
{
	$i = 0;
	while ($file[$i] != NULL)
	{
		if ($file[$i]['type2'] != $_GET['cat'])
		{
			echo $file[$i]['item']."- NOW ON SALES !"."\n";
			echo '<br />';
			echo '<img src='.$file[$i]['picture'].' />'."\n";
			echo '<br />';
			echo $file[$i]['carac']."\n";
			echo '<br />';
			echo "Price: was ".$file[$i]['price']."€  -  NOW 999€ ONLY !"."\n";
			echo '<br />';
		}
		$i++;
	}
}
?>
<br />
</body></html>
