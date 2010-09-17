<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Shadadmin_Controller extends Template_Controller {

	public $template = 'shadadmin';
	
 	public $auto_render = TRUE;
 	
 	public function __construct()
	{
		parent::__construct(); //necessary
	}
 
 	public function index()
	{
		//$this->template->title = 'Playlist';
	}
}

?>