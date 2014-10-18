<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tasks extends Model_Database {

	public function get_by_project_id($id)
	{
		$r = DB::query( Database::SELECT, "SELECT t.* FROM tasks AS t WHERE t.project_id = :id ORDER BY t.due_at, t.name" )->bind( ":id", $id )->execute();
		return $r;
	}

}

?>

