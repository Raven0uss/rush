<?php
function file_manager($data, $path)
{
	if (file_exists($path) == TRUE)
	{
		$array = file_get_contents($path);
		$array = unserialize($array);
		$array[] = $data;
		$content = $array;
	}
	else
		$content[0] = $data;
		if ($content != NULL)
		{
			$array = serialize($content);
			if (file_exists('database/') == FALSE)
				mkdir('database/');
			file_put_contents($path, $array);
		}
		else
			echo 'ERROR';
}

$data = NULL;
$data['login'] = 'admin';
$data['password'] = 'admin';
$data['firstname'] = 'admin';
$data['lastname'] = 'admin';
$data['address'] = 'admin';
$data['email'] = 'admin';
$data['rank'] = 'admin';
file_manager($data, 'database/account');

$data = NULL;
$data['katana'] = 'katanas';
$data['shuriken'] = 'shurikens';
$data['nunchuk'] = 'nunchuks';
$data['sales'] = 'sales';
file_manager($data, 'database/categories');

$data = NULL;
$data['item'] = 'Thaitsuki Nihonto Katana';
$data['type1'] = 'katana';
$data['type2'] = 'sales';
$data['picture'] = 'http://www.yelomart.fr/wp-content/uploads/2016/01/katana.jpg';
$data['carac'] = 'Thaitsuki Nihonto is steeped in tradition and quality with blades produced by a family forge thats been perfecting their art for over 200 years. The Sivrat family first obtains the finest quality high carbon Japanese steel to produce their Kumori Katana, which is forged in the oldest tradition in Japanese swordmaking, the Yamato Nihonto tradition.
Overall: 41" (104.1 cm)
Blade: 29 1/2" (74.93 cm)
Tang: 10" (25.4 cm)
Tsuka: 11" (27.94 cm)
Weight: 2.5 lbs. (1.2 kg)
Balance Point: 5 1/2" (14cm)';
$data['price'] = '1200';
file_manager($data, 'database/products');
?>
