<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Layout_Controller extends Template_Controller {

	public function __construct()
	{
		parent::__construct(); //necessary
	    
        //Auth
        if ( ! $this->auth->logged_in('login'))
        {
            $this->session->set_flash('login_message', 'Please login to continue');
            $this->session->set('referer', url::current());
            url::redirect('users/login');
        }
        
        functions::accountExpiration();
        	
		$this->playlist_model   = new Playlist_Model;
		$this->layout_model     = new Layout_Model;
		$this->dstemplate_model = new Dstemplate_Model;
		
		$this->template->title = 'Layout';
	}

 	public function index()
	{
		$this->template->content         = new View('/shadadmin/layout-list');
        $this->template->content->layout = $this->layout_model->get_all_layout();
        
		$this->template->content->current_layout_id = '';
		
		foreach ($this->layout_model->get_current_layout() as $current_layout)
        {
			$this->template->content->current_layout_id = $current_layout->layout_id;
        }
        
        //Toggle View XML Link
        $this->template->content->view_xml = $this->template->view_xml;
	}

	public function get_playlist_name($id)
	{
		$playlist = $this->playlist_model->get_playlist($id);

		foreach ($playlist as $playlists)
		{
			return $playlists->name;
		}
	}

	public function form($form_type, $layout_id=null, $message=null)
	{
		$this->template->content = new View('/shadadmin/layout-form');
			
        $this->template->list_video_playlist = $this->playlist_model->get_all_playlist_by_type('video');
		$this->template->list_image_playlist = $this->playlist_model->get_all_playlist_by_type('image');
		$this->template->list_text_playlist  = $this->playlist_model->get_all_playlist_by_type('text');
		
		$this->template->content->form_type = $form_type;
		$this->template->content->id        = $layout_id;
		
        //Clear values;
        $this->template->content->layout_name = '';    
        $this->template->content->video_playlist_id      = '';
        $this->template->content->video_playlist_name    = '';
        $this->template->content->video_component_name   = '';
        $this->template->content->video_component_reload = '';
        
		if($form_type == 'dstemplate') /* template select */
		{
			$this->template->message              = $message;
			
            $dstemplate_video = '';
            $dstemplate_image = '';
            $dstemplate_text = '';
            $dstemplate_text_scroll = '';
            $dstemplate_time = '';
            
			// Get layout name
			$dstemplate = $this->dstemplate_model->get_dstemplate($layout_id);
				
			foreach ($dstemplate as $dstemplates)
			{
                $dstemplate_name = $dstemplates->name; //Name
			}
			
            //Get Data from template holder
            $this->template->content->dstemplate_component_order = $this->dstemplate_model->get_dstemplate_component_order($layout_id);
            
            $component_types = array();
            
            //Get component type
            foreach ($this->template->content->dstemplate_component_order as $dstemplate_component_orders)
            {
                $component_types[] = $dstemplate_component_orders->dstemplate_component_type;
            }
            
            //Video
            if(in_array('video',$component_types))
            {
                $this->template->content->dstemplate_video = $this->dstemplate_model->get_dstemplate_component('dstemplate_video', $layout_id); 
            }
            
            //Image
            if(in_array('image',$component_types))
            {
                $this->template->content->dstemplate_image = $this->dstemplate_model->get_dstemplate_component('dstemplate_image', $layout_id); 
            }
            
            //Text Crawl 
            if(in_array('text_crawl',$component_types))
            {
                $this->template->content->dstemplate_text = $this->dstemplate_model->get_dstemplate_component('dstemplate_text', $layout_id); 
            }
            
            //Text Scroll 
            if(in_array('text_scroll',$component_types))
            {
                $this->template->content->dstemplate_text_scroll = $this->dstemplate_model->get_dstemplate_component('dstemplate_text', $layout_id); 
            }
            
            //Time
            if(in_array('time',$component_types))
            {
                $this->template->content->dstemplate_time = $this->dstemplate_model->get_dstemplate_component('dstemplate_time', $layout_id); 
            }
		}
        
        if($form_type == 'update') 
        {
            $this->template->message = $message;
              
            $dstemplate_video = '';
            $dstemplate_image = '';
            $dstemplate_text = '';
            $dstemplate_text_scroll = '';
            $dstemplate_time = '';
            
            // Get layout name
            $layout = $this->layout_model->get_layout($layout_id);
                
            foreach ($layout as $layouts)
            {
                $this->template->content->layout_name = $layouts->name; //Name
            }
            
            //Get Data from template holder
            $this->template->content->dstemplate_component_order = $this->layout_model->get_layout_component_order($layout_id);
            
            $component_types = array();
            
            //Get component type
            foreach ($this->template->content->dstemplate_component_order as $dstemplate_component_orders)
            {
                $component_types[] = $dstemplate_component_orders->dstemplate_component_type;
            }
            
            //print_r($component_types);
            
            //Video
            if(in_array('video',$component_types))
            {
                $this->template->content->dstemplate_video = $this->layout_model->get_layout_component('component_video', $layout_id);    
            }
            
            //Image
            if(in_array('image',$component_types))
            {
                $this->template->content->dstemplate_image = $this->layout_model->get_layout_component('component_image', $layout_id);    
            }
            
            //Text Crawl
            if(in_array('text_crawl',$component_types))
            {
                $this->template->content->dstemplate_text = $this->layout_model->get_layout_component('component_text', $layout_id);    
            }
            
            //Text Scroll
            if(in_array('text_scroll',$component_types))
            {
                $this->template->content->dstemplate_text_scroll = $this->layout_model->get_layout_component('component_text', $layout_id);    
            }
            
            //Time
            if(in_array('time',$component_types))
            {
                $this->template->content->dstemplate_time = $this->layout_model->get_layout_component('component_time', $layout_id);    
            }
        }
		
		if($_POST)
		{
			/* check duplicate playlist name */
			$check_layout_name = '';
			
			$layout_name = $this->layout_model->get_layout_name($this->input->post('name'));
			
			foreach ($layout_name as $layout_names)
			{
				$check_layout_name = $layout_names->name;
			}
			
			if(!$check_layout_name)
			{
                //print_r($_POST);
                
				if($this->input->post('layout_name'))
                {
					$layout_id = $this->layout_model->submit_layout(
                        $form_type,
						$this->input->post('layout_name'),
                        
                        $this->input->post('component_counter_video'),
                        $this->input->post('video_component_trg'),
                        $this->input->post('video_component_id'),
                        $this->input->post('video_component_name'),
						$this->input->post('video_playlist_id'),
						$this->input->post('video_component_x'),
						$this->input->post('video_component_y'),
						$this->input->post('video_component_width'),
						$this->input->post('video_component_height'),
                        
                        $this->input->post('component_counter_image'),
                        $this->input->post('image_component_trg'),
                        $this->input->post('image_component_id'),
                        $this->input->post('image_component_name'),
                        $this->input->post('image_playlist_id'),
                        $this->input->post('image_component_x'),
                        $this->input->post('image_component_y'),
                        $this->input->post('image_component_width'),
                        $this->input->post('image_component_height'),
                        $this->input->post('image_component_delay'),
                        
						$this->input->post('component_counter_text'),
                        $this->input->post('text_component_trg'),
                        $this->input->post('text_component_id'),
                        $this->input->post('text_component_name'),
						$this->input->post('text_playlist_id'),
						$this->input->post('text_component_x'),
						$this->input->post('text_component_y'),
						$this->input->post('text_component_width'),
						$this->input->post('text_component_height'),
						$this->input->post('text_component_background_color'),
						$this->input->post('text_component_scroll_speed'),
                        
                        $this->input->post('component_counter_text_scroll'),
                        $this->input->post('text_scroll_component_trg'),
                        $this->input->post('text_scroll_component_id'),
                        $this->input->post('text_scroll_component_name'),
                        $this->input->post('text_scroll_playlist_id'),
                        $this->input->post('text_scroll_component_x'),
                        $this->input->post('text_scroll_component_y'),
                        $this->input->post('text_scroll_component_width'),
                        $this->input->post('text_scroll_component_height'),
                        $this->input->post('text_scroll_component_background_color'),
                        $this->input->post('text_scroll_component_scroll_speed'),
                        
						$this->input->post('component_counter_time'),
                        $this->input->post('time_component_trg'),
                        $this->input->post('time_component_id'),
                        $this->input->post('time_component_name'),
                        $this->input->post('time_component_x'),
						$this->input->post('time_component_y'),
						$this->input->post('time_component_width'),
						$this->input->post('time_component_height'),
                        $this->input->post('time_component_font'),
						$this->input->post('time_component_font_size'),
                        $this->input->post('time_component_font_color'),
                        $this->input->post('time_component_font_style'),
						$this->input->post('time_component_background_color'),
						
						$layout_id);
			
                    if($form_type == 'update')
                    {
                        url::redirect('layout/form/update/'.$layout_id.'/updatelayout');
                    }
                    else
                    {
                        url::redirect('layout/form/update/'.$layout_id.'/createlayout');
                    }
				}
			}
			else
			{
				$this->template->message      = 'duplicate_layout_name';
				$this->template->message_type = 'layout';
				
				$this->template->content->layout_name = '';
			
				$this->template->content->video_playlist_id      = $this->input->post('video_playlist_id');
				$this->template->content->video_playlist_name    = $this->input->post('video_playlist_name');
				$this->template->content->video_component_name   = $this->input->post('video_component_name');
				$this->template->content->video_component_x      = $this->input->post('video_component_x');
				$this->template->content->video_component_y      = $this->input->post('video_component_y');
				$this->template->content->video_component_width  = $this->input->post('video_component_width');
				$this->template->content->video_component_height = $this->input->post('video_component_height');
				$this->template->content->video_component_reload = $this->input->post('video_component_reload');
				
                $this->template->content->image_playlist_id      = $this->input->post('image_playlist_id');
                $this->template->content->image_playlist_name    = $this->input->post('image_playlist_name');
                $this->template->content->image_component_name   = $this->input->post('image_component_name');
                $this->template->content->image_component_x      = $this->input->post('image_component_x');
                $this->template->content->image_component_y      = $this->input->post('image_component_y');
                $this->template->content->image_component_width  = $this->input->post('image_component_width');
                $this->template->content->image_component_height = $this->input->post('image_component_height');
                $this->template->content->image_component_delay  = $this->input->post('image_component_delay');
                $this->template->content->image_component_reload = $this->input->post('image_component_reload');
                
				$this->template->content->text_playlist_id                = $this->input->post('text_playlist_id');
				$this->template->content->text_playlist_name              = $this->input->post('text_playlist_name');
				$this->template->content->text_component_name             = $this->input->post('text_component_name');
				$this->template->content->text_component_x                = $this->input->post('text_component_x');
				$this->template->content->text_component_y                = $this->input->post('text_component_y');
				$this->template->content->text_component_width            = $this->input->post('text_component_width');
				$this->template->content->text_component_height           = $this->input->post('text_component_height');
				$this->template->content->text_component_font             = $this->input->post('text_component_font');
                $this->template->content->text_component_font_color       = $this->input->post('text_component_font_color');
                $this->template->content->text_component_background_color = $this->input->post('text_component_background_color');
				$this->template->content->text_component_scroll_speed     = $this->input->post('text_component_scroll_speed');
				$this->template->content->text_component_reload           = $this->input->post('text_component_reload');
                
                //02-24-10: Added Text Scroll
                $this->template->content->text_scroll_playlist_id                = $this->input->post('text_scroll_playlist_id');
                $this->template->content->text_scroll_playlist_name              = $this->input->post('text_scroll_playlist_name');
                $this->template->content->text_scroll_component_name             = $this->input->post('text_scroll_component_name');
                $this->template->content->text_scroll_component_x                = $this->input->post('text_scroll_component_x');
                $this->template->content->text_scroll_component_y                = $this->input->post('text_scroll_component_y');
                $this->template->content->text_scroll_component_width            = $this->input->post('text_scroll_component_width');
                $this->template->content->text_scroll_component_height           = $this->input->post('text_scroll_component_height');
                $this->template->content->text_scroll_component_font             = $this->input->post('text_scroll_component_font');
                $this->template->content->text_scroll_component_font_color       = $this->input->post('text_scroll_component_font_color');
                $this->template->content->text_scroll_component_background_color = $this->input->post('text_scroll_component_background_color');
                $this->template->content->text_scroll_component_scroll_speed     = $this->input->post('text_scroll_component_scroll_speed');
                $this->template->content->text_scroll_component_reload           = $this->input->post('text_scroll_component_reload');
			
				$this->template->content->time_component_name             = $this->input->post('time_component_name');
				$this->template->content->time_component_x                = $this->input->post('time_component_x');
				$this->template->content->time_component_y                = $this->input->post('time_component_y');
				$this->template->content->time_component_width            = $this->input->post('time_component_width');
				$this->template->content->time_component_height           = $this->input->post('time_component_height');
                $this->template->content->time_component_font             = $this->input->post('time_component_font');
				$this->template->content->time_component_font_size        = $this->input->post('time_component_font_size');
                $this->template->content->time_component_font_color       = $this->input->post('time_component_font_color');
				$this->template->content->time_component_background_color = $this->input->post('time_component_background_color');
				$this->template->content->time_component_reload           = $this->input->post('time_component_reload');
			}
		}
		
	}
	
	public function delete_layout()
	{
		if(request::is_ajax())
		{
			$this->auto_render=false; //Disable the auto renderer, we don't want a layout in our ajax response
			
			$this->layout_model->delete_layout($this->input->post('id'));
		}
	}
	
	public function load()
	{
		if(request::is_ajax())
		{
			$this->auto_render=false; //Disable the auto renderer, we don't want a layout in our ajax response
			
			$this->layout_model->load_layout($this->input->post('id'));
			
			//Clear current_content
			$this->playlist_model->clear_current_content();
		}
	}
}

?>