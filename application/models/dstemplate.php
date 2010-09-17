<?php defined('SYSPATH') or die('No direct script access.');
 
class Dstemplate_Model extends Model {
 
	public function __construct($id = NULL)
	{
		// load database library into $this->db (can be omitted if not required)
		parent::__construct($id);
	}
	
	public function get_all_dstemplate()
	{
		$this->db->orderby('id', 'DESC');
		return $this->db->get('dstemplate');
	}
	
	public function get_dstemplate($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('dstemplate');
	}
	
	public function get_dstemplate_name($name)
	{
		$this->db->where('name', $name);
		return $this->db->get('dstemplate');
	}
	
	public function get_current_dstemplate()
	{
		return $this->db->get('current_dstemplate');
	}
	
	public function get_component($table,$id)
	{
		$this->db->where('id', $id);
		return $this->db->get($table);
	}
    
    public function get_dscomponent($table, $dstemplate_id, $component_id, $addtional_condtion=NULL)
    {
        return $db->query("SELECT * FROM $table WHERE 
                    dstemplate_id = $dstemplate_id AND
                    id            = $component_id
                    $addtional_condtion
                    ");
    }
    
    public function get_dstemplate_component($table, $template_id)
    {
        $this->db->where('dstemplate_id', $template_id);
        return $this->db->get($table);
    }
	
	public function submit_dstemplate(
			$name,
			$video_component_name,
			$video_playlist_id,
			$video_component_x,
			$video_component_y,
			$video_component_width,
			$video_component_height,
			$video_component_reload,
			$text_component_name,
			$text_playlist_id,
			$text_component_x,
			$text_component_y,
			$text_component_width,
			$text_component_height,
			$text_component_font,
			$text_component_font_color,
			$text_component_reload,
			$time_component_name,
			$time_component_x,
			$time_component_y,
			$time_component_width,
			$time_component_height,
			$time_component_font,
			$time_component_font_color,
			$time_component_reload,
			$submit_type,
			$id=null)
		{
		
		if ($submit_type == 'create')
		{
			$component_query  = 'INSERT INTO';
			$datetime_details = 'created_on';
			$component_query_where = '';
			$component_video_id  = '';
			$component_text_id  = '';
			$component_time_id  = '';
		}
		else //update
		{
			$component_query       = 'UPDATE';
			$datetime_details      = 'modified_on';
			
			$this->db->where('id', $id);
			$dstemplate = $this->db->get('dstemplate');
			foreach ($dstemplate as $dstemplates)
			{
				$component_video_id = $dstemplates->component_video_id;
				$component_text_id  = $dstemplates->component_text_id;
				$component_time_id  = $dstemplates->component_time_id;
			}
			
			$component_query_where = 'WHERE id = ';
		}
		
		$this->db->query("$component_query component_video SET 
			name = '".mysql_real_escape_string($video_component_name)."', 
			playlist_id = $video_playlist_id, 
			posx = $video_component_x, 
			posy = $video_component_y, 
			width = $video_component_width, 
			height = $video_component_height, 
			reload = '$video_component_reload', 
			$datetime_details = NOW()
			$component_query_where $component_video_id
			");
		$component_video_id =  ($submit_type == 'create') ? mysql_insert_id() : $component_video_id;
			
		$this->db->query("$component_query component_text SET
			name = '".mysql_real_escape_string($text_component_name)."', 
			playlist_id = $text_playlist_id, 
			posx = $text_component_x, 
			posy = $text_component_y, 
			width = $text_component_width, 
			height = $text_component_height, 
			font = '".mysql_real_escape_string($text_component_font)."', 
			font_color = '".mysql_real_escape_string($text_component_font_color)."', 
			reload = '".mysql_real_escape_string($text_component_reload)."', 
			$datetime_details = NOW()
			$component_query_where $component_text_id
			");
		$component_text_id = ($submit_type == 'create') ? mysql_insert_id() : $component_text_id;
			
		$this->db->query("$component_query component_time SET
			name = '".mysql_real_escape_string($time_component_name)."', 
			posx = $time_component_x, 
			posy = $time_component_y, 
			width = $time_component_width, 
			height = $time_component_height, 
			font = '".mysql_real_escape_string($time_component_font)."', 
			font_color = '".mysql_real_escape_string($time_component_font_color)."', 
			reload = '".mysql_real_escape_string($time_component_reload)."', 
			$datetime_details = NOW()
			$component_query_where $component_time_id
			");
		$component_time_id = ($submit_type == 'create') ? mysql_insert_id() : $component_time_id;
		
		$this->db->query("$component_query dstemplate SET 
			name = '".mysql_real_escape_string($name)."',
			component_video_id = $component_video_id, 
			component_text_id = $component_text_id,
			component_time_id = $component_time_id, 
			$datetime_details = NOW()
			$component_query_where $id
			");
		$last_inserted_id = ($submit_type == 'create') ? mysql_insert_id() : $id;
		
		return $last_inserted_id;
	}
	
	public function delete_dstemplate($id)
	{
		$this->db->query("DELETE FROM dstemplate WHERE id = $id");	
		$this->db->query("DELETE FROM component_video WHERE id = $id");
		$this->db->query("DELETE FROM component_text WHERE id = $id");
		$this->db->query("DELETE FROM component_time WHERE id = $id");
	}
	
	public function load_dstemplate($id)
	{
		$this->db->query("UPDATE current_dstemplate SET dstemplate_id = $id");
	}
	
	public function update_component_reload($id,$component_table)
	{
		$this->db->query("UPDATE $component_table SET reload = 'Yes' WHERE playlist_id = $id");
	}
	
	public function update_all_components_reload($id)
	{
		$this->db->where('id', $id);
		$dstemplate = $this->db->get('dstemplate');
		
		foreach ($dstemplate as $dstemplates)
		{
			$this->db->query("UPDATE component_video SET reload = 'No' WHERE id = ".$dstemplates->component_video_id);
			$this->db->query("UPDATE component_text SET reload = 'No' WHERE id = ".$dstemplates->component_text_id);
			$this->db->query("UPDATE component_time SET reload = 'No' WHERE id = ".$dstemplates->component_time_id);
		}
		
	}
    
    public function get_dstemplate_component_order($template_id)
    {
        $this->db->where('dstemplate_id', $template_id);
        $this->db->orderby('sort_id');
        return $this->db->get('dstemplate_component_order');
    }
    
    //DS Template Create
    public function submitTemplateForm(
        $submit_type,
        $template_name,
        $component_counter_video,
        $video_component_id,
        $video_component_name,
        $video_component_x,
        $video_component_y,
        $video_component_width,
        $video_component_height,
        
        $component_counter_image,
        $image_component_id,
        $image_component_name,
        $image_component_x,
        $image_component_y,
        $image_component_width,
        $image_component_height,
        $image_component_delay,
        
        $component_counter_text,
        $text_component_id,
        $text_component_name,
        $text_component_x,
        $text_component_y,
        $text_component_width,
        $text_component_height,
        $text_component_background_color,
        $text_component_scroll_speed,
        
        $component_counter_text_scroll,
        $text_scroll_component_id,
        $text_scroll_component_name,
        $text_scroll_component_x,
        $text_scroll_component_y,
        $text_scroll_component_width,
        $text_scroll_component_height,
        $text_scroll_component_background_color,
        $text_scroll_component_scroll_speed,
        
        $component_counter_time,
        $time_component_id,
        $time_component_name,
        $time_component_x,
        $time_component_y,
        $time_component_width,
        $time_component_height,
        $time_component_font,
        $time_component_font_size,
        $time_component_font_color,
        $time_component_font_style,
        $time_component_background_color,
        
        $dstemplate_id=NULL 
    )
    {
        
        if ($submit_type == 'create')
        {
            //Insert data to template
            $this->db->query("INSERT INTO dstemplate SET
                name = '".mysql_real_escape_string($template_name)."',
                created_on = NOW();
            ");

            $dstemplate_id = mysql_insert_id(); //Output insert ID
        }
        else //update
        {
            //Delete template_component order
            if($dstemplate_id)
            {
                $this->db->query("UPDATE dstemplate SET
                    name = '".mysql_real_escape_string($template_name)."',
                    modified_on = NOW()
                    WHERE id = $dstemplate_id;
                ");
                
                $this->db->query("DELETE FROM dstemplate_component_order WHERE dstemplate_id = $dstemplate_id");
            }
        }
        
        $dstemplate_component_order_value = array();
        
        if($video_component_name)
        {
            for($i = 0; $i <= count($video_component_name)-1; $i++)
            {
                if($video_component_name[$i])
                {
                    $component_video_id = '';
                    
                    //Get component ID
                    if($video_component_id[$i]) 
                    {
                        $component_video_id = $video_component_id[$i];
                        
                        $component_query       = 'UPDATE';
                        $datetime_details      = 'modified_on';
                        $component_query_where = 'WHERE id = '.$component_video_id;
                    }
                    else
                    {
                        //Insert
                        $component_query       = 'INSERT';
                        $datetime_details      = 'created_on';
                        $component_query_where = '';
                    }

                    //dstemplate_video query
                    $this->db->query("$component_query dstemplate_video SET
                        dstemplate_id     = $dstemplate_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($video_component_name[$i])."',
                        posx              = '".$video_component_x[$i]."',
                        posy              = '".$video_component_y[$i]."',
                        width             = '".$video_component_width[$i]."',
                        height            = '".$video_component_height[$i]."',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_video_id = (mysql_insert_id()) ? mysql_insert_id() : $component_video_id;

                    $dstemplate_component_order_value[] = "video:$component_video_id:".$component_counter_video[$i];
                }
            }
        }
        
        //Image
        if($image_component_name)
        {
            for($i = 0; $i <= count($image_component_name)-1; $i++)
            {
                if($image_component_name[$i])
                {
                    $component_image_id = '';
                    
                    //Get component ID
                    if($image_component_id[$i]) 
                    {
                        $component_image_id = $image_component_id[$i];
                        
                        $component_query       = 'UPDATE';
                        $datetime_details      = 'modified_on';
                        $component_query_where = 'WHERE id = '.$component_image_id;
                    }
                    else
                    {
                        //Insert
                        $component_query       = 'INSERT';
                        $datetime_details      = 'created_on';
                        $component_query_where = '';
                    }

                    //dstemplate_video query
                    $this->db->query("$component_query dstemplate_image SET
                        dstemplate_id     = $dstemplate_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($image_component_name[$i])."',
                        posx              = '".$image_component_x[$i]."',
                        posy              = '".$image_component_y[$i]."',
                        width             = '".$image_component_width[$i]."',
                        height            = '".$image_component_height[$i]."',
                        delay             = '".$image_component_delay[$i]."',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_image_id = (mysql_insert_id()) ? mysql_insert_id() : $component_image_id;
                    
                    $dstemplate_component_order_value[] = "image:$component_image_id:".$component_counter_image[$i];
                }
            }
        }
        
        //Text Crawl
        if($text_component_name)
        {
            for($i = 0; $i <= count($text_component_name)-1; $i++)
            {
                if($text_component_name[$i])
                {
                    $component_text_id = '';
                    
                    //Get component ID
                    if($text_component_id[$i]) 
                    {
                        $component_text_id = $text_component_id[$i];
                        
                        $component_query       = 'UPDATE';
                        $datetime_details      = 'modified_on';
                        $component_query_where = 'WHERE id = '.$component_text_id;
                    }
                    else
                    {
                        //Insert
                        $component_query       = 'INSERT';
                        $datetime_details      = 'created_on';
                        $component_query_where = '';
                    }
                    
                    //Check Background color
                    if($text_component_background_color[$i] == '00000000'|| $text_component_background_color[$i] == ''){
                        $text_component_bgcolor = 'Transparent';
                    }
                    else{
                        $text_component_bgcolor = $text_component_background_color[$i];
                    }

                    //dstemplate_video query
                    $this->db->query("$component_query dstemplate_text SET
                        dstemplate_id     = $dstemplate_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($text_component_name[$i])."',
                        posx              = '".$text_component_x[$i]."',
                        posy              = '".$text_component_y[$i]."',
                        width             = '".$text_component_width[$i]."',
                        height            = '".$text_component_height[$i]."',
                        background_color  = '".$text_component_bgcolor."',
                        scroll_speed      = '".$text_component_scroll_speed[$i]."',
                        orientation       = 'Horizontal',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_text_id = (mysql_insert_id()) ? mysql_insert_id() : $component_text_id;
                    
                    $dstemplate_component_order_value[] = "text_crawl:$component_text_id:".$component_counter_text[$i];
                }
            }
        }
        
        //Text Scroll
        if($text_scroll_component_name)
        {
            for($i = 0; $i <= count($text_scroll_component_name)-1; $i++)
            {
                if($text_scroll_component_name[$i])
                {
                    $component_text_scroll_id = '';
                    
                    //Get component ID
                    if($text_scroll_component_id[$i]) 
                    {
                        $component_text_scroll_id = $text_scroll_component_id[$i];
                        
                        $component_query       = 'UPDATE';
                        $datetime_details      = 'modified_on';
                        $component_query_where = 'WHERE id = '.$component_text_scroll_id;
                    }
                    else
                    {
                        //Insert
                        $component_query       = 'INSERT';
                        $datetime_details      = 'created_on';
                        $component_query_where = '';
                    }

                    //Check Background color
                    if($text_scroll_component_background_color[$i] == '00000000'|| $text_scroll_component_background_color[$i] == ''){
                        $text_scroll_component_bg_color = 'Transparent';
                    }
                    else{
                        $text_scroll_component_bg_color = $text_scroll_component_background_color[$i];
                    }
                    
                    //dstemplate_video query
                    $this->db->query("$component_query dstemplate_text SET
                        dstemplate_id     = $dstemplate_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($text_scroll_component_name[$i])."',
                        posx              = '".$text_scroll_component_x[$i]."',
                        posy              = '".$text_scroll_component_y[$i]."',
                        width             = '".$text_scroll_component_width[$i]."',
                        height            = '".$text_scroll_component_height[$i]."',
                        background_color  = '".$text_scroll_component_bg_color."',
                        scroll_speed      = '".$text_scroll_component_scroll_speed[$i]."',
                        orientation       = 'Vertical',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_text_scroll_id = (mysql_insert_id()) ? mysql_insert_id() : $component_text_scroll_id;
                    
                    $dstemplate_component_order_value[] = "text_scroll:$component_text_scroll_id:".$component_counter_text_scroll[$i];
                }
            }
        }
        
        //Time
        if($time_component_name)
        {
            for($i = 0; $i <= count($time_component_name)-1; $i++)
            {
                echo $time_component_font_style[$i];
                
                if($time_component_name[$i])
                {
                    $component_time_id = '';
                    
                    //Get component ID
                    if($time_component_id[$i]) 
                    {
                        $component_time_id = $time_component_id[$i];
                        
                        $component_query       = 'UPDATE';
                        $datetime_details      = 'modified_on';
                        $component_query_where = 'WHERE id = '.$component_time_id;
                    }
                    else
                    {
                        //Insert
                        $component_query       = 'INSERT';
                        $datetime_details      = 'created_on';
                        $component_query_where = '';
                    }
                    
                    //Check Font color
                    if($time_component_font_color[$i] == '00000000'|| $time_component_font_color[$i] == ''){
                        $time_component_ft_color = 'Transparent';
                    }
                    else{
                        $time_component_ft_color = $time_component_font_color[$i];
                    }
                    
                    //Check Background color
                    if($time_component_background_color[$i] == '00000000'|| $time_component_background_color[$i] == ''){
                        $time_component_bg_color = 'Transparent';
                    }
                    else{
                        $time_component_bg_color = $time_component_background_color[$i];
                    }
                    
                    //dstemplate_video query
                    $this->db->query("$component_query dstemplate_time SET
                        dstemplate_id     = $dstemplate_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($time_component_name[$i])."',
                        posx              = '".$time_component_x[$i]."',
                        posy              = '".$time_component_y[$i]."',
                        width             = '".$time_component_width[$i]."',
                        height            = '".$time_component_height[$i]."',
                        font              = '".$time_component_font[$i]."',
                        font_size         = '".$time_component_font_size[$i]."',
                        font_color        = '".$time_component_ft_color."',
                        font_style        = '".$time_component_font_style[$i]."',
                        background_color  = '".$time_component_bg_color."',
                        
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_time_id = (mysql_insert_id()) ? mysql_insert_id() : $component_time_id;
                    
                    $dstemplate_component_order_value[] = "time:$component_time_id:".$component_counter_time[$i];
                }
            }
        }
        
        //print_r($dstemplate_component_order_value);
        
        foreach($dstemplate_component_order_value as $dstemplate_component_order_values)
        {
            $component_order_value = explode(':',$dstemplate_component_order_values);
            
            $this->db->query("INSERT INTO dstemplate_component_order SET
                dstemplate_id             = $dstemplate_id,
                dstemplate_component_type = '".$component_order_value[0]."',
                dstemplate_component_id   = '".$component_order_value[1]."',
                sort_id                   = '".$component_order_value[2]."'
            ;");    
        }
        
        return $dstemplate_id;
        
    }
    
    public function deleteTemplate($template_id)
    {
        $this->db->query("DELETE FROM dstemplate WHERE id = $template_id");       
        $this->db->query("DELETE FROM dstemplate_video WHERE dstemplate_id = $template_id");       
        $this->db->query("DELETE FROM dstemplate_image WHERE dstemplate_id = $template_id");       
        $this->db->query("DELETE FROM dstemplate_text WHERE dstemplate_id = $template_id");       
        $this->db->query("DELETE FROM dstemplate_time WHERE dstemplate_id = $template_id");       
        $this->db->query("DELETE FROM dstemplate_component_order WHERE dstemplate_id = $template_id");       
    }
}
