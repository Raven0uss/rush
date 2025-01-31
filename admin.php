<?php
session_start();
$cat = unserialize(file_get_contents('database/categories'));
$prod = unserialize(file_get_contents('database/products'));
$account = unserialize(file_get_contents('database/account'));

function    delete_case($path, $ref_class, $id)
{
	$ret = FALSE;
	if (file_exists($path) == TRUE)
	{
		$content = file_get_contents($path);
		$content = unserialize($content);
		$i = 0;
		while ($content[$i] != NULL && $content[$i][$ref_class] != $id)
			$i++;
		if ($content[$i][$ref_class] == $id)
		{
			unset($content[$i]);
			$content = array_values($content);
			$ret = TRUE;
		}
		$content = serialize($content);
		file_put_contents($path, $content);
	}
	return ($ret);
}


if ($_POST['addcat'] != NULL && $_POST['subaddcat'] == "ADD")
{
	$newcat = array($_POST['addcat'] => $_POST['addcat']);
	$cat[] = $newcat;
	file_put_contents('database/categories', serialize($cat));
	echo "Category ".$_POST['addcat']." added";
}

if ($_POST['delcat'] != NULL && $_POST['subdelcat'] == "DELETE")
{

}

if ($_POST['addprod'] != NULL && $_POST['addprodcat'] != NULL && $_POST['subaddprod'] == "ADD")
{
}

if ($_POST['delprod'] != NULL && $_POST['subdelprod'] == "DELETE")
{
	if (delete_case('database/products', 'id', $_POST['delprod'] == TRUE))
		echo 'Product deleted';
	else
		echo 'Deletion problem';
}

if ($_POST['login'] != NULL && $_POST['password'] != NULL && $_POST['firstname'] != NULL && $_POST['lastname'] != NULL && $_POST['address'] != NULL && $_POST['email'] != NULL && $_POST['subadduser'] == "ADD")
{
	$data = array('login' => $_POST['login'], 'password' => $_POST['password'], 'firstname' => $_POST['firstname'],     'lastname' => $_POST['lastname'], 'address' => $_POST['address'],'email' => $_POST['email'], 'rank' => 'user');
		$i = 0;
	$file = unserialize(file_get_contents('database/account'));
	while ($file[$i] != NULL && $file[$i]['login'] != $_POST['login'])
		$i++;
	if ($file[$i]['login'] == $_POST['login'])
	{
		echo "Login ".$_POST['login']." already exists";
	}
	else
	{
		$file[] = $data;
		file_put_contents('database/account', serialize($file));
		echo "User ".$_POST['login']." added";
	}
}

if ($_POST['deluser'] != NULL && $_POST['subdeluser'] == "DELETE")
{
	$i = 0;
	while ($account[$i] != NULL && $account[$i]['login'] != $_POST['deluser'])
		$i++;
   if ($account[$i]['login'] == $_POST['deluser'])
   {
	   $account[$i]['login'] = NULL;
	   $account[$i]['password'] = NULL;
	   $account[$i]['firstname'] = NULL;
	   $account[$i]['lastname'] = NULL;
	   $account[$i]['address'] = NULL;
	   $account[$i]['email'] = NULL;
	   $account[$i]['rank'] = NULL;
	   file_put_contents('database/account', serialize($account));
	   echo "User ".$_POST['login']." deleted";
   }
}
?>

<html><body>
	<form action="index.php?link=admin" method="POST">
	<br />
	ADD CATEGORY
	<br />
	Category name: <input type="text" name="addcat" value=""/>
	<br />
	<input type="submit" name="subaddcat" value="ADD"/>
	<br />
	<br />
	DELETE CATEGORY
	<br />
	Category name: <input list="browser" type="text" name="delcat" value=""/>
	<datalist id="browser">
	</datalist>
	<br />
	<input type="submit" name="subdelcat" value="DELETE"/>
	<br />
	<br />
	ADD PRODUCT
	<br />
	Product Name: <input type="text" name="addprod" value=""/>
	<br />
	Category: <select></select>
	<br />
	Sales: <select id="addprod">
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
	<br />
	Product id: <input type="text" name="addprod" value=""/>
	<br />
	Picture url: <input type="text" name="addprod" value=""/>
	<br />
	Product description: <input type="text" name="addprod" value=""/>
	<br />
	Price: <input type="text" name="addprod" value=""/>
	<br />
	<input type="submit" name="subaddprod" value="ADD"/>
	<br />
	<br />
	DELETE PRODUCT
	<br />
 	Product Name: <input type="text" name="delprod" value=""/>
	<br />
	<input type="submit" name="subdelprod" value="DELETE"/>
	<br />
	<br />
	ADD USER
	<br />
	User login: <input type="text" name="login" value=""/>
	<br />
    Password: <input type="password" name="password" value=""/>
	<br />
	First name: <input type="text" name="firstname" value=""/>
 	<br />
	Last name: <input type="text" name="lastname" value=""/>
	<br />
 	Address: <input type="text" name="address" value=""/>
 	<br />
 	Email: <input type="text" name="email" value=""/>
 	<br />
	<input type="submit" name="subadduser" value="ADD"/>
	<br />
	<br />
	DELETE USER
	<br />
	User login:<input type="text" name="deluser" value=""/>
	<br />
	<input type="submit" name="subdeluser" value="DELETE"/>
	<br />
	<br />
	PENDING CHECKOUTS
	<br />
	</form>
</body></html>
