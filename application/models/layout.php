<?php defined('SYSPATH') or die('No direct script access.');
 
class Layout_Model extends Model {
 
    public function __construct($id = NULL)
    {
        // load database library into $this->db (can be omitted if not required)
        parent::__construct($id);
    }
    
    public function get_all_layout()
    {
		$this->db->orderby('id', 'DESC');
        return $this->db->get('layout');
    }
    
    public function get_layout($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('layout');
    }
    
    public function get_layout_name($name)
    {
        $this->db->where('name', $name);
        return $this->db->get('layout');
    }
    
    public function get_current_layout()
    {
        return $this->db->get('current_layout');
    }
    
    public function get_component($table,$id)
    {
        $this->db->where('id', $id);
        return $this->db->get($table);
    }
    
    public function get_layout_component_order($layout_id)
    {
        $this->db->where('dstemplate_id', $layout_id);
        $this->db->orderby('sort_id');
        return $this->db->get('layout_component_order');
    }
    
    public function get_layout_component($table, $layout_id)
    {
        $this->db->where('dstemplate_id', $layout_id);
        return $this->db->get($table);
    }
    
    public function submit_layout(
            $submit_type,
            $layout_name,

            $component_counter_video,
            $video_component_trg,
            $video_component_id,
            $video_component_name,
            $video_playlist_id,
            $video_component_x,
            $video_component_y,
            $video_component_width,
            $video_component_height,

            $component_counter_image,
            $image_component_trg,
            $image_component_id,
            $image_component_name,
            $image_playlist_id,
            $image_component_x,
            $image_component_y,
            $image_component_width,
            $image_component_height,
            $image_component_delay,

            $component_counter_text,
            $text_component_trg,
            $text_component_id,
            $text_component_name,
            $text_playlist_id,
            $text_component_x,
            $text_component_y,
            $text_component_width,
            $text_component_height,
            $text_component_background_color,
            $text_component_scroll_speed,

            $component_counter_text_scroll,
            $text_scroll_component_trg,
            $text_scroll_component_id,
            $text_scroll_component_name,
            $text_scroll_playlist_id,
            $text_scroll_component_x,
            $text_scroll_component_y,
            $text_scroll_component_width,
            $text_scroll_component_height,
            $text_scroll_component_background_color,
            $text_scroll_component_scroll_speed,

            $component_counter_time,
            $time_component_trg,
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

            $layout_id=null)
        {
        
        echo $layout_id;
            
        if ($submit_type == 'create')
        {
            //Insert data to layout
            $this->db->query("INSERT INTO layout SET
                name       = '".mysql_real_escape_string($layout_name)."',
                created_on = NOW();
            ");

            $layout_id = mysql_insert_id(); //Output insert ID
        }
        else //update
        {
            //Delete layout component order
            if($layout_id)
            {
                $this->db->query("UPDATE layout SET
                    name        = '".mysql_real_escape_string($layout_name)."',
                    modified_on = NOW()
                    WHERE id    = $layout_id;
                ");

                $this->db->query("DELETE FROM layout_component_order WHERE dstemplate_id = $layout_id");
            }
        }
        
        $layout_component_order_value = array();
        
        if($video_component_trg)
        {
            for($i = 0; $i <= count($video_component_trg)-1; $i++)
            {
                if($video_component_trg[$i])
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
                    $this->db->query("$component_query component_video SET
                        dstemplate_id     = $layout_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($video_component_name[$i])."',
                        playlist_id       = '".$video_playlist_id[$i]."',
                        posx              = '".$video_component_x[$i]."',
                        posy              = '".$video_component_y[$i]."',
                        width             = '".$video_component_width[$i]."',
                        height            = '".$video_component_height[$i]."',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_video_id = (mysql_insert_id()) ? mysql_insert_id() : $component_video_id;

                    $layout_component_order_value[] = "video:$component_video_id:".$component_counter_video[$i];
                }
            }
        }
                
        //Image
        if($image_component_trg)
        {
            for($i = 0; $i <= count($image_component_trg)-1; $i++)
            {
                if($image_component_trg[$i])
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
                    
                    //component image query
                    $this->db->query("$component_query component_image SET
                        dstemplate_id     = $layout_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($image_component_name[$i])."',
                        playlist_id       = '".$image_playlist_id[$i]."',
                        posx              = '".$image_component_x[$i]."',
                        posy              = '".$image_component_y[$i]."',
                        width             = '".$image_component_width[$i]."',
                        height            = '".$image_component_height[$i]."',
                        delay             = '".$image_component_delay[$i]."',
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_image_id = (mysql_insert_id()) ? mysql_insert_id() : $component_image_id;
                    
                    $layout_component_order_value[] = "image:$component_image_id:".$component_counter_image[$i];
                }
            }
        }
        
        //Text Crawl
        if($text_component_trg)
        {
            for($i = 0; $i <= count($text_component_trg)-1; $i++)
            {
                if($text_component_trg[$i])
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
                        $text_component_bg_color = 'Transparent';
                    }
                    else{
                        $text_component_bg_color = $text_component_background_color[$i];
                    }

                    //component_image query
                    $this->db->query("$component_query component_text SET
                        dstemplate_id     = $layout_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($text_component_name[$i])."',
                        playlist_id       = '".$text_playlist_id[$i]."',
                        posx              = '".$text_component_x[$i]."',
                        posy              = '".$text_component_y[$i]."',
                        width             = '".$text_component_width[$i]."',
                        height            = '".$text_component_height[$i]."',
                        background_color  = '".$text_component_bg_color."',
                        scroll_speed      = '".$text_component_scroll_speed[$i]."',
                        orientation       = 'Horizontal',
                        reload = 'Yes', 
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_text_id = (mysql_insert_id()) ? mysql_insert_id() : $component_text_id;
                    
                    $layout_component_order_value[] = "text_crawl:$component_text_id:".$component_counter_text[$i];
                }
            }
        }
        
        //Text Scroll
        if($text_scroll_component_trg)
        {
            for($i = 0; $i <= count($text_scroll_component_trg)-1; $i++)
            {
                if($text_scroll_component_trg[$i])
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
                    $this->db->query("$component_query component_text SET
                        dstemplate_id     = $layout_id,
                        sort_id           = $i,
                        name              = '".mysql_real_escape_string($text_scroll_component_name[$i])."',
                        playlist_id       = '".$text_scroll_playlist_id[$i]."',
                        posx              = '".$text_scroll_component_x[$i]."',
                        posy              = '".$text_scroll_component_y[$i]."',
                        width             = '".$text_scroll_component_width[$i]."',
                        height            = '".$text_scroll_component_height[$i]."',
                        background_color  = '".$text_scroll_component_bg_color."',
                        scroll_speed      = '".$text_scroll_component_scroll_speed[$i]."',
                        orientation       = 'Vertical',
                        reload = 'Yes', 
                        $datetime_details = NOW()
                        $component_query_where
                    ");

                    $component_text_scroll_id = (mysql_insert_id()) ? mysql_insert_id() : $component_text_scroll_id;
                    
                    $layout_component_order_value[] = "text_scroll:$component_text_scroll_id:".$component_counter_text_scroll[$i];
                }
            }
        }
        
        //Time
        if($time_component_trg)
        {
            for($i = 0; $i <= count($time_component_trg)-1; $i++)
            {
                if($time_component_trg[$i])
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
                    $this->db->query("$component_query component_time SET
                        dstemplate_id     = $layout_id,
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
                    
                    $layout_component_order_value[] = "time:$component_time_id:".$component_counter_time[$i];
                }
            }
        }
        
        //print_r($dstemplate_component_order_value);
        
        foreach($layout_component_order_value as $layout_component_order_values)
        {
            $component_order_value = explode(':',$layout_component_order_values);

            $this->db->query("INSERT INTO layout_component_order SET
                dstemplate_id             = $layout_id,
                dstemplate_component_type = '".$component_order_value[0]."',
                dstemplate_component_id   = '".$component_order_value[1]."',
                sort_id                   = '".$component_order_value[2]."'
            ;");
        }

        return $layout_id;
    }
    
    public function delete_layout($id) //Check mo to.... for text scroll compo
    {
        $this->db->query("DELETE FROM layout WHERE id = $id");    
        $this->db->query("DELETE FROM component_video WHERE dstemplate_id = $id");
        $this->db->query("DELETE FROM component_image WHERE dstemplate_id = $id");
        $this->db->query("DELETE FROM component_text WHERE dstemplate_id = $id");
        $this->db->query("DELETE FROM component_time WHERE dstemplate_id = $id");
        $this->db->query("DELETE FROM layout_component_order WHERE dstemplate_id = $id");
    }
    
    public function load_layout($id)
    {
		$this->db->query("TRUNCATE current_layout");
        $this->db->query("INSERT INTO current_layout SET layout_id = $id");
    }
    
    //Update reload to 'Yes' if playlist is updated
    public function update_component_reload($id,$component_table)
    {
        $this->db->query("UPDATE $component_table SET reload = 'Yes' WHERE playlist_id = $id");
    }
    
    public function update_all_components_reload($id) //Update this components
    {
        //$this->db->where('id', $id);
        //$layout = $this->db->get('layout');
        
        /*foreach ($layout as $layouts)
        {
            $this->db->query("UPDATE component_video SET reload = 'No' WHERE id = ".$layouts->component_video_id);
            $this->db->query("UPDATE component_image SET reload = 'No' WHERE id = ".$layouts->component_image_id);
            $this->db->query("UPDATE component_text SET reload = 'No' WHERE id = ".$layouts->component_text_id);
            $this->db->query("UPDATE component_text SET reload = 'No' WHERE id = ".$layouts->component_text_scroll_id); //02-24-10: Added
            $this->db->query("UPDATE component_time SET reload = 'No' WHERE id = ".$layouts->component_time_id);
        }*/
        
        $this->db->query("UPDATE component_video SET reload = 'No' WHERE dstemplate_id = ".$id);
        $this->db->query("UPDATE component_image SET reload = 'No' WHERE dstemplate_id = ".$id);
        $this->db->query("UPDATE component_text SET reload = 'No' WHERE dstemplate_id = ".$id);
        $this->db->query("UPDATE component_time SET reload = 'No' WHERE dstemplate_id = ".$id);
        
    }
    
    public function update_reload($component_type,$component_id)
    {
        if($component_type == 'video'){
            $this->db->query("UPDATE component_video SET reload = 'No' WHERE id = ".$component_id);
        }
        elseif($component_type == 'image'){
            $this->db->query("UPDATE component_image SET reload = 'No' WHERE id = ".$component_id);
        }
        elseif($component_type == 'text'){
            $this->db->query("UPDATE component_text SET reload = 'No' WHERE id = ".$component_id);
        }
        elseif($component_type == 'textscroll'){
            $this->db->query("UPDATE component_text SET reload = 'No' WHERE id = ".$component_id);
        }
    }
}
