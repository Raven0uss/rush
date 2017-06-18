<?php
    function calc_total()
    {
        session_start();
        $total = 0;
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0 ; $i < $nb_items; $i++)
            $total += ($_SESSION['bag']['price'][$i] * $_SESSION['bag']['qty'][$i]);
        return ($total);
    }
    function list_bag()
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        if ($nb_items == 0)
        {
            echo("Votre panier est vide.<br />");
            return ;
        }
        for ($i = 0 ; $i < $nb_items; $i++)
            echo("<form action='modify_qt.php'><input type='number' name='qty' step='1' value='".$_SESSION['bag']['qty'][$i]."' max='99' min='1'>"."x. ".$_SESSION['bag']['item'][$i]." - Price : ".$_SESSION['bag']['price'][$i]."<input type='submit' name='modify' value='Modify'></form>".'<form method="POST" action="del_item.php"><input type="submit" name="del_item" value="Delete"><input type="hidden" name="id" value="'.$_SESSION["bag"]["id"][$i].'"></form>'."<br /><br />");
        echo("\nTotal : ".calc_total().'<br />');
    }
    session_start();
    list_bag();
?>
<br />
<form method="POST" action="empty_bag.php">
    <input type="submit" name="emptybag" value="Empty my bag">
</form>