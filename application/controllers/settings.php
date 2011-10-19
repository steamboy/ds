<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Settings_Controller extends Template_Controller {

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
        
	}
	
	public function edit($tag_id = NULL)
	{
		$this->template->title = 'Settings';
		
		$this->template->content = View::factory('shadadmin/settings/edit');
		
		if($_POST) {
			//Save
			$settings = ORM::factory('setting', 1);
			$settings->value = $this->input->post('content_path');
			$settings->save();
			
			$settings = ORM::factory('setting', 2);
			$settings->value = $this->input->post('font_path');
			$settings->save();
		}
		
		$settings = ORM::factory('setting')->find_all();
		
		$system_setting = array();
		
		foreach ($settings as $setting) {
			$system_settings[$setting->name] = $setting->value; 
		}
		
		//echo Kohana::debug($system_settings);
		
		$this->template->content->set('settings', $system_settings);
	}
	
}