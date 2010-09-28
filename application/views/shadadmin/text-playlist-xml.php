<?php                
define('MAGPIE_DIR', 'magpie/');
require_once(MAGPIE_DIR.'rss_fetch.inc');

header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>">
    <?php foreach ($playlist_content as $playlist_contents){?>
		<?php
		if($playlist_contents->rss):
			$rss = fetch_rss($playlist_contents->content);
			foreach ($rss->items as $item):
				$href = $item['link'];
				$title = $item['title'];	
				echo '<item id="'.$playlist_contents->id.'" name="'.$playlist_contents->name.'" type="text" image="content/image/'.$playlist_contents->image.'" align="'.$playlist_contents->image_alignment.'">'.$title.'</item>';
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
