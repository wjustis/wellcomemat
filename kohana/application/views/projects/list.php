<?php
$projects = Model::factory('Projects')->get_all();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<link rel='stylesheet' type='text/css' href='<?=URL::site('assets/css/main.css');?>' />
</head>
<body>

<h1>Projects</h1>
<?php
$to_echo = '';
foreach($projects as $p)
{
	$to_echo .= "<a class='project' href='".URL::site('projects/'.$p['id'])."'>{$p['name']}</a>\n";
}
echo $to_echo;
?>

</body>
</html>
