<?php defined('SYSPATH') OR die('No direct access allowed.');

class Users_Controller extends Template_Controller {

    public function __construct()
    {
        parent::__construct(); //necessary
    }
    
	public function index()
	{
		//Auth
        if ( ! $this->auth->logged_in('login'))
        {
            $this->session->set_flash('login_message', 'Please login to continue');
            $this->session->set('referer', url::current());
            url::redirect('users/login');
        }
		
		$this->template->title = 'Users';
		
		$this->template->navigation = new View('/shadadmin/navigation');
		
		$this->template->content = View::factory('shadadmin/users/index');
		
		$users = ORM::factory('user')->find_all();
		
		$this->template->content->set('users', $users);
	}

	public function login($tag_id = NULL)
	{
        if ($this->auth->logged_in('login')){
            url::redirect();    
        }
        
        $this->template->title = 'Login';

		if ( ! $this->session->get('referer'))
			$this->session->set('referer', request::referrer());
				
		$this->template->content = View::factory('shadadmin/users/login')
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

		$this->template->navigation = '';
	}
	
	public function add($tag_id = NULL)
	{
        $this->template->title = 'Create User';
    
		$this->template->content = View::factory('shadadmin/users/add');
			//->bind('captcha', $captcha);
            
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
		
		//$captcha = new Captcha;
		
		$this->template->navigation = new View('/shadadmin/navigation');
	}
	
	public function edit($id)
	{
        $this->template->title = 'Update User';
		
		$this->template->content = View::factory('shadadmin/users/edit');
            
		$user = ORM::factory('user')->find($id);
		
		if ($_POST)
		{
			$post = $this->input->post();

			// need to delete pivot table and add a new one
			$user->add(ORM::factory('role', 'admin'));

			if ($user->validate($post, TRUE))
			{
				$this->auth->login($user, $post->password);
				url::redirect();
			}
			$this->template->content->set('errors', $post->errors('errors_users_register'));
		}

		//$captcha = new Captcha;
		
		$this->template->navigation = new View('/shadadmin/navigation');
		
		$this->template->content->set('user', $user);
	
		//echo Kohana::debug($user);
		//exit;
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
        $this->template->content = new View('/shadadmin/messages/expired');
		$this->template->navigation = '';
    }

} // End Tags Controller