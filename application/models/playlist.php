<?php defined('SYSPATH') or die('No direct script access.');
 
class Playlist_Model extends Model {
 
	public function __construct($id = NULL)
	{
		// load database library into $this->db (can be omitted if not required)
		parent::__construct($id);
	}
	
	/* List Contents */
	public function list_contents($table)
	{
		$this->db->orderby('id', 'ASC');
		return $this->db->get($table);
	}
	
	//Get All Playlist
    public function get_all_playlist()
	{
		return $this->db->get('playlist');
	}
	
	//Get All Playlist
    public function get_all_playlist_by_type($type)
	{
		$this->db->where('type', $type);
		$this->db->orderby('id', 'DESC');
		return $this->db->get('playlist');
	}
	
    //Get Playlist
	public function get_playlist($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('playlist');	
	}
	
    //Get Playlist Name
	public function get_playlist_name($name)
	{
		$this->db->where('name', $name);
		return $this->db->get('playlist');	
	}
	
    //Get Content
	public function get_content($table)
	{
		return $this->db->get($table);	
	}
	
	public function get_playlist_content($table,$playlist_id)
	{
		$this->db->where('playlist_id', $playlist_id);
		$this->db->orderby('sort_id', 'ASC');
		return $this->db->get($table);
	}
	
	//Create Video Playlist
    public function create_video_playlist($name,$type,$pl_item_name,$pl_item_filename,$pl_item_fullscreen)
	{
		$this->db->query("INSERT INTO playlist (name, type, created_on) VALUES ('".mysql_real_escape_string($name)."', '$type', NOW())");
		
		$last_inserted_id = mysql_insert_id();
		
		if($pl_item_filename)
		{
			/*$pl_file = array_combine($pl_item_filename,$pl_item_name);
			
			$i=0;
			foreach ($pl_file as $pl_file_filename => $pl_file_name)
			{
				$this->db->query("INSERT INTO video_playlist SET playlist_id = $last_inserted_id, name = '".mysql_real_escape_string($pl_file_name)."', filename = '".mysql_real_escape_string($pl_file_filename)."', sort_id = $i");
				$i++;
			}*/
            
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $this->db->query("INSERT INTO video_playlist SET 
                    playlist_id = $last_inserted_id, 
                    name        = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    filename    = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    display     = '".mysql_real_escape_string($pl_item_fullscreen[$i])."', 
                    sort_id     = $i");
            }
		}
		
		return $last_inserted_id; 
	}
	
    //Update Video Playlist
	public function update_video_playlist($id,$name,$pl_item_name,$pl_item_filename,$pl_item_fullscreen)
	{
		$this->db->query("UPDATE playlist SET name = '".mysql_real_escape_string($name)."', modified_on = NOW() WHERE id = $id");
		
		$this->db->query("DELETE FROM video_playlist WHERE playlist_id = $id");	
		
		if($pl_item_filename)
		{
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $this->db->query("INSERT INTO video_playlist SET 
                    playlist_id = $id, 
                    name        = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    filename    = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    display     = '".mysql_real_escape_string($pl_item_fullscreen[$i])."', 
                    sort_id     = $i");
            }
		}
	}
	
    //Create Image Playlist
    public function create_image_playlist($name,$type,$pl_item_name,$pl_item_filename,$pl_item_boxed,$pl_item_delay)
    {
        $this->db->query("INSERT INTO playlist (name, type, created_on) VALUES ('".mysql_real_escape_string($name)."', '$type', NOW())");
        
        $last_inserted_id = mysql_insert_id();
        
        if($pl_item_filename)
        {
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $ext = pathinfo($pl_item_filename[$i], PATHINFO_EXTENSION);
                if($ext == 'swf'){
                    $type = 'swf';
                }
                else {
                    $type = 'image';
                }
                
                $this->db->query("INSERT INTO image_playlist SET 
                    playlist_id     = $last_inserted_id, 
                    name            = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    type            = '".mysql_real_escape_string($type)."', 
                    filename        = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    boxed        = '".mysql_real_escape_string($pl_item_boxed[$i])."', 
                    delay        = '".mysql_real_escape_string($pl_item_delay[$i])."', 
                    sort_id         = $i");
            }
        }
        
        return $last_inserted_id; 
    }
    
    //Update Image Playlist
    public function update_image_playlist($id,$name,$pl_item_name,$pl_item_filename,$pl_item_boxed,$pl_item_delay)
    {
        $this->db->query("UPDATE playlist SET name = '".mysql_real_escape_string($name)."', modified_on = NOW() WHERE id = $id");
        
        $this->db->query("DELETE FROM image_playlist WHERE playlist_id = $id");    
        
        if($pl_item_filename){
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $ext = pathinfo($pl_item_filename[$i], PATHINFO_EXTENSION);
                if($ext == 'swf'){
                    $type = 'swf';
                }
                else {
                    $type = 'image';
                }
                
                $this->db->query("INSERT INTO image_playlist SET 
                    playlist_id     = $id, 
                    name            = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    type            = '".mysql_real_escape_string($type)."', 
                    filename        = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    boxed        = '".mysql_real_escape_string($pl_item_boxed[$i])."', 
                    delay        = '".mysql_real_escape_string($pl_item_delay[$i])."', 
                    sort_id         = $i");
            }
        }
    }
    
    //Create Text Player
	public function create_text_playlist($name,$type,$pl_item_name,$pl_item_text_content,$pl_item_filename,$pl_item_text_img_align)
	{
		$this->db->query("INSERT INTO playlist (name, type, created_on) VALUES ('".mysql_real_escape_string($name)."', '$type', NOW())");
		
		$last_inserted_id = mysql_insert_id();
		
		if($pl_item_text_content){
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $this->db->query("INSERT INTO text_playlist SET 
                    playlist_id     = $last_inserted_id, 
                    name            = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    content         = '".mysql_real_escape_string($pl_item_text_content[$i])."', 
                    image           = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    image_alignment = '".mysql_real_escape_string($pl_item_text_img_align[$i])."', 
                    sort_id         = $i");
            }
		}
		
		return $last_inserted_id; 
	}
	
	public function update_text_playlist($id,$name,$pl_item_name,$pl_item_text_content,$pl_item_filename,$pl_item_text_img_align)
	{
		$this->db->query("UPDATE playlist SET name = '".mysql_real_escape_string($name)."', modified_on = NOW() WHERE id = $id");
		
		$this->db->query("DELETE FROM text_playlist WHERE playlist_id = $id");	
		
		if($pl_item_text_content)
		{
			$pl_text = array_combine($pl_item_name,$pl_item_text_content);
			
			/*$i=0;
			foreach ($pl_text as $pl_text_name => $pl_text_content )
			{
				$this->db->query("INSERT INTO text_playlist SET playlist_id = $id, name = '".mysql_real_escape_string($pl_text_name)."', content = '".mysql_real_escape_string($pl_text_content)."', sort_id = $i");
				$i++;
			}*/
            
            for($i = 0; $i <= count($pl_item_name)-1; $i++){
                $this->db->query("INSERT INTO text_playlist SET 
                    playlist_id     = $id, 
                    name            = '".mysql_real_escape_string($pl_item_name[$i])."', 
                    content         = '".mysql_real_escape_string($pl_item_text_content[$i])."', 
                    image           = '".mysql_real_escape_string($pl_item_filename[$i])."', 
                    image_alignment = '".mysql_real_escape_string($pl_item_text_img_align[$i])."', 
                    sort_id         = $i");
            }
		}
	}
	
	public function delete_playlist($playlist_table,$id)
	{
		$this->db->query("DELETE FROM playlist WHERE id = $id");	
		$this->db->query("DELETE FROM $playlist_table WHERE playlist_id = $id");	
	}
    
	//Save Report content start time to database
    public function report_content_start($content_id,$component_type)
    {
        //Check which playlist table to use
        if($component_type == 'video'){
            $tablename = 'video_playlist';
        }
        
        if($component_type == 'image'){
            $tablename = 'image_playlist';
        }
        
        if($component_type == 'text'){
            $tablename = 'text_playlist';
        }
        
        //Get Content Filename or Name
        $this->db->where('id', $content_id);
        $playlist = $this->db->get($tablename); 
        
        foreach ($playlist as $playlists){
            if($playlists->name)
			{
				$filename = $playlists->name;
	    	}
	    	else
			{
	        	$filename = $playlists->filename;
            }
        }
              
		$start_time = "start_time = NOW(),";
		$end_time   = "end_time = ''";
		
		$query = "INSERT INTO report_content SET
			content_id     = '".($content_id)."',
			component_type = '".($component_type)."',
			filename       = '".($filename)."',
			".$start_time.$end_time;
        
        //Kohana::debug();

        $this->db->query($query);
		
		return mysql_insert_id();
    }
    
	//Save Report content end time to database
	public function report_content_end($content_report_id)
    {
        $query = "UPDATE report_content SET end_time = NOW() WHERE id = $content_report_id";
        $this->db->query($query);
    }
	
	//Get all report dates from start time
	public function get_report_dates($paginate=NULL,$sortby=NULL,$sortby_type=NULL,$search=NULL)
	{
		$where_component_type = '';
        $where_search         = '';
        $sort_details         = '';
        
        //Search
        if($search)
        {
            $where_search = " WHERE DATE(start_time) = '%$search%'";
        }
        
        //Sort By
        /*
		if($sortby == 'date')
        {
            $sort_details = " ORDER BY report_date $sortby_type";
        }
		*/
        
		$sort_details = " ORDER BY report_date $sortby_type";
		
        if($paginate)
        {
            $paginate   = explode('.',$paginate);
            $offset     = $paginate[0];
            $limit      = $paginate[1];
            $data_limit = "LIMIT $offset,$limit";
        }
        else
        {
            $data_limit = '';
        }
        
        $query = "SELECT DATE(start_time) AS report_date FROM report_content  
            $where_search
            GROUP BY report_date
            $sort_details
            $data_limit 
            ";
        
		return $this->db->query($query);
	}

    public function get_reports($date,$paginate=NULL,$component_type=NULL,$sortby=NULL,$sortby_type=NULL,$search=NULL)
	{
        $where_component_type = '';
        $where_search         = '';
        $sort_details         = '';
        
        //Component Type
        if($component_type == 'video')
        {
            $where_component_type = " AND component_type = 'video'";
        }
        elseif($component_type == 'image')
        {
            $where_component_type = " AND component_type = 'image'";
        }
        elseif($component_type == 'text')
        {
            $where_component_type = " AND component_type = 'text'";
        }
        
        //Search
        if($search)
        {
            $where_search = " AND filename LIKE '%$search%' OR component_type LIKE '%$search%'";
        }
        
		$sort_details = " ORDER BY start_time $sortby_type";

        //Sort By
        if($sortby == 'name')
        {
            $sort_details = " ORDER BY filename $sortby_type";
        }
        elseif($sortby == 'content_type')
        {
            $sort_details = " ORDER BY component_type $sortby_type";
        }
        elseif($sortby == 'start_time')
        {
            $sort_details = " ORDER BY start_time $sortby_type";
        }
        elseif($sortby == 'end_time')
        {
            $sort_details = " ORDER BY end_time $sortby_type";
        }
        elseif($sortby == 'duration')
        {
            $sort_details = " ORDER BY duration $sortby_type";
        }
        
        if($paginate)
        {
            $paginate   = explode('.',$paginate);
            $offset     = $paginate[0];
            $limit      = $paginate[1];
            $data_limit = "LIMIT $offset,$limit";
        }
        else
        {
            $data_limit = '';
        }
        
        $query = "SELECT report_content.*, DATE(start_time) AS report_date, TIMEDIFF(end_time,start_time) AS duration 
            FROM report_content 
            WHERE DATE(start_time) = '$date' $where_component_type $where_search
            $sort_details $data_limit 
            ";

        //echo Kohana::debug($query);

        return $this->db->query($query);	
    }
    
    public function save_playlist_as($playlist_type, $playlist_id, $playlist_name)
    { 
        //Insert to Playlist table
        $this->db->query("INSERT INTO playlist SET
            name = '$playlist_name',
            type = '$playlist_type',
            created_on = NOW()
            ");
            
        $playlist_insert_id = mysql_insert_id();
        
        //Set Table Name
        if($playlist_type == 'video')
        {
            $table_name = 'video_playlist';
        }
        elseif($playlist_type == 'image')
        {
            $table_name = 'image_playlist';
        }
        elseif($playlist_type == 'text')
        {
            $table_name = 'text_playlist';
        }
        
        //Copy playlist data / loop
        $playlist = $this->db->query("SELECT * FROM $table_name WHERE playlist_id = $playlist_id");
        
        foreach($playlist as $playlists)
        {
            if($playlist_type == 'video')
            {
                $this->db->query("INSERT INTO $table_name SET
                    playlist_id = $playlist_insert_id,
                    name = '".$playlists->name."',
                    filename = '".$playlists->filename."',
                    display = '".$playlists->display."',
                    sort_id = '".$playlists->sort_id."'
                    ");
            }
        }
        
        return $playlist_insert_id;
    }

	public function current_content_playing($content_id, $component_type)
	{
		//Set Table Name
        if($component_type == 'video')
        {
            $table_name = 'video_playlist';
        }
        elseif($component_type == 'image')
        {
            $table_name = 'image_playlist';
        }
        elseif($component_type == 'text')
        {
            $table_name = 'text_playlist';
        }

		//Get Playlist ID and Sort ID
		$playlist = $this->db->query("SELECT playlist_id, sort_id FROM $table_name WHERE id = $content_id");
		
		foreach($playlist as $playlists)
		{
			$playlist_id = $playlists->playlist_id;
			$sort_id     = $playlists->sort_id;
		}
		
		//Update Query
		$this->db->query("UPDATE current_content 
			SET playlist_id = $playlist_id, content_id = $content_id, pl_count = $sort_id 
			WHERE component_type = '$component_type'");
	}
	
	//Get current_content Sort ID
	public function get_current_content($component_type)
	{
		$current_content = $this->db->query("SELECT pl_count FROM current_content WHERE component_type = '$component_type'");
		
		foreach($current_content as $current_contents)
		{
			return $current_contents->pl_count;
		}
	}
	
	//Get current_content Content ID
	public function get_current_content_id($component_type)
	{
		$current_content = $this->db->query("SELECT content_id FROM current_content WHERE component_type = '$component_type'");
		
		foreach($current_content as $current_contents)
		{
			return $current_contents->content_id;
		}
	}
	
	//Clear data of current_content 
	public function clear_current_content()
	{
		$this->db->query("UPDATE current_content SET playlist_id = 0, content_id = 0, pl_count = 0");
	}
	
}
