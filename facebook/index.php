<?php 
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '1528255260735985',
		'secret' => '212e39946954817bc76fec4ce27688ef'
	));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Facebook PHP</title>
</head>
<body>
<?php
	//get user from facebook object
	$user = $facebook->getUser();
	
	if ($user): //check for existing user id
		echo '<p>User ID: ', $user, '</p>';
		$user_graph = $facebook->api('/me');

		echo '<h1>Hello ',$user_graph['first_name'],'</h1>';
		echo '<p>Your birthday is: ',$user_graph['birthday'],'</p>';

		//Print out favorite sports
		if ($user_graph['sports']):
			echo '<h2>Favorite Sports</h2>';
			echo '<ul>';
			foreach ($user_graph['sports'] as $key => $value) {
				echo '<li>',$value['name'],'</li>';
			}
			echo '<ul>';
		endif; //Check for sports

		echo '<pre>',print_r($user_graph),'</pre>';
		
		//print logout link
		echo '<p><a href="logout.php">logout</a></p>';
	else: //user doesn't exist
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'scope'=>'email',
			'redirect_uri' => 'http://apps.facebook.com/tcfirstapp'
		));
		echo '<p><a href="', $loginUrl, '" target="_top">login</a></p>';
	endif; //check for user id
?>
</body>
</html>