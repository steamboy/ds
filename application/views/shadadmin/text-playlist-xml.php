<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>">
    <?php foreach ($playlist_content as $playlist_contents){?>
        <item id="<?php echo $playlist_contents->id;?>" name="<?php echo $playlist_contents->name;?>" type="text" image="content/image/<?php echo $playlist_contents->image;?>" align="<?php echo $playlist_contents->image_alignment;?>">
            <![CDATA[<?php echo $playlist_contents->content;?>]]>
        </item>
    <?php } ?>
    </items>
</data>