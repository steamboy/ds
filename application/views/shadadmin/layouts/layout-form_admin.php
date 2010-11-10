		<?php
		//For Select Drop down - select current value
		
		
		if($form_type == 'dstemplate')
		{
			$form_type = 'create';
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
					<label>Layout Name</label> <!--<label class="note">(Input note message goes here.)</label>--><br />
					<input name="layout_name" id="layout_name" class="required input-playlist-name" value="<?php echo $layout_name; ?>" type="text" style="width:80%;">
				</li>
			</ul>
			<?php
			if($dstemplate_video_id)
			{		
			?>
			<ul>
				<li>
					<label>Video Settings</label> <!--<label class="note">(Input note message goes here.)</label>-->
					<div class="box">
						<table border="1" class="layout-form">
							<thead>
							<tr>
								<th scope="col" class="layout-name">Name</th>
								<th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
								<th scope="col" class="layout-reload">Reload</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
                                    <input type="hidden" name="video_component_trg" value="1">
                                    <input type="text" name="video_component_name" id="video_component_name" class="" value="<?php echo $video_component_name; ?>">
                                </td>
								<td>
                                    <input type="hidden" name="video_playlist_id" id="video_playlist_id" value="<?php echo $video_playlist_id; ?>">
                                    <input type="text" name="video_playlist_name" id="video_playlist_name" readonly="" class="" style="width:100px;" value="<?php echo $video_playlist_name; ?>">
                                    <input type="button" value="Select" id="select_video_playlist"> <?php if($video_playlist_id){?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/video/update/<?php echo $video_playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
								<td class="layout_settings_input">
                                    X: <input type="text" name="video_component_x" id="video_component_x" class="required delay_input" value="<?php echo $video_component_x; ?>"> 
                                    Y: <input type="text" name="video_component_y" id="video_component_y" class="required delay_input" value="<?php echo $video_component_y; ?>">
                                </td>
								<td class="layout_settings_input">
                                    Width: <input type="text" name="video_component_width" id="video_component_width" class="required delay_input" value="<?php echo $video_component_width; ?>"> 
                                    Height: <input type="text" name="video_component_height" id="video_component_height" class="required delay_input" value="<?php echo $video_component_height; ?>">
                                </td>
								<td align="center">
                                    <?php echo $video_component_reload; ?>
                                </td>
							</tr>
							</tbody>
						</table> 
						<br />
					</div>
				</li>
			</ul>
			<?php
			}
			?>
			
            <?php
            if($dstemplate_image_id)
            {        
            ?>
            <ul>
                <li>
                    <label>Image Settings</label> <br /><!--<label class="note"></label>-->
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-delay">Delay</th>
                                <th scope="col" class="layout-reload">Reload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="image_component_trg" value="1">
                                    <input type="text" name="image_component_name" id="image_component_name" class="" value="<?php echo $image_component_name; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="image_playlist_id" id="image_playlist_id" value="<?php echo $image_playlist_id; ?>">
                                    <input type="text" name="image_playlist_name" id="image_playlist_name" readonly="" class="" style="width:100px;" value="<?php echo $image_playlist_name; ?>">
                                    <input type="button" value="Select" id="select_image_playlist"> <?php if($image_playlist_id){?> <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/image/update/<?php echo $image_playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="image_component_x" id="image_component_x" class="delay_input" value="<?php echo $image_component_x; ?>"> 
                                    Y: <input type="text" name="image_component_y" id="image_component_y" class="delay_input" value="<?php echo $image_component_y; ?>">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="image_component_width" id="image_component_width" class="delay_input" value="<?php echo $image_component_width; ?>"> 
                                    Height: <input type="text" name="image_component_height" id="image_component_height" class="delay_input" value="<?php echo $image_component_height; ?>">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    Seconds: <input type="text" name="image_component_delay" id="image_component_delay delay_input" class="" value="<?php echo $image_component_delay; ?>">
                                </td>
                                <td align="center">
                                    <?php echo $image_component_reload; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </ul>
            <?php
            }
            ?>
            
			<?php
			if($dstemplate_text_id)
			{		
			?>
			<ul>
				<li>
					<label>Text Crawl Settings</label><br />
					<div class="box">
						<table border="1" class="layout-form">
							<thead>
							<tr>
								<th scope="col" class="layout-name">Name</th>
								<th scope="col" class="layout-playlist">Playlist</th>
								<th scope="col" class="layout-position">Position</th>
								<th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
								<th scope="col" class="layout-scroll">Scroll Speed</th>
								<th scope="col" class="layout-reload">Reload</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
                                    <input type="hidden" name="text_component_trg" value="1">
                                    <input type="text" name="text_component_name" id="text_component_name" class="" value="<?php echo $text_component_name; ?>">
                                </td>
								<td>
                                    <input type="hidden" name="text_playlist_id" id="text_playlist_id" value="<?php echo $text_playlist_id; ?>">
                                    <input type="text" name="text_playlist_name" id="text_playlist_name" readonly="" class="" style="width:100px;" value="<?php echo $text_playlist_name; ?>">
                                    <input type="button" value="Select" id="select_text_playlist"> <?php if($text_playlist_id){?>
                                    <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/text/update/<?php echo $text_playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
								<td class="layout_settings_input">
                                    X: <input type="text" name="text_component_x" id="text_component_x" class="delay_input" value="<?php echo $text_component_x; ?>">
                                    Y: <input type="text" name="text_component_y" id="text_component_y" class="delay_input" value="<?php echo $text_component_y; ?>">
                                </td>
								<td class="layout_settings_input">
                                    Width: <input type="text" name="text_component_width" id="text_component_width" class="delay_input" value="<?php echo $text_component_width; ?>">
                                    Height: <input type="text" name="text_component_height" id="text_component_height" class="delay_input" value="<?php echo $text_component_height; ?>">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_component_background_color" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($text_component_background_color);?>" />
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input type="text" name="text_component_scroll_speed" id="text_component_scroll_speed" class="delay_input" value="<?php echo $text_component_scroll_speed; ?>">
                                </td>
								<td align="center">
                                    <?php echo $text_component_reload;?>
                                </td>
							</tr>
							</tbody>
						</table> 
						<br />
					</div>
				</li>
			</ul>
			<?php
			}
			?>
			
            <!-- Text Scroll -->
            <?php
            if($dstemplate_text_scroll_id)
            {        
            ?>
            <ul>
                <li>
                    <label>Text Scroll Settings</label><br />
                    <div class="box">
                        <table border="1" class="layout-form">
                            <thead>
                            <tr>
                                <th scope="col" class="layout-name">Name</th>
                                <th scope="col" class="layout-playlist">Playlist</th>
                                <th scope="col" class="layout-position">Position</th>
                                <th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-bgcolor">Background Color</th>
                                <th scope="col" class="layout-scroll">Scroll Speed</th>
                                <th scope="col" class="layout-reload">Reload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="text_scroll_component_trg" value="1">
                                    <input type="text" name="text_scroll_component_name" id="text_scroll_component_name" class="" value="<?php echo $text_scroll_component_name; ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="text_scroll_playlist_id" id="text_scroll_playlist_id" value="<?php echo $text_scroll_playlist_id; ?>">
                                    <input type="text" name="text_scroll_playlist_name" id="text_scroll_playlist_name" readonly="" class="" style="width:100px;" value="<?php echo $text_scroll_playlist_name; ?>">
                                    <input type="button" value="Select" id="select_text_scroll_playlist"> <?php if($text_scroll_playlist_id){?>
                                    <div class="playlist_edit_holder"><a href="<?php echo url::base();?>index.php/playlist/component/text/update/<?php echo $text_scroll_playlist_id; ?>">EDIT</a></div><?php } ?>
                                </td>
                                <td class="layout_settings_input">
                                    X: <input type="text" name="text_scroll_component_x" id="text_scroll_component_x" class="delay_input" value="<?php echo $text_scroll_component_x; ?>">
                                    Y: <input type="text" name="text_scroll_component_y" id="text_scroll_component_y" class="delay_input" value="<?php echo $text_scroll_component_y; ?>">
                                </td>
                                <td class="layout_settings_input">
                                    Width: <input type="text" name="text_scroll_component_width" id="text_scroll_component_width" class="delay_input" value="<?php echo $text_scroll_component_width; ?>">
                                    Height: <input type="text" name="text_scroll_component_height" id="text_scroll_component_height" class="delay_input" value="<?php echo $text_scroll_component_height; ?>">
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input name="text_scroll_component_background_color" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($text_scroll_component_background_color);?>" />
                                </td>
                                <td class="layout_settings_input" align="center">
                                    <input type="text" name="text_scroll_component_scroll_speed" id="text_scroll_component_scroll_speed" class="delay_input" value="<?php echo $text_scroll_component_scroll_speed; ?>">
                                </td>
                                <td align="center">
                                    <?php echo $text_scroll_component_reload;?>
                                </td>
                            </tr>
                            </tbody>
                        </table> 
                        <br />
                    </div>
                </li>
            </ul>
            <?php
            }
            ?>
            
			<?php
			if($dstemplate_time_id)
			{		
			?>
			<ul>
				<li>
					<label>Time Settings</label> <!--<label class="note">(Input note message goes here.)</label>-->
					<div class="box">
						<table border="1" class="layout-form">
							<thead>
							<tr>
								<th scope="col" class="layout-name">Name</th>
								<th scope="col" class="layout-position">Position</th>
								<th scope="col" class="layout-size">Size</th>
                                <th scope="col" class="layout-font">Font</th>
								<th scope="col" class="layout-bgcolor">Background Color</th>
								<th scope="col" class="layout-reload">Reload</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
                                    <input type="hidden" name="time_component_trg" value="1">
                                    <input type="text" name="time_component_name" id="time_component_name" class="" value="<?php echo $time_component_name; ?>">
                                </td>
								<td class="layout_settings_input">
                                    X: <input type="time" name="time_component_x" id="time_component_x" class="delay_input" value="<?php echo $time_component_x; ?>">
                                    Y: <input type="time" name="time_component_y" id="time_component_y" class="delay_input" value="<?php echo $time_component_y; ?>">
                                </td>
								<td class="layout_settings_input">
                                    Width: <input type="time" name="time_component_width" id="time_component_width" class="delay_input" value="<?php echo $time_component_width; ?>">
                                    Height: <input type="time" name="time_component_height" id="time_component_height" class="delay_input" value="<?php echo $time_component_height; ?>">
                                </td>
								<td class="layout_settings_input">
                                    <div style="position: relative">Family: <select name="time_component_font" id="time_component_font" class="">
                                            <option value="" <?php echo functions::selectedValueDropdown($time_component_font,'');?>></option>
                                            <option value="Arial" <?php echo functions::selectedValueDropdown($time_component_font,'Arial');?>>Arial</option>
                                            <option value="Adihaus" <?php echo functions::selectedValueDropdown($time_component_font,'Adihaus');?>>Adihaus</option>
                                            <option value="Century Gothic" <?php echo functions::selectedValueDropdown($time_component_font,'Century Gothic');?>>Century Gothic</option>
                                            <option value="Impact" <?php echo functions::selectedValueDropdown($time_component_font,'Impact');?>>Impact</option>
                                            <option value="Tahoma" <?php echo functions::selectedValueDropdown($time_component_font,'Tahoma');?>>Tahoma</option>
                                            <option value="Times New Roman" <?php echo functions::selectedValueDropdown($time_component_font,'Times New Roman');?>>Times New Roman</option>
                                            <option value="Verdana" <?php echo functions::selectedValueDropdown($time_component_font,'Verdana');?>>Verdana</option>
                                            </select>
                                    Size: <input name="time_component_font_size" class="delay_input" type="text" style="width:20px;" value="<?php echo $time_component_font_size;?>" />
                                    <div class="jPickerPosition"><input name="time_component_font_color" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($time_component_font_color);?>" />
                                        </div>
                                    </div>
								</td>
                                <td class="layout_settings_input" align="center">
                                    <input name="time_component_background_color" class="Multiple" type="hidden" style="width:60px;" value="<?php echo functions::jPickerTransparent($time_component_background_color);?>" />
                                </td>
								<td align="center">
                                    <?php echo $time_component_reload;?>
                                </td>
							</tr>
							</tbody>
						</table> 
						<br />
					</div>
				</li>
			</ul>
			<?php
			}
			?>
			
			<br />
			<input type="submit" value="<?php echo strtoupper($form_type);?> LAYOUT">
			</form>
			<br />
		</div>
		&nbsp;
