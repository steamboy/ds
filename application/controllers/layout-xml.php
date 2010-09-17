<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $layout_id;?>">
        <?php
        if($image_playlist_id){
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$image_playlist_id);
        echo functions::xmlAttributeDisplay('compid',$image_component_id);
        echo functions::xmlAttributeDisplay('name',$image_component_name);
        echo functions::xmlAttributeDisplay('type','image');
        echo functions::xmlAttributeDisplay('posX',$image_component_x);
        echo functions::xmlAttributeDisplay('posY',$image_component_y);
        echo functions::xmlAttributeDisplay('width',$image_component_width);
        echo functions::xmlAttributeDisplay('height',$image_component_height);
        echo functions::xmlAttributeDisplay('delay',$image_component_delay);
        echo 'reload="'.$image_component_reload.'"';
        ?> />
        <?php
        }
        ?>
        
        <?php
        if($video_playlist_id){
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$video_playlist_id);
        echo functions::xmlAttributeDisplay('compid',$video_component_id);
        echo functions::xmlAttributeDisplay('name',$video_component_name);
        echo functions::xmlAttributeDisplay('type','video');
        echo functions::xmlAttributeDisplay('posX',$video_component_x);
        echo functions::xmlAttributeDisplay('posY',$video_component_y);
        echo functions::xmlAttributeDisplay('width',$video_component_width);
        echo functions::xmlAttributeDisplay('height',$video_component_height);
        echo 'reload="'.$video_component_reload.'"';
        ?> />
        <?php
        }
        ?>
        
        <?php
        if($text_playlist_id){
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$text_playlist_id);
        echo functions::xmlAttributeDisplay('compid',$text_component_id);
        echo functions::xmlAttributeDisplay('name',$text_component_name);
        echo functions::xmlAttributeDisplay('type','text');
        echo functions::xmlAttributeDisplay('posX',$text_component_x);
        echo functions::xmlAttributeDisplay('posY',$text_component_y);
        echo functions::xmlAttributeDisplay('width',$text_component_width);
        echo functions::xmlAttributeDisplay('height',$text_component_height);
        echo functions::xmlAttributeDisplay('orientation',$text_component_orientation);
        echo functions::xmlAttributeDisplay('speed',$text_component_scroll_speed);
        echo functions::xmlAttributeDisplay('bgcolor',$text_component_background_color);
        echo 'reload="'.$text_component_reload.'"';
        ?> />
        <?php
        }
        ?>
        
        <?php
        if($text_scroll_playlist_id){
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$text_scroll_playlist_id);
        echo functions::xmlAttributeDisplay('compid',$text_scroll_component_id);
        echo functions::xmlAttributeDisplay('name',$text_scroll_component_name);
        echo functions::xmlAttributeDisplay('type','text');
        echo functions::xmlAttributeDisplay('posX',$text_scroll_component_x);
        echo functions::xmlAttributeDisplay('posY',$text_scroll_component_y);
        echo functions::xmlAttributeDisplay('width',$text_scroll_component_width);
        echo functions::xmlAttributeDisplay('height',$text_scroll_component_height);
        echo functions::xmlAttributeDisplay('orientation',$text_scroll_component_orientation);
        echo functions::xmlAttributeDisplay('speed',$text_scroll_component_scroll_speed);
        echo functions::xmlAttributeDisplay('bgcolor',$text_scroll_component_background_color);
        echo 'reload="'.$text_scroll_component_reload.'"';
        ?> />
        <?php
        }
        ?>
        
        <?php
        if($time_component_id){
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('compid',$time_component_id);
        echo functions::xmlAttributeDisplay('name',$time_component_name);
        echo functions::xmlAttributeDisplay('type','time');
        echo functions::xmlAttributeDisplay('posX',$time_component_x);
        echo functions::xmlAttributeDisplay('posY',$time_component_y);
        echo functions::xmlAttributeDisplay('width',$time_component_width);
        echo functions::xmlAttributeDisplay('height',$time_component_height);
        echo functions::xmlAttributeDisplay('fontname',$time_component_font);
        echo functions::xmlAttributeDisplay('fontsize',$time_component_font_size);
        echo functions::xmlAttributeDisplay('fontcolor',$time_component_font_color);
        echo functions::xmlAttributeDisplay('bgcolor',$time_component_background_color);
        echo 'reload="'.$time_component_reload.'"';
        ?> />
        <?php
        }
        ?>
    </items>
</data>