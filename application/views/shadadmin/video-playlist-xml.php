<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>" pl_count="<?php echo $pl_count;?>">
    <?php
    foreach ($playlist_content as $playlist_contents){
    ?>
        <item count_id="<?php echo $playlist_contents->sort_id;?>" id="<?php echo $playlist_contents->id;?>" name="<?php echo $playlist_contents->name;?>" type="flv" file="content/video/<?php echo $playlist_contents->filename;?>" display="<?php echo $playlist_contents->display;?>"/>
    <?php } ?>
    </items>
</data>