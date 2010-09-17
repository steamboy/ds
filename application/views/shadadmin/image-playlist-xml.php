<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $playlist_id;?>">
    <?php
    foreach ($playlist_content as $playlist_contents){
        if($playlist_contents->delay){
            $delay = 'delay="'.$playlist_contents->delay.'"';
        }
        else{
            $delay = '';
        }
    ?>
        <item id="<?php echo $playlist_contents->id;?>" name="<?php echo $playlist_contents->name;?>" type="<?php echo $playlist_contents->type;?>" file="content/image/<?php echo $playlist_contents->filename;?>" unboxed="<?php echo $playlist_contents->boxed ;?>" <?php echo $delay;?> />
    <?php } ?>
    </items>
</data>