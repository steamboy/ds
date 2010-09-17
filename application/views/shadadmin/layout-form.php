		<?php
		//For Select Drop down - select current value


		if($form_type == 'dstemplate')
		{
            $show = false;
			$form_type  = 'create';
		}
        else
        {
            $show = true;
        }
		?>

		<div class="title">
			<h2>Layout</h2>
		</div>

		<div class="box">
			<h3><?php echo ucfirst($form_type);?> Layout</h3>
			<form method="post" action="<?php echo url::base();?>index.php/layout/form/<?php echo $form_type;?>/<?php echo $id; ?>" class="cmxform_admin" id="form_layout">

			<!-- our error container -->
			<div class="error_container">
				<h4>There are errors in your form submission, please see below for details.</h4>
				<ol>
					<li><label for="layout_name" class="error">Please enter <b>layout name</b></label></li>
					<li><label for="video_component_name" class="error">Please enter <b>video component name</b></label></li>
					<li><label for="video_playlist_name" class="error">Please select <b>video playlist</b></label></li>
					<li><label for="video_component_x" class="error">Please enter <b>video position X</b></label></li>
					<li><label for="video_component_y" class="error">Please enter <b>video position Y</b></label></li>
					<li><label for="video_component_width" class="error">Please enter <b>video width</b></label></li>
					<li><label for="video_component_height" class="error">Please enter <b>video height</b></label></li>
					<li><label for="video_component_reload" class="error">Please select <b>video reload option</b></label></li>
					
                    <li><label for="image_component_name" class="error">Please enter <b>image component name</b></label></li>
                    <li><label for="image_playlist_name" class="error">Please select <b>image playlist</b></label></li>
                    <li><label for="image_component_x" class="error">Please enter <b>image position X</b></label></li>
                    <li><label for="image_component_y" class="error">Please enter <b>image position Y</b></label></li>
                    <li><label for="image_component_width" class="error">Please enter <b>image width</b></label></li>
                    <li><label for="image_component_height" class="error">Please enter <b>image height</b></label></li>
                    <li><label for="image_component_delay" class="error">Please enter <b>image delay in seconds</b></label></li>
                    <li><label for="image_component_reload" class="error">Please select <b>image reload option</b></label></li>
                    
					<li><label for="text_component_name" class="error">Please enter <b>text component name</b></label></li>
					<li><label for="text_playlist_name" class="error">Please select <b>text playlist</b></label></li>
					<li><label for="text_component_x" class="error">Please enter <b>text position X</b></label></li>
					<li><label for="text_component_y" class="error">Please enter <b>text position Y</b></label></li>
					<li><label for="text_component_width" class="error">Please enter <b>text width</b></label></li>
					<li><label for="text_component_height" class="error">Please enter <b>text height</b></label></li>
					<li><label for="text_component_font" class="error">Please select <b>text font family </b></label></li>
                    <li><label for="text_component_font_color" class="error">Please select <b>text font color</b></label></li>
					<li><label for="text_component_scroll_speed" class="error">Please select <b>text scroll speed</b></label></li>
					<li><label for="text_component_reload" class="error">Please select <b>text reload option</b></label></li>
					
					<li><label for="time_component_name" class="error">Please enter <b>time component name</b></label></li>
					<li><label for="time_component_x" class="error">Please enter <b>time position X</b></label></li>
					<li><label for="time_component_y" class="error">Please enter <b>time position Y</b></label></li>
					<li><label for="time_component_width" class="error">Please enter <b>time width</b></label></li>
					<li><label for="time_component_height" class="error">Please enter <b>time height</b></label></li>
					<li><label for="time_component_font" class="error">Please select <b>time font family </b></label></li>
                    <li><label for="time_component_font_color" class="error">Please select <b>time font color</b></label></li>
					<li><label for="time_component_background_color" class="error">Please select <b>time background color</b></label></li>
					<li><label for="time_component_reload" class="error">Please select <b>time reload option</b></label></li>
				</ol>
				<br />
			</div>
			<br />
			<ul>
				<li>
					<label>Layout Name</label><br />
					<input name="layout_name" id="layout_name" class="required input-playlist-name" value="<?php echo $layout_name; ?>" type="text" style="width:80%;">
				</li>
			</ul>
            
            <ul>
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
                                
                                /*echo $dstemplate_videos->dstemplate_id;
                                echo ':';
                                echo $dstemplate_videos->id;*/
            ?>
                <li>
                    <label>Video Settings</label>
                    <div class="box">
                        <!--ID / Triggers / Conters-->
                        <input type="hidden" name="component_counter_video[]" value="<?php echo $dstemplate_component_orders->sort_id; ?>" >
                        <input type="hidden" name="video_component_trg[]" value="1">
                        <input type="hidden" name="video_component_id[]" value="<?php if($show) echo $dstemplate_videos->id; ?>" >
                    
                        <!-- Position -->
                        <input type="hidden" name="video_component_x[]" class="delay_input" value="<?php echo $dstemplate_videos->posx; ?>"> 
                        <input type="hidden" name="video_component_y[]" class="delay_input" value="<?php echo $dstemplate_videos->posy; ?>">
                                    
                        <!-- Size -->
                        <input type="hidden" name="video_component_width[]" class="delay_input" value="<?php echo $dstemplate_videos->width; ?>"> 
                        <input type="hidden" name="video_component_height[]" class="delay_input" value="<?php echo $dstemplate_videos->height; ?>">
                        
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-reload">Reload</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="video_component_name[]" value="<?php echo $dstemplate_videos->name; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="video_playlist_id[]" id="video_playlist_id-<?php echo $dstemplate_videos->id;?>" value="<?php if($show) echo $dstemplate_videos->playlist_id;?>">
                                    <input type="text" name="video_playlist_name[]" id="video_playlist_name-<?php echo $dstemplate_videos->id;?>" readonly="" class="" style="width:100px;" value="<?php if($show) if($dstemplate_videos->playlist_id) echo functions::getPlaylistName($dstemplate_videos->playlist_id);?>">
                                    <input type="button" value="Select" id="<?php echo $dstemplate_videos->id;?>" class="select_video_playlist"> <?php if($show) if($dstemplate_videos->playlist_id){ ?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/video/update/<?php echo $dstemplate_videos->playlist_id;?>">EDIT</a></div><?php } ?>
                                </td>
                                <td align="center">
                                    <?php if($show) echo $dstemplate_videos->reload; ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
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
                <li>
                    <label>Image Settings</label> <br />
                    <div class="box">
                        <!--ID / Triggers / Conters-->
                        <input type="hidden" name="component_counter_image[]" value="<?php echo $dstemplate_component_orders->sort_id; ?>" >
                        <input type="hidden" name="image_component_trg[]" value="1">
                        <input type="hidden" name="image_component_id[]" value="<?php if($show) echo $dstemplate_images->id; ?>" >
                        
                        <!-- Position -->
                        <input type="hidden" name="image_component_x[]" class="delay_input" value="<?php echo $dstemplate_images->posx; ?>"> 
                        <input type="hidden" name="image_component_y[]" class="delay_input" value="<?php echo $dstemplate_images->posy; ?>">
                    
                        <!-- Size -->
                        <input type="hidden" name="image_component_width[]" class="delay_input" value="<?php echo $dstemplate_images->width; ?>"> 
                        <input type="hidden" name="image_component_height[]" class="delay_input" value="<?php echo $dstemplate_images->height; ?>">
                    
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-delay">Delay</th>
                                <th scope="col" class="layout-reload">Reload</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="image_component_name[]" class="" value="<?php echo $dstemplate_images->name;?>">
                                </td>
                                <td>
                                    <input type="hidden" name="image_playlist_id[]" id="image_playlist_id-<?php echo $dstemplate_images->id;?>" value="<?php if($show) echo $dstemplate_images->playlist_id;?>">
                                    <input type="text" name="image_playlist_name[]" id="image_playlist_name-<?php echo $dstemplate_images->id;?>" readonly="" class="" style="width:100px;" value="<?php if($show) if($dstemplate_images->playlist_id) echo functions::getPlaylistName($dstemplate_images->playlist_id);?>">
                                    <input type="button" value="Select" id="<?php echo $dstemplate_images->id;?>" class="select_image_playlist" > <?php if($show) if($dstemplate_images->playlist_id){ ?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/image/update/<?php echo $dstemplate_images->playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
                                <td class="layout_settings_input" align="center">
                                    Seconds: <input type="text" name="image_component_delay[]" class="" value="<?php echo $dstemplate_images->delay; ?>">
                                </td>
                                <td align="center">
                                    <?php if($show) echo $dstemplate_images->reload;; ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
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
                <li>
                    <label>Text Crawl Settings</label> <br />
                    <div class="box">
                        <!--ID / Triggers / Conters-->
                        <input type="hidden" name="component_counter_text[]" value="<?php echo $dstemplate_component_orders->sort_id; ?>" >
                        <input type="hidden" name="text_component_trg[]" value="1">
                        <input type="hidden" name="text_component_id[]" value="<?php if($show) echo $dstemplate_texts->id; ?>" >
                        
                        <!-- Position -->
                        <input type="hidden" name="text_component_x[]" class="delay_input" value="<?php echo $dstemplate_texts->posx; ?>"> 
                        <input type="hidden" name="text_component_y[]" class="delay_input" value="<?php echo $dstemplate_texts->posy; ?>">
                    
                        <!-- Size -->
                        <input type="hidden" name="text_component_width[]" class="delay_input" value="<?php echo $dstemplate_texts->width; ?>"> 
                        <input type="hidden" name="text_component_height[]" class="delay_input" value="<?php echo $dstemplate_texts->height; ?>">
                    
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-scroll">Scroll Speed</th>
                                <th scope="col" class="layout-reload">Reload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="text_component_name[]" value="<?php echo $dstemplate_texts->name; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="text_playlist_id[]" id="text_playlist_id-<?php echo $dstemplate_texts->id;?>" value="<?php if($show) echo $dstemplate_texts->playlist_id;?>">
                                    <input type="text" name="text_playlist_name[]" id="text_playlist_name-<?php echo $dstemplate_texts->id;?>" readonly="" class="" style="width:100px;" value="<?php if($show) if($dstemplate_texts->playlist_id) echo functions::getPlaylistName($dstemplate_texts->playlist_id);?>">
                                    <input type="button" value="Select" id="<?php echo $dstemplate_texts->id;?>" class="select_text_playlist" > <?php if($show) if($dstemplate_texts->playlist_id){ ?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/text/update/<?php echo $dstemplate_texts->playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($dstemplate_texts->background_color);?>" />
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <select name="text_component_scroll_speed[]" id="text_component_scroll_speed" >
										<?php echo functions::dropDownValueScrollSpeed($dstemplate_texts->scroll_speed);?>
									</select>
								</td>
                                <td align="center">
                                    <?php if($show) echo $dstemplate_texts->reload;?>
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
                    }
                    
                    if($dstemplate_component_orders->dstemplate_component_type == 'text_scroll')
                    {  
                        foreach($dstemplate_text_scroll as $dstemplate_text_scrolls)
                        {
                            if($dstemplate_text_scrolls->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                                $dstemplate_text_scrolls->id == $dstemplate_component_orders->dstemplate_component_id)
                            {
            ?>
                <li>
                    <label>Text Scroll Settings</label> <br />
                    <div class="box">
                        <!--ID / Triggers / Conters-->
                        <input type="hidden" name="component_counter_text_scroll[]" value="<?php echo $dstemplate_component_orders->sort_id; ?>" >
                        <input type="hidden" name="text_scroll_component_trg[]" value="1">
                        <input type="hidden" name="text_scroll_component_id[]" value="<?php if($show) echo $dstemplate_text_scrolls->id; ?>" >
                        
                        <!-- Position -->
                        <input type="hidden" name="text_scroll_component_x[]" class="delay_input" value="<?php echo $dstemplate_text_scrolls->posx; ?>"> 
                        <input type="hidden" name="text_scroll_component_y[]" class="delay_input" value="<?php echo $dstemplate_text_scrolls->posy; ?>">
                    
                        <!-- Size -->
                        <input type="hidden" name="text_scroll_component_width[]" class="delay_input" value="<?php echo $dstemplate_text_scrolls->width; ?>"> 
                        <input type="hidden" name="text_scroll_component_height[]" class="delay_input" value="<?php echo $dstemplate_text_scrolls->height; ?>">
                    
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-scroll">Scroll Speed</th>
                                <th scope="col" class="layout-reload">Reload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="text_scroll_component_name[]" value="<?php echo $dstemplate_text_scrolls->name; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="text_scroll_playlist_id[]" id="text_scroll_playlist_id-<?php echo $dstemplate_text_scrolls->id;?>" value="<?php if($show) echo $dstemplate_text_scrolls->playlist_id;?>">
                                    <input type="text" name="text_scroll_playlist_name[]" id="text_scroll_playlist_name-<?php echo $dstemplate_text_scrolls->id;?>" readonly="" class="" style="width:100px;" value="<?php if($show) if($dstemplate_text_scrolls->playlist_id) echo functions::getPlaylistName($dstemplate_text_scrolls->playlist_id);?>">
                                    <input type="button" value="Select" id="<?php echo $dstemplate_text_scrolls->id;?>" class="select_text_scroll_playlist"> <?php if($show) if($dstemplate_text_scrolls->playlist_id){ ?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/text/update/<?php echo $dstemplate_text_scrolls->playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_scroll_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($dstemplate_text_scrolls->background_color);?>" />
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <select name="text_scroll_component_scroll_speed[]" id="text_scroll_component_scroll_speed" >
										<?php echo functions::dropDownValueScrollSpeed($dstemplate_text_scrolls->scroll_speed);?>
									</select>
								</td>
                                <td align="center">
                                    <?php if($show) echo $dstemplate_text_scrolls->reload;?>
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
                    }
                    
                    if($dstemplate_component_orders->dstemplate_component_type == 'time')
                    {  
                        foreach($dstemplate_time as $dstemplate_times)
                        {
                            if($dstemplate_times->dstemplate_id == $dstemplate_component_orders->dstemplate_id AND 
                                $dstemplate_times->id == $dstemplate_component_orders->dstemplate_component_id)
                            {
            ?>
                <li>
                    <label>Time Settings</label> <br />
                    <div class="box">
                        <!--ID / Triggers / Conters-->
                        <input type="hidden" name="component_counter_time[]" value="<?php echo $dstemplate_component_orders->sort_id; ?>" >
                        <input type="hidden" name="time_component_trg[]" value="1">
                        <input type="hidden" name="time_component_id[]" value="<?php if($show) echo $dstemplate_times->id; ?>" >
                        
                        <!-- Position -->
                        <input type="hidden" name="time_component_x[]" class="delay_input" value="<?php echo $dstemplate_times->posx; ?>"> 
                        <input type="hidden" name="time_component_y[]" class="delay_input" value="<?php echo $dstemplate_times->posy; ?>">
                    
                        <!-- Size -->
                        <input type="hidden" name="time_component_width[]" class="delay_input" value="<?php echo $dstemplate_times->width; ?>"> 
                        <input type="hidden" name="time_component_height[]" class="delay_input" value="<?php echo $dstemplate_times->height; ?>">
                    
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-font">Font</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-reload">Reload</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="time_component_name[]" class="" value="<?php echo $dstemplate_times->name; ?>">
                                </td>
                                <td class="layout_settings_input">
                                    <div style="position: relative">Family: <select name="time_component_font[]" id="time_component_font" class="">
                                        <option value="" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'');?>></option>
                                        <option value="Arial" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Arial');?>>Arial</option>
                                        <option value="Adihaus" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Adihaus');?>>Adihaus</option>
                                        <option value="Century Gothic" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Century Gothic');?>>Century Gothic</option>
                                        <option value="Impact" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Impact');?>>Impact</option>
                                        <option value="Tahoma" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Tahoma');?>>Tahoma</option>
                                        <option value="Times New Roman" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Times New Roman');?>>Times New Roman</option>
                                        <option value="Verdana" <?php echo functions::selectedValueDropdown($dstemplate_times->font,'Verdana');?>>Verdana</option>
                                        </select>
                                        Size: <input name="time_component_font_size[]" class="delay_input" type="text" style="width:20px;" value="<?php echo $dstemplate_times->font_size;?>" />
                                        Bold:<input type="checkbox" value="b" class="font-style-b" style="width:20px;" <?php echo functions::checkedCheckbox('b',$dstemplate_times->font_style);?> />
                                        <input type="hidden" name="time_component_font_style[]" value="<?php echo $dstemplate_times->font_style;?>" >
                                        <div class="jPickerPosition">
                                            <input name="time_component_font_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($dstemplate_times->font_color);?>" />  
                                        </div>
                                    </div>
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="time_component_background_color[]" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($dstemplate_times->background_color);?>" />
                                </td>
                                <td align="center">
                                    <?php if($show) echo $dstemplate_times->reload;?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            <?php
                            }
                        }
                    }
                }
            }
            ?>
            </ul>
            
			
			
			<br />
			<input type="submit" value="<?php echo strtoupper($form_type);?> LAYOUT">
			</form>
			<br />
		</div>
		&nbsp;
