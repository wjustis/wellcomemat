<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller {

	public function action_index()
	{
		return $this->action_list();
	}

	public function action_list()
	{
		$view = View::factory( 'projects/list' );
		$this->response->body( $view );
	}

	public function action_details()
	{
		$project_id = $this->request->param( 'id', FALSE );
		if( $project_id === FALSE ) return $this->action_list();
		$view = View::factory( 'projects/details' );
		$view->project_id = $project_id;
		$this->response->body( $view );
	}

	public function action_add()
	{
		$project_id = Arr::get($_POST, 'project_id', FALSE );
		$due_at = Arr::get($_POST, 'due_at', FALSE );
		$name = Arr::get($_POST, 'name', FALSE );
		if($project_id === false || $due_at === FALSE || $name === FALSE) $this->redirect( 'projects' );
		Model::factory( 'Tasks' )->add_task( $project_id, $due_at, $name );
		$this->redirect( 'projects/details/'.$project_id );
	}

	public function action_update()
	{
		$task_id = Arr::get( $_POST, 'task_id', FALSE );
		$is_complete = Arr::get( $_POST, 'complete', FALSE );
		if( $task_id === false ) return;
		Model::factory( 'Tasks' )->set_complete( $task_id, $is_complete );
	}

}

?>
