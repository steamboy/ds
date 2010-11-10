<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Xml_Controller extends Controller {

	public $auto_render = TRUE;
 	
 	public function __construct()
	{
		parent::__construct(); //necessary
        
        functions::accountExpiration();
        		
		$this->playlist_model = new Playlist_Model;
		$this->layout_model   = new Layout_Model;
		
	}
 
 	public function index()
	{

	}
	
	//Video
    public function video($id)
	{
		$view = new View('/shadadmin/xmls/video-playlist-xml');
		
		$view->playlist_id      = $id;
		$view->playlist_content = $this->playlist_model->get_playlist_content('video_playlist',$id);
		$view->pl_count         = $this->playlist_model->get_current_content('video');
		
        //echo Kohana::debug($this->playlist_model->get_playlist_content('video_playlist',$id));
        
		$view->render(TRUE);
	}

    //Image
    public function image($id)
    {
        $view = new View('/shadadmin/xmls/image-playlist-xml');
        
        $view->playlist_id      = $id;
        $view->playlist_content = $this->playlist_model->get_playlist_content('image_playlist',$id);
        
        $view->render(TRUE);
    }
    
    //Text
	public function text($id)
	{
		$view = new View('/shadadmin/xmls/text-playlist-xml');
		
		$view->playlist_id      = $id;
		$view->playlist_content = $this->playlist_model->get_playlist_content('text_playlist',$id);
		
		$view->render(TRUE);
	}
	
	public function get_playlist_name($id)
	{
		$playlist = $this->playlist_model->get_playlist($id);
			
		foreach ($playlist as $playlists)
		{
			return $playlists->name;
		}
	}
	
	public function layout($layout_id=null)
	{
		$view = new View('/shadadmin/xmls/layout-xml');
		
		if (!$layout_id)
		{
			$current_layout = $this->layout_model->get_current_layout();
			
			foreach ($current_layout as $current_layouts)
			{
				$layout_id = $current_layouts->layout_id;
			}
		}
		
		$view->layout_id = $layout_id;
		
		// Get layout name
		//$layout = $this->layout_model->get_layout($layout_id);
		
		/*//set nulls
        $view->video_playlist_id       = '';
		$view->image_playlist_id       = '';
        $view->text_playlist_id        = '';
		$view->text_scroll_playlist_id = ''; //02-24-10: Text Scroll
		$view->time_component_id       = ''; //02-24-10: video only layout*/
		
        //Get Data from template holder
        $view->dstemplate_component_order = $this->layout_model->get_layout_component_order($layout_id);
        
        $component_types = array();
        
        //Get component type
        foreach ($view->dstemplate_component_order as $dstemplate_component_orders)
        {
            $component_types[] = $dstemplate_component_orders->dstemplate_component_type;
        }
                
        //Video
        if(in_array('video',$component_types))
        {
            $view->dstemplate_video = $this->layout_model->get_layout_component('component_video', $layout_id);    
        }
        
        //Image
        if(in_array('image',$component_types))
        {
            $view->dstemplate_image = $this->layout_model->get_layout_component('component_image', $layout_id);    
        }
        
        //Text Crawl
        if(in_array('text_crawl',$component_types))
        {
            $view->dstemplate_text = $this->layout_model->get_layout_component('component_text', $layout_id);    
        }
        
        //Text Scroll
        if(in_array('text_scroll',$component_types))
        {
            $view->dstemplate_text_scroll = $this->layout_model->get_layout_component('component_text', $layout_id);    
        }
        
        //Time
        if(in_array('time',$component_types))
        {
            $view->dstemplate_time = $this->layout_model->get_layout_component('component_time', $layout_id);    
        }
		
		$view->render(TRUE);
	}
	
	public function reload_to_no()
	{
		$current_layout = $this->layout_model->get_current_layout();
			
		foreach ($current_layout as $current_layouts)
		{
			$id = $current_layouts->layout_id;
		}
		
		$this->layout_model->update_all_components_reload($id);
		
		echo 'status=no';
	}
    
    public function update_reload($component_type,$component_id){
        $this->layout_model->update_reload($component_type,$component_id);
        
        echo 'status=no';
    }
}

?>
