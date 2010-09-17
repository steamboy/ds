		<div class="title">		
			<h2>DS Template <?php echo ucfirst($form_type);?></h2>
		</div>

		<div class="box">
			<h3>Select Components</h3>
            <div id="component-type-list">
                <ul>
                    <li><a class="component-select" id="video">Video</a></li>
                    <li><a class="component-select" id="image">Image</a></li>
                    <li><a class="component-select" id="text-crawl">Text Crawl</a></li>
                    <li><a class="component-select" id="text-scroll">Text Scroll</a></li>
                    <li><a class="component-select" id="time">Time</a></li>
                </ul>
            </div>
            
            <!--Component to be cloned-->
            <div id="component-video-holder" class="component-form-holder">
                <li id="component-list-item">
                    <input type="hidden" name="component_counter_video[]" class="class-component-counter">
                    <input type="hidden" name="video_component_id[]">
                    <label>Video Settings</label>
                    - <a class="dstemplate-remove-component">Remove</a>
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="video_component_name[]" id="video_component_name">
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="video_component_x[]" id="video_component_x" class="delay_input"> 
                                    Y: <input type="text" name="video_component_y[]" id="video_component_y" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="video_component_width[]" id="video_component_width" class="delay_input"> 
                                    Height: <input type="text" name="video_component_height[]" id="video_component_height" class="delay_input">
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </div>
            
            <div id="component-image-holder" class="component-form-holder">
                <li id="component-list-item">
                    <input type="hidden" name="component_counter_image[]" class="class-component-counter">
                    <input type="hidden" name="image_component_id[]">
                    <label>Image Settings</label>
                    - <a class="dstemplate-remove-component">Remove</a>
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-delay">Delay</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="image_component_name[]" id="image_component_name">
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="image_component_x[]" id="image_component_x" class="delay_input"> 
                                    Y: <input type="text" name="image_component_y[]" id="image_component_y" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="image_component_width[]" id="image_component_width" class="delay_input"> 
                                    Height: <input type="text" name="image_component_height[]" id="image_component_height" class="delay_input">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    Seconds: <input type="text" name="image_component_delay[]" id="image_component_delay delay_input">
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </div>
            
            <div id="component-text-crawl-holder" class="component-form-holder">
                <li id="component-list-item">
                    <input type="hidden" name="component_counter_text[]" class="class-component-counter">
                    <input type="hidden" name="text_component_id[]">
                    <label>Text Crawl Settings</label>
                    - <a class="dstemplate-remove-component">Remove</a>
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-scroll">Scroll Speed</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="text_component_name[]" id="text_component_name">
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="text_component_x[]" id="text_component_x" class="delay_input">
                                    Y: <input type="text" name="text_component_y[]" id="text_component_y" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="text_component_width[]" id="text_component_width" class="delay_input">
                                    Height: <input type="text" name="text_component_height[]" id="text_component_height" class="delay_input">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" />
                                </td>
                                <td class="layout_settings_input" align="center">
									<select name="text_component_scroll_speed[]" id="text_component_scroll_speed" >
										<?php echo functions::dropDownValueScrollSpeed();?>
									</select>
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </div>
            
            <div id="component-text-scroll-holder" class="component-form-holder">
                <li id="component-list-item">
                    <input type="hidden" name="component_counter_text_scroll[]" class="class-component-counter">
                    <input type="hidden" name="text_scroll_component_id[]">
                    <label>Text Scroll Settings</label>
                    - <a class="dstemplate-remove-component">Remove</a>
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-scroll">Scroll Speed</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="text_scroll_component_name[]" id="text_scroll_component_name">
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="text_scroll_component_x[]" id="text_scroll_component_x" class="delay_input">
                                    Y: <input type="text" name="text_scroll_component_y[]" id="text_scroll_component_y" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="text_scroll_component_width[]" id="text_scroll_component_width" class="delay_input">
                                    Height: <input type="text" name="text_scroll_component_height[]" id="text_scroll_component_height" class="delay_input">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_scroll_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" />
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <select name="text_scroll_component_scroll_speed[]" id="text_scroll_component_scroll_speed" >
										<?php echo functions::dropDownValueScrollSpeed();?>
									</select>
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </div>
            
            <div id="component-time-holder" class="component-form-holder">
                <li id="component-list-item">
                    <input type="hidden" name="component_counter_time[]" class="class-component-counter">
                    <input type="hidden" name="time_component_id[]">
                    <label>Time Settings</label>
                    - <a class="dstemplate-remove-component">Remove</a>
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-font">Font</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="time_component_name[]" id="time_component_name" class="">
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="time" name="time_component_x[]" id="time_component_x" class="delay_input">
                                    Y: <input type="time" name="time_component_y[]" id="time_component_y" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="time" name="time_component_width[]" id="time_component_width" class="delay_input">
                                    Height: <input type="time" name="time_component_height[]" id="time_component_height" class="delay_input">
                                </td>
                                <td class="layout_settings_input">
                                    <div style="position: relative">Family: <select name="time_component_font[]" id="time_component_font" class="">
                                        <option value=""></option>
                                        <option value="Arial">Arial</option>
                                        <option value="Adihaus">Adihaus</option>
                                        <option value="Century Gothic">Century Gothic</option>
                                        <option value="Impact">Impact</option>
                                        <option value="Tahoma">Tahoma</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Verdana">Verdana</option>
                                        </select>
                                        Size: <input name="time_component_font_size[]" class="delay_input" type="text" style="width:20px;" />
                                        Bold:<input type="checkbox" value="b" class="font-style-b" style="width:20px;" />
                                        <input type="hidden" name="time_component_font_style[]" >
                                        <div class="jPickerPosition"><input name="time_component_font_color[]" class="Multiple" type="hidden" style="width:60px;" />
                                        </div>
                                    </div>
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="time_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" />
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </div>
            <!--end Component to be cloned-->
            
            <form method="post" action="<?php echo url::base();?>index.php/dstemplate/form/<?php echo $form_type;?>/<?php echo $template_id; ?>" class="cmxform_admin" id="form_template">
            
            <input type="hidden" name="template_id" value="<?php echo $template_id;?>">
            
            <ul>
                <li>
                    <label>Template Name</label><br />
                    <input name="template_name" id="template_name" class="required input-playlist-name" type="text" style="width:80%;" value="<?php echo $template_name;?>">
                </li>
            </ul>
            
            <ul id="component-list">
                <?php
                
                $db=new Database;
                
                if($dstemplate_component_order)
                {
                    foreach ($dstemplate_component_order as $dstemplate_component_orders)
                    {
                        
                        //echo $dstemplate_component_orders->sort_id;
                        
                        if($dstemplate_component_orders->dstemplate_component_type == 'video')
                        {
                            $component_video = $db->query("SELECT * FROM dstemplate_video WHERE 
                                dstemplate_id = ".$dstemplate_component_orders->dstemplate_id." AND
                                id            = ".$dstemplate_component_orders->dstemplate_component_id."
                                ");
                                
                            //echo Kohana::debug($component_video);
                ?>
                            <?php
                            if($component_video)
                            {
                                foreach ($component_video as $component_videos){
                            ?>
                            <li id="component-list-item-<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="component_counter_video[]" class="class-component-counter" value="<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="video_component_id[]" value="<?php echo $component_videos->id;?>">
                                <label>Video Settings</label>
                                - <a class="dstemplate-remove-component">Remove</a>
                                <div class="box">
                                    <table border="1" class="layout-form">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="layout-name">Name</th>
                                            <th scope="col" class="layout-position">Position</th>
                                            <th scope="col" class="layout-size">Size</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="video_component_name[]" id="video_component_name" value="<?php echo $component_videos->name;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                X: <input type="text" name="video_component_x[]" id="video_component_x" class="delay_input" value="<?php echo $component_videos->posx;?>"> 
                                                Y: <input type="text" name="video_component_y[]" id="video_component_y" class="delay_input" value="<?php echo $component_videos->posy;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                Width: <input type="text" name="video_component_width[]" id="video_component_width" class="delay_input" value="<?php echo $component_videos->width;?>"> 
                                                Height: <input type="text" name="video_component_height[]" id="video_component_height" class="delay_input" value="<?php echo $component_videos->height;?>">
                                            	
											</td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    <br />
                                </div>
                            </li>
                            <?php
                                }
                            }
                            ?>
                <?php
                        }
                        
                        //Image
                        if($dstemplate_component_orders->dstemplate_component_type == 'image')
                        {
                            $component_image = $db->query("SELECT * FROM dstemplate_image WHERE 
                                dstemplate_id = ".$dstemplate_component_orders->dstemplate_id." AND
                                id            = ".$dstemplate_component_orders->dstemplate_component_id."
                                ");
                ?>
                            <?php
                            if($component_image)
                            {
                                foreach ($component_image as $component_images){
                            ?>
                            <li id="component-list-item-<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="component_counter_image[]" class="class-component-counter" value="<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="image_component_id[]" value="<?php echo $component_images->id;?>">
                                <label>Image Settings</label>
                                - <a class="dstemplate-remove-component">Remove</a>
                                <div class="box">
                                    <table border="1" class="layout-form">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="layout-name">Name</th>
                                            <th scope="col" class="layout-position">Position</th>
                                            <th scope="col" class="layout-size">Size</th>
                                            <th scope="col" class="layout-delay">Delay</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="image_component_name[]" id="image_component_name" value="<?php echo $component_images->name;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                X: <input type="text" name="image_component_x[]" id="image_component_x" class="delay_input" value="<?php echo $component_images->posx;?>"> 
                                                Y: <input type="text" name="image_component_y[]" id="image_component_y" class="delay_input" value="<?php echo $component_images->posy;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                Width: <input type="text" name="image_component_width[]" id="image_component_width" class="delay_input" value="<?php echo $component_images->width;?>"> 
                                                Height: <input type="text" name="image_component_height[]" id="image_component_height" class="delay_input" value="<?php echo $component_images->height;?>">
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                Seconds: <input type="text" name="image_component_delay[]" id="image_component_delay delay_input" value="<?php echo $component_images->delay;?>">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    <br />
                                </div>
                            </li>
                            <?php
                                }
                            }
                            ?>
                <?php
                        }
                        
                        //Text Crawl
                        if($dstemplate_component_orders->dstemplate_component_type == 'text_crawl')
                        {
                            $component_text = $db->query("SELECT * FROM dstemplate_text WHERE 
                                dstemplate_id = ".$dstemplate_component_orders->dstemplate_id." AND
                                id            = ".$dstemplate_component_orders->dstemplate_component_id."
                                ");
                ?>
                            <?php
                            if($component_text)
                            {
                                foreach ($component_text as $component_texts){
                            ?>
                            <li id="component-list-item-<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="component_counter_text[]" class="class-component-counter" value="<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="text_component_id[]" value="<?php echo $component_texts->id;?>">
                                <label>Text Crawl Settings</label>
                                - <a class="dstemplate-remove-component">Remove</a>
                                <div class="box">
                                    <table border="1" class="layout-form">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="layout-name">Name</th>
                                            <th scope="col" class="layout-position">Position</th>
                                            <th scope="col" class="layout-size">Size</th>
                                            <th scope="col" class="layout-bgcolor">Background Color</th>
                                            <th scope="col" class="layout-scroll">Scroll Speed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="text_component_name[]" id="text_component_name" value="<?php echo $component_texts->name;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                X: <input type="text" name="text_component_x[]" id="text_component_x" class="delay_input" value="<?php echo $component_texts->posx;?>">
                                                Y: <input type="text" name="text_component_y[]" id="text_component_y" class="delay_input" value="<?php echo $component_texts->posy;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                Width: <input type="text" name="text_component_width[]" id="text_component_width" class="delay_input" value="<?php echo $component_texts->width;?>">
                                                Height: <input type="text" name="text_component_height[]" id="text_component_height" class="delay_input" value="<?php echo $component_texts->height;?>">
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                <input name="text_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($component_texts->background_color);?>" />
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                <select name="text_component_scroll_speed[]" id="text_component_scroll_speed" >
													<?php echo functions::dropDownValueScrollSpeed($component_texts->scroll_speed);?>
												</select>
											</td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    <br />
                                </div>
                            </li>
                            <?php
                                }
                            }
                            ?>
                <?php
                        }
                        
                        //Text Scroll
                        if($dstemplate_component_orders->dstemplate_component_type == 'text_scroll')
                        {
                            $component_text_scroll = $db->query("SELECT * FROM dstemplate_text WHERE 
                                dstemplate_id = ".$dstemplate_component_orders->dstemplate_id." AND
                                id            = ".$dstemplate_component_orders->dstemplate_component_id."
                                ");
                ?>
                            <?php
                            if($component_text_scroll)
                            {
                                foreach ($component_text_scroll as $component_text_scrolls){
                            ?>
                            <li id="component-list-item-<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="component_counter_text_scroll[]" class="class-component-counter" value="<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="text_scroll_component_id[]" value="<?php echo $component_text_scrolls->id;?>">
                                <label>Text Scroll Settings</label>
                                - <a class="dstemplate-remove-component">Remove</a>
                                <div class="box">
                                    <table border="1" class="layout-form">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="layout-name">Name</th>
                                            <th scope="col" class="layout-position">Position</th>
                                            <th scope="col" class="layout-size">Size</th>
                                            <th scope="col" class="layout-bgcolor">Background Color</th>
                                            <th scope="col" class="layout-scroll">Scroll Speed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="text_scroll_component_name[]" id="text_scroll_component_name" value="<?php echo $component_text_scrolls->name;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                X: <input type="text" name="text_scroll_component_x[]" id="text_scroll_component_x" class="delay_input" value="<?php echo $component_text_scrolls->posx;?>">
                                                Y: <input type="text" name="text_scroll_component_y[]" id="text_scroll_component_y" class="delay_input" value="<?php echo $component_text_scrolls->posy;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                Width: <input type="text" name="text_scroll_component_width[]" id="text_scroll_component_width" class="delay_input" value="<?php echo $component_text_scrolls->width;?>">
                                                Height: <input type="text" name="text_scroll_component_height[]" id="text_scroll_component_height" class="delay_input" value="<?php echo $component_text_scrolls->height;?>">
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                <input name="text_scroll_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($component_text_scrolls->background_color);?>" />
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                <select name="text_scroll_component_scroll_speed[]" id="text_scroll_component_scroll_speed" >
													<?php echo functions::dropDownValueScrollSpeed($component_text_scrolls->scroll_speed);?>
												</select>
											</td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    <br />
                                </div>
                            </li>
                            <?php
                                }
                            }
                            ?>
                <?php
                        }
                        
                        //Time
                        if($dstemplate_component_orders->dstemplate_component_type == 'time')
                        {
                            $component_time = $db->query("SELECT * FROM dstemplate_time WHERE 
                                dstemplate_id = ".$dstemplate_component_orders->dstemplate_id." AND
                                id            = ".$dstemplate_component_orders->dstemplate_component_id."
                                ");
                ?>
                            <?php
                            if($component_time)
                            {
                                foreach ($component_time as $component_times){
                            ?>
                            <li id="component-list-item-<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="component_counter_time[]" class="class-component-counter" value="<?php echo $dstemplate_component_orders->sort_id;?>">
                                <input type="hidden" name="time_component_id[]" value="<?php echo $component_times->id;?>">
                                <label>Time Settings</label>
                                - <a class="dstemplate-remove-component">Remove</a>
                                <div class="box">
                                    <table border="1" class="layout-form">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="layout-name">Name</th>
                                            <th scope="col" class="layout-position">Position</th>
                                            <th scope="col" class="layout-size">Size</th>
                                            <th scope="col" class="layout-font">Font</th>
                                            <th scope="col" class="layout-bgcolor">Background Color</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" name="time_component_name[]" id="time_component_name" class="" value="<?php echo $component_times->name;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                X: <input type="time" name="time_component_x[]" id="time_component_x" class="delay_input" value="<?php echo $component_times->posx;?>">
                                                Y: <input type="time" name="time_component_y[]" id="time_component_y" class="delay_input" value="<?php echo $component_times->posy;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                Width: <input type="time" name="time_component_width[]" id="time_component_width" class="delay_input" value="<?php echo $component_times->width;?>">
                                                Height: <input type="time" name="time_component_height[]" id="time_component_height" class="delay_input" value="<?php echo $component_times->height;?>">
                                            </td>
                                            <td class="layout_settings_input">
                                                <div style="position: relative">Family: <select name="time_component_font[]" id="time_component_font" class="">
                                                    <option value="" <?php echo functions::selectedValueDropdown($component_times->font,'');?>></option>
                                                    <option value="Arial" <?php echo functions::selectedValueDropdown($component_times->font,'Arial');?>>Arial</option>
                                                    <option value="Adihaus" <?php echo functions::selectedValueDropdown($component_times->font,'Adihaus');?>>Adihaus</option>
                                                    <option value="Century Gothic" <?php echo functions::selectedValueDropdown($component_times->font,'Century Gothic');?>>Century Gothic</option>
                                                    <option value="Impact" <?php echo functions::selectedValueDropdown($component_times->font,'Impact');?>>Impact</option>
                                                    <option value="Tahoma" <?php echo functions::selectedValueDropdown($component_times->font,'Tahoma');?>>Tahoma</option>
                                                    <option value="Times New Roman" <?php echo functions::selectedValueDropdown($component_times->font,'Times New Roman');?>>Times New Roman</option>
                                                    <option value="Verdana" <?php echo functions::selectedValueDropdown($component_times->font,'Verdana');?>>Verdana</option>
                                                    </select>
                                                    Size: <input name="time_component_font_size[]" class="delay_input" type="text" style="width:20px;" value="<?php echo $component_times->font_size;?>">
                                                    Bold:<input type="checkbox" value="b" class="font-style-b" style="width:20px;" <?php echo functions::checkedCheckbox('b',$component_times->font_style);?> />
                                                    <input type="hidden" name="time_component_font_style[]" value="<?php echo $component_times->font_style;?>" >
                                                    <div class="jPickerPosition"><input name="time_component_font_color[]" class="Multiple" type="hidden" style="width:60px;"  value="<?php echo functions::jPickerTransparent($component_times->font_color);?>" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="layout_settings_input" align="center">
                                                <input name="time_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($component_times->background_color);?>" />
                                            </td>
                                            
                                        </tr>
                                        </tbody>
                                    </table> 
                                    <br />
                                </div>
                            </li>
                            <?php
                                }
                            }
                            ?>
                <?php
                        }
                ?>

                <?php
                    }
                }
                ?>
            </ul>
            <!--end component-list-->
            
            
            <br />
            <input type="submit" value="<?php echo strtoupper($form_type);?> TEMPLATE">
            </form>
            <br />
            
            </form>
		</div>
        &nbsp;
