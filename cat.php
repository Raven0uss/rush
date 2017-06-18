<?php
session_start();
//include 'add_bag.php';
 	function modif_qty_bag($id, $n_qty)
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0; $i < $nb_items; $i++)
            if ($id == $_SESSION['bag']['id'][$i])
                $_SESSION['bag']['qty'][$i] = $n_qty;
    }
    function add_bag($data) //$data = array de donnees de l'article (id, nom, prix, quntite)
    {
        session_start();
        if (!isset($_SESSION['bag']))
        {
            $_SESSION['bag'] = array();             // Panier
            $_SESSION['bag']['id'] = array();
            $_SESSION['bag']['item'] = array();     // Nom de l'article
            $_SESSION['bag']['price'] = array();    // Prix de l'article
            $_SESSION['bag']['qty'] = array();       // Quantite
            echo("Bag has been created\n\n");
        }
        array_push($_SESSION['bag']['id'], $data['id']);
        array_push($_SESSION['bag']['item'], $data['item']);
        array_push($_SESSION['bag']['qty'], $data['qty']);
        array_push($_SESSION['bag']['price'], $data['price']);
        echo("Article added with success\n\n");
    }

    function isinbag($id)
    {
        session_start();
        if (count($_SESSION['bag']['id']) === 0)
            return (FALSE);
        foreach ($_SESSION['bag']['id'] as $key)
            if ($key == $id)
                return (TRUE);
        return (FALSE);
    }
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
	echo '<form action="add_bag.php" method="POST"><input type="hidden" name="id" value="1">
            <input type="hidden" name="price" value="'.'999.99'.'">
            <input type="hidden" name="item" value="'.'Katana'.'"> <input type="number" name="qty" step="1" value="1" max="99" min="1"><input type="submit" name="add" value="ADD TO BAG"/></form></';
	echo '<br />';
}
?>
<br />
<a href="./index.php?link=cat&cat=shuriken">SHURIKENS</a>
<br />
<br />
<a href="./index.php?link=cat&cat=nunchuk">NUNCHUKS</a>
<br />
<br />
<a href="./index.php?link=cat&cat=sales">SALES</a>
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
	echo '<form action="add_bag.php" method="POST"><input type="hidden" name="id" value="1">
            <input type="hidden" name="price" value="'.'999.99'.'">
            <input type="hidden" name="item" value="'.'Katana'.'"> <input type="number" name="qty" step="1" value="1" max="99" min="1"><input type="submit" name="add" value="ADD TO BAG"/></form></';
	echo '<br />';
}
?>
<br />
</body></html>
