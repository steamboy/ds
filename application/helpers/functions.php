<?php defined('SYSPATH') or die('No direct script access.');
 
class functions_Core {
 
    public static function alert($message)
    {
        return "alert('$message');\n";
    }
    
    //Select dropdown value
    public static function selectedValueDropdown($selected,$value)
    {
        if ($selected == $value){
            $selected = 'selected';
        }
        return $selected;
    }
    
    //Check Checkbox
    public static function checkedCheckbox($checked,$value)
    {
        if ($checked == $value){
            $checked = 'checked';
        }
        return $checked;
    }
    
    //Check Font Color
    public static function checkFontColor($color)
    {
        if(!$color){
            $color = 'ffffff';
        }
        return $color;
    }
    
    //Check Font Background Color
    public static function checkFontBg($color)
    {
        if(!$color){
            $color = '000000';
        }
        return $color;
    }
    
    //List all files inside a folder
    public static function list_folder_files($dir)
    {
        $dir_name = $dir;
        
        if (!functions::is_empty_dir($dir)){
            $files = scandir($dir, 0);
            $filename = '';
            $filesize = '';
            
            for( $ctr = 1; $ctr < sizeof( $files ); $ctr++ ){
                if($files[$ctr] != "." && $files[$ctr] != ".."){
                    /*$folder_files = array(
                        'filename' => $files[$ctr],
                        'filesize' => $this->formatfilesize(filesize($dir.$files[$ctr])),
                    );*/
                    
                    $i = $ctr.',';
                    
                    /*if(!is_dir($dir.'/'.$files[$ctr])){
                        $filename .= $files[$ctr].',';
                    }*/
                    
                    if(is_dir($dir.'/'.$files[$ctr]))
                    {
                        $filename .= $files[$ctr].' [FOLDER],';
                    }
                    else
                    {
                        $filename .= $files[$ctr].',';
                    }
                    
                    //$filename .= $files[$ctr].',';
                    
                    //$filesize .= $this->formatfilesize(filesize($dir.$files[$ctr])).',';
                }
            }
            
            $exploded_i        = explode(',',substr_replace($i ,'',-1));
            $exploded_filename = explode(',',substr_replace($filename ,'',-1));
            $exploded_filesize = explode(',',substr_replace($filesize ,'',-1));
            
            return $exploded_filename;
        }
        else{
            return array();
        }
    }
    
    //Check if folder is empty
    public static function is_empty_dir($dir){
        if (($files = @scandir($dir)) && count($files) <= 2) {
            return true;
        }
        return false;
    }
    
    //Get and Format Filesize
    public static function formatfilesize($data)
    {
        // bytes
        if( $data < 1024 )
        {    
            return $data . " Bytes";    
        }
        
        // kilobytes
        else if( $data < 1024000 )
        {    
            return round( ( $data / 1024 ), 1 ) . " KB";    
        }
        
        // megabytes
        else{    
            return round( ( $data / 1024000 ), 1 ) . " MB";    
        }
    }
    
    public static function jPickerTransparent($value){
        if($value == 'Transparent'){
            $value = '';
        }
        return $value;
    }

    public static function xmlAttributeDisplay($attribute,$value)
    {
        if($value OR $value == '0')
        {
            $render = $attribute.'="'.$value.'" ';
        }
        else
        {
            $render = '';
        }
        return $render;
    }

    public static function accountExpiration(){ ////Check Expiration
	        $exp_date = '2020-08-07';
	        $todays_date = date("Y-m-d");

	        $today = strtotime($todays_date);
	        $expiration_date = strtotime($exp_date); 

	        if($today >= $expiration_date){
	            url::redirect('users/expired');
	        }
	    }

    public static function isFolder($path)
    {
        if(is_dir($path)){
            return true;
        }
    }

    public static function getPlaylistName($playlist_id)
    {
        $db=New Database;
        
        $playlist = $db->query("SELECT name FROM playlist WHERE id = $playlist_id");
        
        foreach ($playlist as $playlists)
        {
            return $playlists->name;
        }
    }

    //Shorten Text
    public static function ShortenText($text)
    {    
        if (strlen($text) > 25)
        {
            $chars = 15;
            $text = $text." ";
            $text = substr($text,0,$chars);
            //$text = substr($text,0,strrpos($text,' '));
            $text = $text."...";
        }
        return $text;
    }
    
    public function playlistFilenameCheck($filename)
    {
        if(strpos($filename,'/'))
        {
            $filename = substr($filename,strpos($filename,'/') + 1);
        }
        
        return $filename;
    }

	//Higlight Navigation Link
	public function highlightNavLink($uri_string,$uri_string2)
	{
		if($uri_string == $uri_string2)
		//if (preg_match("-$uri_string-", $uri_string2))
		//if (preg_match("-\b$uri_string\b-i", $uri_string2))
		{
			$style = 'style="color:red"';
		}
		else
		{
			$style = '';
		}
		
		return $style;
	}
	
	//Scroll Speed Dropdown
	public function dropDownValueScrollSpeed($selected_value=NULL)
	{
		$render = '
			<option value="1" '.functions::selectedValueDropdown($selected_value, '1').'>1</option>
			<option value="2" '.functions::selectedValueDropdown($selected_value, '2').'>2</option>
			<option value="5" '.functions::selectedValueDropdown($selected_value, '5').'>5</option>
			<option value="8" '.functions::selectedValueDropdown($selected_value, '8').'>8</option>
			<option value="10" '.functions::selectedValueDropdown($selected_value, '10').'>10</option>
			<option value="13" '.functions::selectedValueDropdown($selected_value, '13').'>13</option>
			<option value="15" '.functions::selectedValueDropdown($selected_value, '15').'>15</option>
			<option value="18" '.functions::selectedValueDropdown($selected_value, '18').'>18</option>
			<option value="20" '.functions::selectedValueDropdown($selected_value, '20').'>20</option>
			<option value="25" '.functions::selectedValueDropdown($selected_value, '25').'>25</option>
			<option value="30" '.functions::selectedValueDropdown($selected_value, '30').'>30</option>';
		
		return $render;
	}
}
 
?>
