<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Dstemplate_Controller extends Template_Controller {

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
        	
		$this->playlist_model   = new Playlist_Model;
		$this->layout_model     = new Layout_Model;
		$this->dstemplate_model = new Dstemplate_Model;
		
		$this->template->title = 'Template';
	}
	
 	public function index($message=NULL)
	{
		$this->template->content = new View('/shadadmin/dstemplates/dstemplate-list');
		
		$this->template->content->dstemplate = $this->dstemplate_model->get_all_dstemplate();
        
        $this->template->content->message = $message;

	}

    public function form($form_type, $template_id=NULL, $message=NULL)
    {
        $this->template->content = new View('/shadadmin/dstemplates/dstemplate-form');
        $this->template->content->form_type = $form_type;
        
        $this->template->content->template_name              = '';
        $this->template->content->component_video            = '';
        $this->template->content->template_id                = $template_id;
        $this->template->content->dstemplate_component_order = '';
        
        //Load Template on page
        if($template_id)
        {
             //Get DS Template
             foreach ($this->dstemplate_model->get_dstemplate($template_id) as $dstemplate)
             {
                 $this->template->content->template_name = $dstemplate->name;
             }
             
             //Get Component Order
             $this->template->content->dstemplate_component_order =  $this->dstemplate_model->get_dstemplate_component_order($template_id);
             
             //List video components
             $component_video = $this->dstemplate_model->get_dstemplate_component('dstemplate_video', $template_id);
             
             //echo Kohana::debug($component_video);
             
             $this->template->message = $message;
        }
        
        if($_POST)
        { 
           // print_r($_POST);
            print_r($this->input->post('time_component_font_style'));
            
            if($this->input->post('template_name'))
            {
                $template_id = $this->dstemplate_model->submitTemplateForm(
                    $form_type,
                    $this->input->post('template_name'),
                    $this->input->post('component_counter_video'),
                    $this->input->post('video_component_id'),
                    $this->input->post('video_component_name'),
                    $this->input->post('video_component_x'),
                    $this->input->post('video_component_y'),
                    $this->input->post('video_component_width'),
                    $this->input->post('video_component_height'),
                    
                    $this->input->post('component_counter_image'),
                    $this->input->post('image_component_id'),
                    $this->input->post('image_component_name'),
                    $this->input->post('image_component_x'),
                    $this->input->post('image_component_y'),
                    $this->input->post('image_component_width'),
                    $this->input->post('image_component_height'),
                    $this->input->post('image_component_delay'),
                    
                    $this->input->post('component_counter_text'),
                    $this->input->post('text_component_id'),
                    $this->input->post('text_component_name'),
                    $this->input->post('text_component_x'),
                    $this->input->post('text_component_y'),
                    $this->input->post('text_component_width'),
                    $this->input->post('text_component_height'),
                    $this->input->post('text_component_background_color'),
                    $this->input->post('text_component_scroll_speed'),
                    
                    $this->input->post('component_counter_text_scroll'),
                    $this->input->post('text_scroll_component_id'),
                    $this->input->post('text_scroll_component_name'),
                    $this->input->post('text_scroll_component_x'),
                    $this->input->post('text_scroll_component_y'),
                    $this->input->post('text_scroll_component_width'),
                    $this->input->post('text_scroll_component_height'),
                    $this->input->post('text_scroll_component_background_color'),
                    $this->input->post('text_scroll_component_scroll_speed'),
                    
                    $this->input->post('component_counter_time'),
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
                    
                    $template_id      
                );
                
                url::redirect('dstemplate/form/update/'.$template_id.'/create_template');
            }
        }
    }
    
    public function delete_template()
    {
        if(request::is_ajax())
        {
            $this->auto_render=false;
            
            $this->dstemplate_model->deleteTemplate($this->input->post('id'));
        }
    }
}

?>
