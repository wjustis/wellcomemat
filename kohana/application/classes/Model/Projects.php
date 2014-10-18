<?php defined('SYSPATH') or die('No direct script access.');

class Model_Projects extends Model_Database {

	public function get_by_id($id)
	{
		$r = DB::query( Database::SELECT, "SELECT p.* FROM projects AS p WHERE p.id = :id" )->bind( ":id", $id )->execute()[0];
		return $r;
	}

	public function get_all()
	{
		$r = DB::query( Database::SELECT, "SELECT p.* FROM projects AS p ORDER BY p.name" )->execute();
		return $r;
	}

}

?>
