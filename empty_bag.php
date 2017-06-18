<?php
    function empty_bag()
    {
        session_start();
        unset($_SESSION['bag']);
        if (!isset($_SESSION['bag']))
           return (TRUE);
        return (FALSE);
    }
    if (empty_bag() === TRUE)
        echo("Bag's content has been removed.\n");
?>