<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!<br /><br />Maybe you are looking for the <a href="'.URL::site('projects').'">projects</a> page?');
	}

} // End Welcome
