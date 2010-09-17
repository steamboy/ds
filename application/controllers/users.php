<?php defined('SYSPATH') OR die('No direct access allowed.');

class Users_Controller extends Template_Controller {

    public function __construct()
    {
        parent::__construct(); //necessary
        
        $this->playlist_model                = new Playlist_Model;
        $this->layout_model                  = new Layout_Model;
        $this->template->navigation          = '';
    }
    
	public function login($tag_id = NULL)
	{
        if ($this->auth->logged_in('login')){
            url::redirect();    
        }
        
        $this->template->title = 'Login';

		if ( ! $this->session->get('referer'))
			$this->session->set('referer', request::referrer());

		$this->template->content = View::factory('shadadmin/login')
			->bind('errors', $errors);

		$post = Validation::factory($_POST)
			->pre_filter('trim')
			->add_rules('username', 'required')
			->add_rules('password', 'required');

		if ($post->validate())
		{
			$user = ORM::factory('user', $post->username);

			if ( ! $user->loaded)
			{
				$post->add_error('username', 'not_found');
			}
			elseif ($this->auth->login($user, $post->password))
			{
				url::redirect($this->session->get_once('referer'));
			}
			else
			{
				$post->add_error('password', 'incorrect_password');
			}
		}

		$errors = $post->errors('errors_users_login');

	}
	
	public function register($tag_id = NULL)
	{
        $this->template->title = 'Login';
    
		$this->template->content = View::factory('shadadmin/register')
			->bind('captcha', $captcha);
            
		if ($_POST)
		{
			$post = $this->input->post();

			$user = ORM::factory('user');

			$user->add(ORM::factory('role', 'login'));

			if ($user->validate($post, TRUE))
			{
				$this->auth->login($user, $post->password);
				url::redirect();
			}
			$this->template->content->set('errors', $post->errors('errors_users_register'));
		}
		$captcha = new Captcha;
	}

	public function logout()
	{
		$this->auth->logout(TRUE);
		url::redirect();
	}
    
    public function expired()
    {
        $this->auth->logout(TRUE);
        $this->template->title   = 'Account Expired';
        $this->template->content = new View('/shadadmin/expired');
    }

} // End Tags Controller