							<div id="file_browser_section">
								<div class="top_nav">
									<div class="name">AVAILABLE FILES</div>
								</div>
								<div class="list">
									
									<div class="list-overflow">
										<div class="title_holder">
                                            <div class="pl_item_name_holder"><b>FILE NAME</b></div>
                                        </div>
                                        
                                        <ul id="files" class="connectedSortable">
											<?php
                                            if($file_list){
											    $i = 0;
											    foreach ($file_list as $file_lists)
											    {
											    ?>
											    <li id="<?php echo $i.'fb';?>:<?php echo $file_lists;?>" class="files_li">
												    <div class="pl_item_holder_files">
													    <div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="<?php echo $i.'fb';?>:<?php echo str_replace(' [FOLDER]', '', $file_lists);?>"></div>
													    <div class="pl_item_name_holder" title="<?php echo $file_lists?>"><?php echo $file_lists?></div>
													    <div class="pl_item_remove_holder"><!--<a class="view" id="<?php //echo $file_lists;?>">VIEW</a> | --><a class="add_to_pl" id="<?php echo $i;?>:<?php echo str_replace(' [FOLDER]', '', $file_lists);?>"><img src="<?php echo url::base();?>media/images/add-icon.png" border="0"></a></div>
												    </div>
											    </li>
											    <?php
												    $i++;
											    }
                                            }
											?>
										</ul>
									</div>
								</div>
							</div>
							<div id="file_browser_bottom_nav">
								<div class="bottom_nav_holder">
                                    <div class="add_item_holder"><input type="button" id="add_item" class="button_one" value="ADD ITEM(S)"></div>
                                    <div class="check_all_holder"><input type="button" id="file_browser_check_all" class="button_one" value="CHECK ALL"></div>
									<div class="check_none_holder"><input type="button" id="file_browser_check_none" class="button_one" value="UNCHECK ALL"></div>
								</div>
							</div>