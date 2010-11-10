<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Allows a template to be automatically loaded and displayed. Display can be
 * dynamically turned off in the controller methods, and the template file
 * can be overloaded.
 *
 * To use it, declare your controller to extend this class:
 * `class Your_Controller extends Template_Controller`
 *
 * $Id: template.php 4134 2009-03-28 04:37:54Z zombor $
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
abstract class Template_Controller extends Controller {

	// Template view name
    public $template = 'shadadmin/template';
    
	// Default to do auto-rendering
	public $auto_render = TRUE;
	
	/**
	 * Template loading and setup routine.
	 */
	public function __construct()
	{
		parent::__construct();

        $this->auth = new Auth;
        
		// Load the template
		$this->template = new View($this->template);

		if ($this->auto_render == TRUE)
		{
			// Render the template immediately after the controller method
			Event::add('system.post_controller', array($this, '_render'));
		}

        $this->session = Session::instance();
        
        //Template Variables
        $this->template->navigation = new View('/shadadmin/navigation');
        $this->template->search     = ''; //new View('/shadadmin/templates/search')
        $this->template->blog       = ''; //new View('/shadadmin/templates/blog')
        
        //Template - error messages
        $this->template->message        = ''; 
        $this->template->message_type   = ''; 
        $this->template->playlist_table = '';
        $this->template->component_type = '';
        
        $this->template->list_video_playlist = '';
        $this->template->list_image_playlist = '';
        $this->template->list_text_playlist  = '';
        
        if($this->auth->logged_in('login'))
		{
            $username = Auth::instance()->get_user()->username;
        }
        else
		{
            $username = '';
        }
        
        //Display Username
        $this->template->username = $username;
	}

	/**
	 * Render the loaded template.
	 */
	public function _render()
	{
		if ($this->auto_render == TRUE)
		{
			// Render the template when the class is destroyed
			$this->template->render(TRUE);
		}
	}
    
    
} // End Template_Controller