<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tasks extends Model_Database {

	public function get_by_project_id($id)
	{
		$r = DB::query( Database::SELECT, "SELECT t.* FROM tasks AS t WHERE t.project_id = :id ORDER BY t.due_at, t.name" )->bind( ":id", $id )->execute();
		return $r;
	}

	public function add_task($project_id, $due_at, $name)
	{
		return DB::query( Database::INSERT, "INSERT INTO tasks ( project_id, name, due_at ) VALUES ( :id, :name, :due )" )->bind( ':id', $project_id )->bind(':name', $name )->bind( ':due', $due_at )->execute();
	}

}

?>

