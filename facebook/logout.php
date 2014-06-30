<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '1528255260735985',
		'secret' => '212e39946954817bc76fec4ce27688ef'
	));

	setcookie('fbs_'.$facebook->getAppId(),'', time()-100, '/', 'https://www.iviewsource.com');
	session_destroy();
	header('Location: index.php');
?>
