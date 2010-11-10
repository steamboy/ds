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
        
		$this->setting_model = new Setting_Model;
	}
	
	public function edit($tag_id = NULL)
	{
		$this->template->title = 'Settings';
		
		$this->template->content = View::factory('shadadmin/settings/edit');
		
	}
	
}