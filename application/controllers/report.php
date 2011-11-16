<?php defined('SYSPATH') OR die('No direct access allowed.');

class Report_Controller extends Template_Controller {

  public function __construct()
  {
    parent::__construct(); //necessary
    
    /*
    //Auth
    if ( ! $this->auth->logged_in('login'))
    {
      $this->session->set_flash('login_message', 'Please login to continue');
      $this->session->set('referer', url::current());
      url::redirect('users/login');
    }
    */
    $this->playlist_model   = new Playlist_Model;
    $this->layout_model     = new Layout_Model;
    $this->dstemplate_model = new Dstemplate_Model;

    $this->template->title = 'Layout';

  }

  public function index()
  {
    /*$paginate    = '';
        $sortby      = '';
        $sortby_type = '';
        $search      = '';

        if(!$sortby_type)
        {
            $sortby_type = 'ASC';
        }

        if($_GET)
        {
            //Sort By
            $sortby = $_GET['sortby'];

            //Sort By Type
            $sortby_type = $_GET['sortby_type'];

            if($_GET['sortby_type'] == 'ASC')
            {
                $sortby_type = 'DESC';
            }
            elseif($_GET['sortby_type'] == 'DESC')
            {
                $sortby_type = 'ASC';
            }
        }

        $this->template->content = new View('/shadadmin/reports/report-list');

    $this->template->content->reports      = '';
    $this->template->content->display_date = '';

        $this->template->list_video_playlist = '';
    $this->template->list_image_playlist = '';
    $this->template->list_text_playlist  = '';

        //$this->template->content->pagination = '';

        $limit = 2;

        $this->pagination = new Pagination(array(
            // 'base_url'    => 'welcome/pagination_example/page/', // base_url will default to current uri
            'uri_segment'    => 'page', // pass a string as uri_segment to trigger former 'label' functionality
            'total_items'    => count($this->playlist_model->get_report_dates($paginate,$sortby,$sortby_type,$search)), // use db count query here of course
            'items_per_page' => $limit, // it may be handy to set defaults for stuff like this in config/pagination.php
            'style'          => 'digg' // pick one from: classic (default), digg, extended, punbb, or add your own!
        ));

        $this->template->content->pagination = $this->pagination;

        //echo $this->pagination->sql_limit;
        //echo $this->pagination->sql_offset;

        $paginate = $this->pagination->sql_offset.'.'.$limit;

        //$this->template->content->reports     = $this->playlist_model->get_reports($date,$paginate,$component_type,$sortby,$sortby_type,$search);
        $this->template->content->report_dates = $this->playlist_model->get_report_dates($paginate,$sortby,$sortby_type,$search);
    $this->template->content->sortby_type = $sortby_type;*/        
  }

  public function dates()
  {
    $paginate    = '';
    $sortby      = '';
    $sortby_type = 'DESC';
    $search      = '';

    if($_GET)
    {
      //Sort By
      $sortby = $_GET['sortby'];

      if($_GET['sortby_type'] == 'ASC')
      {
        $sortby_type = 'DESC';
      }
      elseif($_GET['sortby_type'] == 'DESC')
      {
        $sortby_type = 'ASC';
      }
    }

    $this->template->content = new View('/shadadmin/reports/report-list');

    $this->template->content->reports      = '';
    $this->template->content->display_date = '';

    $this->template->list_video_playlist = '';
    $this->template->list_image_playlist = '';
    $this->template->list_text_playlist  = '';

    //$this->template->content->pagination = '';

    $limit = 20;

    //echo $sortby_type;

    $this->pagination = new Pagination(array(
      // 'base_url'    => 'welcome/pagination_example/page/', // base_url will default to current uri
      'uri_segment'    => 'page', // pass a string as uri_segment to trigger former 'label' functionality
      'total_items'    => count($this->playlist_model->get_report_dates($paginate,$sortby,$sortby_type,$search)), // use db count query here of course
      'items_per_page' => $limit, // it may be handy to set defaults for stuff like this in config/pagination.php
      'style'          => 'digg' // pick one from: classic (default), digg, extended, punbb, or add your own!
    ));

    $this->template->content->pagination = $this->pagination;

    //echo $this->pagination->sql_limit;
    //echo $this->pagination->sql_offset;

    $paginate = $this->pagination->sql_offset.'.'.$limit;

    //$this->template->content->reports     = $this->playlist_model->get_reports($date,$paginate,$component_type,$sortby,$sortby_type,$search);
    $this->template->content->report_dates = $this->playlist_model->get_report_dates($paginate,$sortby,$sortby_type,$search);
    $this->template->content->sortby_type  = $sortby_type;        
  }

  //Report Date
  public function rdate($date,$component_type=NULL) 
  {
    $paginate    = '';
    $sortby      = '';
    $sortby_type = 'DESC';
    $search      = '';

    if($_GET)
    {
      //Sort By
      $sortby = $_GET['sortby'];

      //Sort By Type
      $sortby_type = $_GET['sortby_type'];

      if($_GET['sortby_type'] == 'ASC')
      {
        $sortby_type = 'DESC';
      }
      elseif($_GET['sortby_type'] == 'DESC')
      {
        $sortby_type = 'ASC';
      }
    }

    if($_POST)
    {
      $search = $_POST['search'];
    }

    $this->template->content = new View('/shadadmin/reports/report-list');

    $this->template->content->display_date = $date;

    $this->template->list_video_playlist = '';
    $this->template->list_image_playlist = '';
    $this->template->list_text_playlist  = '';

    $limit = 20;

    $this->pagination = new Pagination(array(
      // 'base_url'    => 'welcome/pagination_example/page/', // base_url will default to current uri
      'uri_segment'    => 'page', // pass a string as uri_segment to trigger former 'label' functionality
      'total_items'    => count($this->playlist_model->get_reports($date,$paginate,$component_type,$sortby,$sortby_type,$search)), // use db count query here of course
      'items_per_page' => $limit, // it may be handy to set defaults for stuff like this in config/pagination.php
      'style'          => 'digg' // pick one from: classic (default), digg, extended, punbb, or add your own!
    ));

    $this->template->content->pagination = $this->pagination;

    //echo $this->pagination->sql_limit;
    //echo $this->pagination->sql_offset;

    $paginate = $this->pagination->sql_offset.'.'.$limit;

    $this->template->content->reports     = $this->playlist_model->get_reports($date,$paginate,$component_type,$sortby,$sortby_type,$search);
    $this->template->content->sortby_type = $sortby_type;        
  }

  //Content Activity
  public function content_start($content_id,$component_type) 
  {
    $this->auto_render=false;
    echo $this->playlist_model->report_content_start($content_id, $component_type);		

    //Save Current Content Playing
    $this->playlist_model->current_content_playing($content_id, $component_type);
  }

  public function content_end($content_report_id)
  {
    $this->auto_render=false;
    $this->playlist_model->report_content_end($content_report_id);	
  }
}

?>
