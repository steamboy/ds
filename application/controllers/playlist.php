<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Playlist_Controller extends Template_Controller {

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
        
		$this->playlist_model = new Playlist_Model;
		$this->layout_model   = new Layout_Model;
	}
 
 	public function index()
	{
        
	}
    
    public function component($component_type,$type=NULL,$id=NULL,$message=NULL) //01-27-10: Clean Code
    {
        $this->template->title = ucfirst($component_type); //Page Title
        
        if(!$type) //Playlist List
        {
            $this->template->content           = new View('/shadadmin/playlist-list');
            $this->template->content->playlist = $this->playlist_model->get_all_playlist_by_type($component_type);
            
            //Toggle View XML Link
            $this->template->content->view_xml = $this->template->view_xml;
        
        }
        
        if($type == 'delete')
        {
            $this->playlist_model->delete_playlist($component_type.'_playlist',$id);
            
            $this->template->content           = new View('/shadadmin/playlist-list');
            $this->template->content->playlist = $this->playlist_model->get_all_playlist_by_type($component_type);    
            $this->template->message           = 'msg_playlist_delete';
            
            //Toggle View XML Link
            $this->template->content->view_xml = $this->template->view_xml;
        }
        
        if($type == 'create')
        {
            $this->template->content                   = new View('/shadadmin/playlist-form'); //01-22-10: Updated template
            $this->template->content->playlist_name    = '';
            $this->template->content->playlist_content = ''; //01-22-10
            
            if($_POST)
            {
                //echo Kohana::debug($this->input->post());

                //check duplicate playlist name
                $check_playlist_name = '';
                $playlist_name       = $this->playlist_model->get_playlist_name($this->input->post('playlist_name'));
                
                /*foreach ($playlist_name as $playlist_names)
                {
                    $check_playlist_name = $playlist_names->name;
                }*/
                
                if(!$check_playlist_name)
                {
                    //Insert data to DB and get insert ID
                    if($component_type == 'video') //Video
                    {
                        $id = $this->playlist_model->create_video_playlist(
                            $this->input->post('playlist_name'),
                            'video',
                            $this->input->post('pl_item_name'),
                            $this->input->post('pl_item_filename'),
                            $this->input->post('pl_item_fullscreen')
                        );
                    }
                    elseif($component_type == 'image') //Image
                    {
                        /*$id = $this->playlist_model->create_image_playlist(
                        $this->input->post('playlist_name'),
                        'image',
                        $this->input->post('pl_item_name'),
                        $this->input->post('pl_item_filename'));*/
                        
                        $id = $this->playlist_model->create_image_playlist(
                            $this->input->post('playlist_name'),
                            'image',
                            $this->input->post('pl_item_name'),
                            $this->input->post('pl_item_filename'),
                            $this->input->post('pl_item_boxed'),
                            $this->input->post('pl_item_delay')
                        );
                    }
                    elseif($component_type == 'text') //Text
                    {
						$id = $this->playlist_model->create_text_playlist(
                            $this->input->post('playlist_name'),
                            'text',
                            $this->input->post('pl_item_name'),
                            $this->input->post('pl_item_text_content'),
                            $this->input->post('pl_item_image'),
                            $this->input->post('pl_item_text_img_align'),
							$this->input->post('pl_item_rss')
                        );
                    }
                    url::redirect('playlist/component/'.$component_type.'/update/'.$id.'/msg_playlist_create');
                }
                else
                {
                    $this->template->content->playlist_name = $this->input->post('playlist_name');                
                    $this->template->message                = 'msg_playlist_duplicate';
                }
            }
        }
        
        if($type == 'update')
        {
            
            $this->template->message = $message;
            $this->template->content = new View('/shadadmin/playlist-form'); //01-22-10: Updated template        
            $playlist                = $this->playlist_model->get_playlist($id);
            
            foreach ($playlist as $playlists)
            {
                $this->template->content->playlist_name = $playlists->name;
            }
            
            $this->template->content->playlist_content = $this->playlist_model->get_playlist_content($component_type.'_playlist',$id);
            
            if($_POST)
            {
                //Update data to DB and get insert ID
                if($component_type == 'video') //Video
                {
                    $this->playlist_model->update_video_playlist(
                    $id,
                    $this->input->post('playlist_name'),
                    $this->input->post('pl_item_name'),
                    $this->input->post('pl_item_filename'),
                    $this->input->post('pl_item_fullscreen')
                    );
                }
                elseif($component_type == 'image') //Image
                {
                    $this->playlist_model->update_image_playlist(
                    $id,
                    $this->input->post('playlist_name'),
                    $this->input->post('pl_item_name'),
                    $this->input->post('pl_item_filename'),
                    $this->input->post('pl_item_boxed'),
                    $this->input->post('pl_item_delay')
                    );
                }
                elseif($component_type == 'text') //Text
                {
                    $this->playlist_model->update_text_playlist(
                    $id,
                    $this->input->post('playlist_name'),
                    $this->input->post('pl_item_name'),
                    $this->input->post('pl_item_text_content'),
                    $this->input->post('pl_item_image'),
                    $this->input->post('pl_item_text_img_align'),
					$this->input->post('pl_item_rss')
                    );
                }
                
                $this->layout_model->update_component_reload($id,'component_'.$component_type); // Update reload status on every layout data
                url::redirect('playlist/component/'.$component_type.'/update/'.$id.'/msg_playlist_update');
            }
        }
        
        if($component_type == 'text') //Text Component
        {
            $this->template->content->style_width = "style='width:100%'";
            $this->template->content->file_list   = functions::list_folder_files($this->content_location.'content/'.$component_type.'images');
            $this->template->content->filebrowser = '';
        }
        else
        {
            $this->template->content->filebrowser = new View('/shadadmin/playlist-filebrowser');
            
            $component_type_files = functions::list_folder_files($this->content_location.'content/'.$component_type); //List files inside component type folders
               
            if($component_type == 'image')
            {
                $swf_files = functions::list_folder_files($this->content_location.'content/swf'); //List files inside swf folder
                $file_list = array_merge($component_type_files,$swf_files); //List combined file list
                
                $this->template->content->filebrowser->file_list = $file_list;
            }
            else
            {
                $this->template->content->filebrowser->file_list = $component_type_files;
            }

            $this->template->content->style_width = '';
            $this->template->content->file_list   = '';
        }
        
        $this->template->content->playlist_id    = $id;
        $this->template->content->form_type      = $type;
        $this->template->content->component_type = $component_type;
        $this->template->component_type          = $component_type;
    }
	
	public function check_folder()
    {
        if(request::is_ajax())
        {
            $this->auto_render=false;

            $component_type = $_POST['component_type'];
            $value          = $_POST['value'];
            
            if(functions::isFolder($this->content_location.'content/'.$component_type.'/'.$value))
            {
                $files = functions::list_folder_files($this->content_location.'content/'.$component_type.'/'.$value); //List files inside component type folders
            
                rsort($files);
            
                echo json_encode($files);
            }
            else 
            {
                echo 'not_folder';
            }
        }
    }
    
    public function save_playlist_as()
    {
        if(request::is_ajax())
        {
            $this->auto_render=false;
            
            $id = explode(':', $_POST['id']);
            
            echo $this->playlist_model->save_playlist_as($id[0], $id[1], $_POST['playlist_name']);    
        }
    }

	public function get_current_content()
	{
		if(request::is_ajax())
        {
            $this->auto_render=false;
            
        	echo $this->playlist_model->get_current_content_id($_POST['component_type']);
        }
	}
	
}

?>
