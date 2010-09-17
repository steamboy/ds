<?php
/*function selectedValueDropdown($selected,$value){
    if ($selected == $value) {
        $selected = 'selected';
    }
    return $selected;
}*/
?>

<input type="hidden" id="component_type" value="<?php echo $component_type;?>">

    <?php if($component_type == 'text'){ //Text Component dialog boxes ?>
        <div id="dialog-form-text" class="dialog-window" title="Text Form">
            <form action="" id="form-text">
            <ul>
                <li>
                    <label>Name</label><br />
                    <input type="text" id="text-name" name="text-name" class="text-input-size" style="font-size: 22px;">
                </li>
                <li>
                    <label>Content</label>
                    <textarea id="text-content" class="text-area-size" cols="" rows=""></textarea>
                </li>
            </ul>
            </form>
        </div>
        
        <div id="dialog-file-browser" class="dialog-window" title="File List">
            <input type="hidden" id="dialog-file-browser-pl_id" name="dialog-file-browser-pl_id">
            <ul class="file-list">
                <?php
                if($file_list){
                    $i = 0;
                    foreach ($file_list as $file_lists){
                    ?>
                    <li><a class="select-file" id="<?php echo $file_lists;?>"><?php echo $file_lists;?></a></li>
                    <?php
                        $i++;
                    }
                }
                ?>
            </ul>
        </div>
        
        <div id="dialog-form-text-edit" class="dialog-window" title="Text Form">
            <form action="" id="form-text">
            <input type="hidden" id="pl_id" name="pl_id">
            <ul>
                <li>
                    <label>Name</label><br />
                    <input type="text" id="text-name-edit" name="text-name" class="text-input-size" style="font-size: 22px;">
                </li>
                <li>
                    <label>Content</label>
                    <textarea id="text-content-edit" class="text-area-size" cols="" rows=""></textarea>
                </li>
            </ul>
            </form>
        </div>
    <?php } ?>
        
        <div class="title">		
			<h2>Playlist Management</h2>
		</div>

        <?php
        if($form_type == 'update')
        {
            $form_action = '#';
        }
        elseif($form_type == 'create')
        {
            $form_action = url::base().'index.php/playlist/component/'.$component_type.'/create';
        }
        ?>
        
		<div class="box">
			<h3><?php echo ucfirst($form_type);?> <?php echo ucfirst($component_type);?> Playlist</h3>
			<form method="post" action="<?php echo $form_action;?>" class="cmxform_admin" id="form">
			<ul>
				<li>
					<label>Playlist Name</label><br />
					<input name="playlist_name" class="required input-playlist-name" value="<?php echo $playlist_name; ?>" type="text">
				</li>
			</ul>

			<p>
				<div id="main">
					<div>
						<div id="playlist_section">
							<div class="top_nav" <?php echo $style_width;?>>
							</div>
							<div class="list" <?php echo $style_width;?>>

								<div class="list-overflow">

                                    <div class="title_holder" <?php if($component_type == 'text'){ ?> style="width:750px;" <?php } ?>>
                                        <div class="pl_item_cb_holder">&nbsp;</div>
                                        <div class="pl_item_name_holder"><b>NAME</b></div>
                                    <?php if($component_type == 'text'){ ?>
                                        <div class="pl_item_text_holder"><b>ADD IMAGE</b></div>
                                        <div class="pl_item_text_img_align_holder"><b>IMAGE ALIGNMENT</b></div>
                                    <?php } else{ ?>
                                        <div class="pl_item_filename_holder"><b>FILE NAME</b></div>
                                    <?php } ?>
                                    <?php if($component_type == 'image'){ ?>
                                        <div class="pl_item_exposure_holder"><b>EXPOSURE</b></div>
                                    <?php } ?>
                                    </div>

                                    <ul id="sortable" class="connectedSortable">

                                        <?php 
                                        if($playlist_content){
                                            foreach ($playlist_content as $playlist_contents){
                                        ?>
                                            <?php if($component_type != 'text'){ ?>
                                            <li id="sortable_li-<?php echo $playlist_contents->id;?>" class="sortable_li_not_text">
                                                <div class="pl_item_holder">
                                                    <div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="<?php echo $playlist_contents->id;?>:<?php echo $playlist_contents->filename;?>"></div>
                                                    <div class="pl_item_name_holder" style="top:3px;"><input type="text" name="pl_item_name[]" value="<?php echo $playlist_contents->name; ?>" ></div>
                                                    <div class="pl_item_filename_holder" title="<?php echo functions::playlistFilenameCheck($playlist_contents->filename);?>"><?php echo functions::ShortenText(functions::playlistFilenameCheck($playlist_contents->filename)); ?></div>
                                                    <?php if($component_type == 'video'){ ?>
                                                    <div class="pl_item_fullscreen_holder"><input type="checkbox" class="pl_item_cb_class cb_fullscreen" value="<?php echo $playlist_contents->id;?>" <?php if($playlist_contents->display == 'fullscreen'){ echo 'checked'; } ?>> <div>Fullscreen</div><input type="hidden" name="pl_item_fullscreen[]" id="hidden_fullscreen<?php echo $playlist_contents->id;?>" value="<?php if($playlist_contents->display == 'fullscreen'){ echo 'fullscreen'; } else { echo 'normal'; } ?>"></div>
                                                    <?php } ?>
                                                    <?php 
                                                    if($component_type == 'image'){
                                                        $ext = pathinfo($playlist_contents->filename, PATHINFO_EXTENSION);
                                                        if($ext == 'swf'){
                                                            $delay_hidden = 'style="visibility:hidden"';
                                                        }
                                                        else {
                                                            $delay_hidden = '';
                                                        }
                                                    ?>
                                                    <div class="pl_item_fullscreen_holder"><input type="checkbox" class="pl_item_cb_class cb_boxed" value="<?php echo $playlist_contents->id;?>" <?php if($playlist_contents->boxed == 'false'){ echo 'checked'; } ?>> <div>Unboxed</div><input type="hidden" name="pl_item_boxed[]" id="hidden_boxed<?php echo $playlist_contents->id;?>" value="<?php if($playlist_contents->boxed == 'false'){ echo 'false'; } else { echo 'true'; } ?>"></div>
                                                    <div class="pl_item_delay_holder" <?php echo $delay_hidden;?>><input type="text" name="pl_item_delay[]" class="class_item_delay delay_input" value="<?php echo $playlist_contents->delay;?>"> Delay (sec)</div>
                                                    <?php } ?>

                                                    <div class="pl_item_remove_holder" ><a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a></div>
                                                    <input type="hidden" name="pl_item_filename[]" value="<?php echo $playlist_contents->filename;?>">
                                                </div>
                                            </li>
                                            <?php } else { ?>
                                            <li id="sortable_li-<?php echo $playlist_contents->id;?>" class="sortable_li_text">
                                                <div class="pl_item_holder">
                                                    <div class="pl_item_cb_holder">
                                                        <input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="<?php echo $playlist_contents->id;?>:<?php echo $playlist_contents->name;?>">
                                                    </div>
                                                    <div class="pl_item_name_holder top3px">
                                                        <input type="text" name="pl_item_name[]" class="class_pl_item_name" id="pl_item_name<?php echo $playlist_contents->id;?>" style="border:none;width:220px;" value="<?php echo $playlist_contents->name;?>" readOnly> <a class="text-edit" id="<?php echo $playlist_contents->id;?>"><img src="<?php echo url::base();?>media/images/edit-icon.png" border="0"></a>
                                                    </div>
                                                    <div class="pl_item_text_content_holder">
                                                        <textarea name="pl_item_text_content[]" id="pl_item_text_content<?php echo $playlist_contents->id;?>" class="pl_item_text_content mceNoEditor"><?php echo $playlist_contents->content;?></textarea>
                                                    </div>
                                                    <div class="text-add-image-holder" id="text-add-image-holder<?php echo $playlist_contents->id;?>">
                                                        <a class="text-add-image" id="<?php echo $playlist_contents->id;?>">
                                                        <?php
                                                        if($playlist_contents->image){
                                                        ?>
                                                            <input type="hidden" name="pl_item_image[]" value="<?php echo $playlist_contents->image;?>">
                                                        <?php
                                                            echo $playlist_contents->image;
                                                        ?>
                                                            <a class="remove_pl_item_image" id="<?php echo $playlist_contents->id;?>"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a>
                                                        <?php
                                                        }
                                                        else{
                                                        ?>
                                                             <input type="hidden" name="pl_item_image[]" value="">
                                                            <img src="<?php echo url::base();?>media/images/add-icon.png" border="0">
                                                        <?php
                                                        }
                                                        ?>
                                                        </a>
                                                    </div>
                                                    <div class="pl_item_text_img_align_holder">
                                                        <select name="pl_item_text_img_align[]" class="class_pl_item_text_img_align">
                                                            <option value="left" <?php echo functions::selectedValueDropdown($playlist_contents->image_alignment,'left');?>>Left</option>
                                                            <option value="right" <?php echo functions::selectedValueDropdown($playlist_contents->image_alignment,'right');?>>Right</option></select>
                                                        </select>
                                                    </div>
                                                    <div class="pl_item_remove_holder">
                                                        <a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="pl_item_filename[]" value="<?php echo $playlist_contents->id;?>">
                                            </li>
                                            <?php } ?>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
								</div>
							</div>
							<div style="height:0px;">&nbsp;</div>
							<div class="bottom_nav" <?php echo $style_width;?>>
								<div class="bottom_nav_holder">
									<div class="remove_item_holder"><input type="button" id="remove_item" class="button_one" value="REMOVE ITEM(S)"></div>
                                    <div class="clear_playlist_holder"><input type="button" id="clear_playlist" class="button_one" value="CLEAR PLAYLIST"></div>
                                    <div class="check_all_holder"><input type="button" id="playlist_check_all" class="button_one" value="CHECK ALL"></div>
                                    <div class="check_none_holder"><input type="button" id="playlist_check_none" class="button_one" value="UNCHECK ALL"></div>
									<?php if($style_width){ ?>
                                    <div class="add_item_holder"><input type="button" id="add_item_text" class="button_one" value="ADD ITEM"></div>
                                    <?php } ?>
								</div>
							</div>
							<?php echo $filebrowser; ?>
						</div>
					</div>
				</div>
			</p>
			<input type="hidden" id="playlist_cb_value_holder">
			<input type="hidden" id="files_cb_value_holder">
			<br />
			<input type="submit" value="<?php echo strtoupper($form_type);?>">
			</form>
			<br />
		</div>