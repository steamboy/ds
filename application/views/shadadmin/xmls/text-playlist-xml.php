<?php                
define('MAGPIE_DIR', 'magpie/');
require_once(MAGPIE_DIR.'rss_fetch.inc');

function get_string_between($string, $start, $end)
{
    $string = " ".$string;
    $ini    = strpos($string,$start);
    
    if ($ini == 0) return "";
    
    $ini += strlen($start);   
    $len = strpos($string,$end,$ini) - $ini;
    
    return substr($string,$ini,$len);
}

function has_html_tags($string){
	if (preg_match("/([\<])([^\>]{1,})*([\>])/i", $string)):
		return true;
	endif;
}

header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>">
    <?php foreach ($playlist_content as $playlist_contents){?>
		<?php
		if($playlist_contents->rss):
			if(has_html_tags($playlist_contents->content)):
				//Check if RSS URL has SLASH (/) at the end
			
				$start_flag = ">http://";
				$end_flag   = "/</";
			
				$rss_url = get_string_between($playlist_contents->content, $start_flag, $end_flag);
				$rss_url = 'http://'.$rss_url.'/';
			
				$html_tags       = explode($rss_url, $playlist_contents->content);
				$html_tags_start = $html_tags[0];
				$html_tags_end   = $html_tags[1];
			else:
				$rss_url = $playlist_contents->content;
				
				$html_tags_start = '';
				$html_tags_end   = '';
			endif;
			
			$rss = fetch_rss(rtrim($rss_url));
			
			foreach ($rss->items as $item):
				$href = $item['link'];
				$title = $item['title'];
				$description = $item['description'];	
				echo '<item id="'.$playlist_contents->id.'" name="'.$playlist_contents->name.'" type="text" image="content/image/'.$playlist_contents->image.'" align="'.$playlist_contents->image_alignment.'">
					<![CDATA['.$html_tags_start.$title.' - '.$description.$html_tags_end.']]>
				</item>';
			endforeach;

		else:
		?>
			<item id="<?php echo $playlist_contents->id;?>" name="<?php echo $playlist_contents->name;?>" type="text" image="content/image/<?php echo $playlist_contents->image;?>" align="<?php echo $playlist_contents->image_alignment;?>">
	            <![CDATA[<?php echo $playlist_contents->content;?>]]>
	        </item>
		<?php
		endif;
		?>
    <?php } ?>
    </items>
</data>
