<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tasks extends Model_Database {

	public function get_by_project_id($id)
	{
		$r = DB::query(Database::SELECT, "SELECT t.* FROM tasks AS t WHERE t.project_id = :id ORDER BY t.completed, t.due_at, t.name")
			->bind(":id", $id)
			->execute();
		return $r;
	}

	public function add_task($project_id, $due_at, $name)
	{
		return DB::query(Database::INSERT, "INSERT INTO tasks ( project_id, name, due_at ) VALUES ( :id, :name, :due )" )
			->bind(':id', $project_id)
			->bind(':name', $name)
			->bind(':due', $due_at)
			->execute();
	}

	public function set_complete($task_id, $is_complete=TRUE)
	{
		if( $is_complete === "true" || $is_complete === true ) $is_complete = true;
		else $is_complete = false;
		$c = ( $is_complete ? "1" : "0" );
		return DB::query(Database::UPDATE, "UPDATE tasks SET completed = :c WHERE id = :id")
			->bind(':c', $c)
			->bind(':id', $task_id)
			->execute();
	}

}

?>

