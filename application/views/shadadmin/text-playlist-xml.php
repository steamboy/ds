<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>">
    <?php foreach ($playlist_content as $playlist_contents){?>
        <item id="<?php echo $playlist_contents->id;?>" name="<?php echo $playlist_contents->name;?>" type="text" image="content/image/<?php echo $playlist_contents->image;?>" align="<?php echo $playlist_contents->image_alignment;?>">
            <?php if($playlist_contents->rss):?>
				<![CDATA[<?php echo rsslib::RSS_Display($playlist_contents->content);?>]]>
			<?php else: ?>
				<![CDATA[<?php echo $playlist_contents->content;?>]]>
			<?php endif; ?>
        </item>
    <?php } ?>
    </items>
</data>