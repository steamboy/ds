<?php
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<data>
    <items id="<?php echo $layout_id;?>">
        <?php
        if($dstemplate_component_order)
        {
            foreach($dstemplate_component_order as $dstemplate_component_orders)
            {
                if($dstemplate_component_orders->dstemplate_component_type == 'video')
                {  
                    foreach($dstemplate_video as $dstemplate_videos)
                    {
                        if($dstemplate_videos->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                            $dstemplate_videos->id == $dstemplate_component_orders->dstemplate_component_id)
                        {
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$dstemplate_videos->playlist_id);
        echo functions::xmlAttributeDisplay('compid',$dstemplate_videos->id);
        echo functions::xmlAttributeDisplay('name',$dstemplate_videos->name);
        echo functions::xmlAttributeDisplay('type','video');
        echo functions::xmlAttributeDisplay('posX',$dstemplate_videos->posx);
        echo functions::xmlAttributeDisplay('posY',$dstemplate_videos->posy);
        echo functions::xmlAttributeDisplay('width',$dstemplate_videos->width);
        echo functions::xmlAttributeDisplay('height',$dstemplate_videos->height);
        echo 'reload="'.$dstemplate_videos->reload.'"';
        ?> />
        <?php
                        }
                    }
                }
                
                if($dstemplate_component_orders->dstemplate_component_type == 'image')
                {  
                    foreach($dstemplate_image as $dstemplate_images)
                    {
                        if($dstemplate_images->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                            $dstemplate_images->id == $dstemplate_component_orders->dstemplate_component_id)
                        {
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$dstemplate_images->playlist_id);
        echo functions::xmlAttributeDisplay('compid',$dstemplate_images->id);
        echo functions::xmlAttributeDisplay('name',$dstemplate_images->name);
        echo functions::xmlAttributeDisplay('type','image');
        echo functions::xmlAttributeDisplay('posX',$dstemplate_images->posx);
        echo functions::xmlAttributeDisplay('posY',$dstemplate_images->posy);
        echo functions::xmlAttributeDisplay('width',$dstemplate_images->width);
        echo functions::xmlAttributeDisplay('height',$dstemplate_images->height);
        echo functions::xmlAttributeDisplay('delay',$dstemplate_images->delay);
        echo 'reload="'.$dstemplate_images->reload.'"';
        ?> />
        <?php
                        }
                    }
                }
                
                if($dstemplate_component_orders->dstemplate_component_type == 'text_crawl')
                {  
                    foreach($dstemplate_text as $dstemplate_texts)
                    {
                        if($dstemplate_texts->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                            $dstemplate_texts->id == $dstemplate_component_orders->dstemplate_component_id)
                        {
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$dstemplate_texts->playlist_id);
        echo functions::xmlAttributeDisplay('compid',$dstemplate_texts->id);
        echo functions::xmlAttributeDisplay('name',$dstemplate_texts->name);
        echo functions::xmlAttributeDisplay('type','text');
        echo functions::xmlAttributeDisplay('posX',$dstemplate_texts->posx);
        echo functions::xmlAttributeDisplay('posY',$dstemplate_texts->posy);
        echo functions::xmlAttributeDisplay('width',$dstemplate_texts->width);
        echo functions::xmlAttributeDisplay('height',$dstemplate_texts->height);
        echo functions::xmlAttributeDisplay('orientation',$dstemplate_texts->orientation);
        echo functions::xmlAttributeDisplay('speed',$dstemplate_texts->scroll_speed);
        echo functions::xmlAttributeDisplay('bgcolor',$dstemplate_texts->background_color);
        echo 'reload="'.$dstemplate_texts->reload.'"';
        ?> />
        <?php
                        }
                    }
                }
                
                if($dstemplate_component_orders->dstemplate_component_type == 'text_scroll')
                {  
                    foreach($dstemplate_text_scroll as $dstemplate_text_scrolls)
                    {
                        if($dstemplate_text_scrolls->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                            $dstemplate_text_scrolls->id == $dstemplate_component_orders->dstemplate_component_id)
                        {
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('id',$dstemplate_text_scrolls->playlist_id);
        echo functions::xmlAttributeDisplay('compid',$dstemplate_text_scrolls->id);
        echo functions::xmlAttributeDisplay('name',$dstemplate_text_scrolls->name);
        echo functions::xmlAttributeDisplay('type','text');
        echo functions::xmlAttributeDisplay('posX',$dstemplate_text_scrolls->posx);
        echo functions::xmlAttributeDisplay('posY',$dstemplate_text_scrolls->posy);
        echo functions::xmlAttributeDisplay('width',$dstemplate_text_scrolls->width);
        echo functions::xmlAttributeDisplay('height',$dstemplate_text_scrolls->height);
        echo functions::xmlAttributeDisplay('orientation',$dstemplate_text_scrolls->orientation);
        echo functions::xmlAttributeDisplay('speed',$dstemplate_text_scrolls->scroll_speed);
        echo functions::xmlAttributeDisplay('bgcolor',$dstemplate_text_scrolls->background_color);
        echo 'reload="'.$dstemplate_text_scrolls->reload.'"';
        ?> />
        <?php
                        }
                    }
                }
                
                if($dstemplate_component_orders->dstemplate_component_type == 'time')
                {  
                    foreach($dstemplate_time as $dstemplate_times)
                    {
                        if($dstemplate_times->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                            $dstemplate_times->id == $dstemplate_component_orders->dstemplate_component_id)
                        {
        ?>
        <item <?php
        echo functions::xmlAttributeDisplay('compid',$dstemplate_times->id);
        echo functions::xmlAttributeDisplay('name',$dstemplate_times->name);
        echo functions::xmlAttributeDisplay('type','time');
        echo functions::xmlAttributeDisplay('posX',$dstemplate_times->posx);
        echo functions::xmlAttributeDisplay('posY',$dstemplate_times->posy);
        echo functions::xmlAttributeDisplay('width',$dstemplate_times->width);
        echo functions::xmlAttributeDisplay('height',$dstemplate_times->height);
        echo functions::xmlAttributeDisplay('fontname',$dstemplate_times->font);
        echo functions::xmlAttributeDisplay('fontsize',$dstemplate_times->font_size);
        echo functions::xmlAttributeDisplay('fontcolor',$dstemplate_times->font_color);
        echo functions::xmlAttributeDisplay('fontstyle',$dstemplate_times->font_style);
        echo functions::xmlAttributeDisplay('bgcolor',$dstemplate_times->background_color);
        echo 'reload="'.$dstemplate_times->reload.'"';
        ?> />
        <?php
                        }
                    }
                }
            }
        }
        ?>
    </items>
</data>