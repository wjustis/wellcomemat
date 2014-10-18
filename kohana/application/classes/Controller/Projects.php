<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller {

	public function action_index()
	{
		$project_id = $this->request->param( 'id', FALSE );
		if( $project_id === FALSE ) return $this->action_list();
		$view = View::factory( 'projects/details' );
		$view->project_id = $project_id;
		$this->response->body( $view );
	}

	public function action_list()
	{
		$view = View::factory( 'projects/list' );
		$this->response->body( $view );
	}

}

?>
