<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Current_Controller extends Controller {

	public $auto_render = TRUE;
 	
 	public function __construct()
	{
		parent::__construct(); //necessary
		
		$this->playlist_model = new Playlist_Model;
		$this->layout_model   = new Layout_Model;
	}
 
 	public function index()
	{

	}

	
	public function layout()
	{
		//$view = new View('/shadadmin/current');
		
		$current_layout = $this->layout_model->get_current_layout();
	
		foreach ($current_layout as $current_layouts)
		{
			//$view->current_layout_id = $current_layouts->layout_id;
			$layout_id = $current_layouts->layout_id;
		}
		
		//$view->render(TRUE);
		
		url::redirect('xml/layout/'.$layout_id);
	}
}

?>