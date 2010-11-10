<?php defined('SYSPATH') or die('No direct script access.');
 
class settings_Core {
	
	// Get content path
	public static function content_path() {
		$db=New Database;
        
        $settings = $db->query("SELECT value FROM settings WHERE name = 'content_path'");
        
        foreach ($settings as $setting)
        {
            return $setting->value;
        }
	}

	// Get font path
	public static function font_path() {
		$db=New Database;
        
        $settings = $db->query("SELECT value FROM settings WHERE name = 'font_path'");
        
        foreach ($settings as $setting)
        {
            return $setting->value;
        }
	}
	
	//Display XML for debugging
	public static function view_xml() {
		$db=New Database;
        
        $settings = $db->query("SELECT value FROM settings WHERE name = 'view_xml'");
        
        foreach ($settings as $setting)
        {
            if ($setting->value == 'true'):
				return $setting->value;
			else:
				return '';
			endif; 
        }
	}
}

?>