<?php
$project_info = Model::factory("Projects")->get_by_id($project_id);
$tasks = Model::factory("Tasks")->get_by_project_id($project_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<link rel='stylesheet' type='text/css' href='<?=URL::site('assets/css/main.css');?>' />
</head>
<body>

<h1>Projects &raquo; Details: <?=$project_info['name']; ?></h1>
<p><a href='<?=URL::site( 'projects' );?>'>&larr; back to Projects</a></p>

<table>
	<tr>
		<th class='C'>Due</th>
		<th>Task Name</th>
		<th class='C'>Completed</th>
	</tr>
<?php
$to_echo = '';
foreach($tasks as $t)
{
	$to_echo .= "\t<tr".( $t['completed'] ? " class='complete'" : "" ).">\n";
	$to_echo .= "\t\t<td class='C'>".date( 'm/d/Y', strtotime( $t['due_at'] ) )."</td>\n";
	$to_echo .= "\t\t<td>{$t['name']}</td>\n";
	$to_echo .= "\t\t<td class='C'>".( $t['completed'] ? "yes" : "no" )."</td>\n";
	$to_echo .= "\t</tr>\n";
}
echo $to_echo;
?>
</table>

</body>
</html>
