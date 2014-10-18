<?php
$project_info = Model::factory("Projects")->get_by_id($project_id);
$tasks = Model::factory("Tasks")->get_by_project_id($project_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projects</title>
	<link rel='stylesheet' type='text/css' href='<?=URL::site('assets/css/main.css');?>' />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

<h1>Projects &raquo; Details: <?=$project_info['name']; ?></h1>
<p><a href='<?=URL::site( 'projects' );?>'>&larr; back to Projects</a></p>

<table>
	<tr>
		<th class='C'>Due</th>
		<th>Task Name</th>
		<th class='C'>Complete</th>
	</tr>
<?php
$to_echo = '';
foreach($tasks as $t)
{
	$to_echo .= "\t<tr".( $t['completed'] ? " class='complete'" : "" ).">\n";
	$to_echo .= "\t\t<td class='C'>".date( 'm/d/Y', strtotime( $t['due_at'] ) )."</td>\n";
	$to_echo .= "\t\t<td>{$t['name']}</td>\n";
	$to_echo .= "\t\t<td class='C'>";
	$to_echo .= "<input type='checkbox'".( $t['completed'] ? " checked" : "" )." onchange='toggleComplete( this )' data-task='{$t['id']}' />";
	$to_echo .= "</td>\n";
	$to_echo .= "\t</tr>\n";
}
echo $to_echo;
?>
</table><br />

<input type='button' onclick='toggleForm(this);' value='Add New Task' style='display: block; margin: auto;' /><br />
<form id='newtask' method='post' action='<?=URL::site('projects/add');?>' style='display: none;'>
	<input type='hidden' name='project_id' value="<?=htmlentities($project_id);?>" />
	<label for='date'>Due At:</label><input id='date' name='due_at' required />
	<label for='name'>Task Name:</label><input id='name' name='name' required />
	<input type='submit' value='Add Task' />
	<input type='reset' />
</form>

<script type='text/javascript'>
function toggleForm(btn_el)
{
	var form_el = document.getElementById( 'newtask' );
	var showing = ( form_el.style.display != 'none' );
	if(showing)
	{
		btn_el.value = "Add New Task";
		form_el.style.display = "none";
	}
	else
	{
		btn_el.value = "Hide Form";
		form_el.style.display = "block";
		form_el.getElementsByTagName( 'input' )[0].select();
	}
}
function toggleComplete(cb_el)
{
	var is_checked = cb_el.checked;
	var task_id = cb_el.getAttribute( 'data-task' );
	$.post( '<?=URL::site('projects/update');?>', { 'task_id':task_id, 'complete':is_checked }, function(resp)
	{
		if(resp.length > 0) console.log( resp );
		var tr = cb_el.parentNode.parentNode;
		if(is_checked) tr.setAttribute( 'class', 'complete' );
		else tr.removeAttribute( 'class' );
	});
}
</script>
</body>
</html>
