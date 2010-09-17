<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>DS Admin | <?php echo $title;?></title>

<link type="text/css" href="/ds/media/jquery/jquery-ui-1.7.2/themes/base/ui.all.css" rel="stylesheet" />
<?php echo html::stylesheet('media/jquery/jquery-validate/css/screen.css', 'screen')?>
<?php echo html::stylesheet('media/css/style.css', 'screen')?>
<?php echo html::stylesheet('media/css/table.css', 'screen')?>
<?php echo html::stylesheet('media/css/form.css', 'screen')?>

<link type="text/css" href="/ds/media/jquery/jPicker/css/jPicker-1.0.13.css" rel="stylesheet" />

</head>
<!--<div FirebugVersion="1.3.3" style="display: none;" id="_firebugConsole"></div>-->

<body>

<!-- Dialogs -->
<?php
if($list_video_playlist)
{
?>
<div id="dialog_video_playlist" class="dialog-window" title="Video Playlist">
    <input type="hidden" name="component_id">
	<ul>
		<?php
		foreach ($list_video_playlist as $list_video_playlists)
		{
		?>
		<li>
            <div class="dg_list_holder">
                <div class="dg_list_name"><a id="<?php echo $list_video_playlists->id; ?>:<?php echo $list_video_playlists->name; ?>" class="dg_select_video_playlist"><?php echo $list_video_playlists->name; ?></a></div>
                <!--<div class="dg_list_select"><a id="<?php echo $list_video_playlists->id; ?>:<?php echo $list_video_playlists->name; ?>" class="dg_select_video_playlist">SELECT</a></div>-->
            </div>
        </li>
		<?php
		}
		?>
	</ul>
</div>
<?php
}
?>

<?php
if($list_image_playlist)
{
?>
<div id="dialog_image_playlist" class="dialog-window" title="Image Playlist">
    <input type="hidden" name="component_id">
    <ul>
        <?php
        foreach ($list_image_playlist as $list_image_playlists)
        {
        ?>
        <li>
            <div class="dg_list_holder">
                <div class="dg_list_name"><a id="<?php echo $list_image_playlists->id; ?>:<?php echo $list_image_playlists->name; ?>" class="dg_select_image_playlist"><?php echo $list_image_playlists->name; ?></a>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>
</div>
<?php
}
?>

<?php
if($list_text_playlist)
{
?>
<div id="dialog_text_playlist" class="dialog-window" title="Text Playlist">
    <input type="hidden" name="component_id">
	<ul>
		<?php
		foreach ($list_text_playlist as $list_text_playlists)
		{
		?>
		<li>
            <div class="dg_list_holder">
                <div class="dg_list_name">
                    <a id="<?php echo $list_text_playlists->id; ?>:<?php echo $list_text_playlists->name; ?>" class="dg_select_text_playlist"><?php echo $list_text_playlists->name; ?></a>
                </div>
            </div>
        </li>
		<?php
		}
		?>
	</ul>
</div>

<div id="dialog_text_scroll_playlist" class="dialog-window" title="Text Playlist">
    <input type="hidden" name="component_id">
    <ul>
        <?php
        foreach ($list_text_playlist as $list_text_playlists)
        {
        ?>
        <li>
            <div class="dg_list_holder">
                <div class="dg_list_name">
                    <a id="<?php echo $list_text_playlists->id; ?>:<?php echo $list_text_playlists->name; ?>" class="dg_select_text_scroll_playlist"><?php echo $list_text_playlists->name; ?></a>
                </div>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>
</div>
<?php
}
?>

<div id="dialog_no_files" class="dialog-window" title="No Files Selected">
    <!--<p>
        <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
        Your files have downloaded successfully into the My Downloads folder.
    </p>
    <p>
        Currently using <b>36% of your storage space</b>.
    </p>-->
    <p>
        You have not selected any file from the playlist.
    </p>
</div>

<div id="dialog-save-playlist-as" class="dialog-window" title="Save Playlist As">
    <div class="error-display" style="display:none;"><strong>Error</strong>: Playlist name is not available.</div>
    <div class="succeed" style="display:none;"><strong>Succeed</strong>: You have successfully saved your playlist!</div>
    <form action="" id="form-save-playlist-as">
    <ul>
        <li>
            <label>Playlist Name</label><br />
            <input type="text" id="save-playlist-as-name" name="save-playlist-as-name" class="text-input-size" style="font-size: 22px;">
            <input type="hidden" id="save-playlist-as-id" name="save-playlist-as-id">
        </li>
    </ul>
    </form>
</div>

<div id="header">
    <h1><a href="#"><img src="<?php echo url::base();?>media/images/logo.gif" alt="DS"></a></h1>
    <?php
    if ($this->auth->logged_in('login'))
    {
    ?>
	<div class="menu">Welcome <a href="#"><?php echo $username;?></a> | <a href="<?php echo url::base();?>index.php/users/logout">Logout</a></div>
    <?php
    }
    ?>
</div>

<div id="wrapper">

	<!--<div id="notice"><strong>Updated</strong>: Your dashboard has been updated.</div>
	<div id="succeed"><strong>Succeed</strong>: We have successfully sent your message!</div>
	<div id="error"><strong>Error</strong>: Something went wrong.</div>-->
	
	<?php
		if($message == 'msg_playlist_create')
		{
	?>
			<div class="succeed"><strong>Succeed</strong>: You have successfully created your playlist!</div>
	<?php
		}
		if($message == 'msg_playlist_update')
		{
	?>
			<div class="notice"><strong>Succeed</strong>: You have successfully updated your playlist!</div>
	<?php
		}
		if($message == 'msg_playlist_duplicate')
		{
	?>
			<div class="error-display"><strong>Error</strong>: Playlist name is not available.</div>	
	<?php
		}
        if($message == 'msg_playlist_delete')
        {
	?>	
        <div class="notice"><strong>Succeed</strong>: Playlist deleted!</div>
	<?php
        }
		if($message == 'duplicate_layout_name')
		{
	?>
			<div class="error-display"><strong>Error</strong>: Layout name is not available.</div>	
	<?php
		}
		if($message == 'createlayout')
		{
	?>
			<div class="notice"><strong>Succeed</strong>: You have successfully created your layout!</div>	
	<?php
		}
		if($message == 'updatelayout')
		{
	?>
			<div class="notice"><strong>Succeed</strong>: You have successfully updated your layout!</div>	
	<?php
		}
	    if($message == 'create_template')
        {
    ?>
            <div class="notice"><strong>Succeed</strong>: You have successfully created your template!</div>    
    <?php
        }
	?>
	
	<div class="notice" style="display:none;" id="message_playlist_deleted"><strong>Succeed</strong>: Playlist deleted!</div>
	<div class="notice" style="display:none;" id="message_layout_deleted"><strong>Succeed</strong>: Layout deleted!</div>
    <div class="succeed" style="display:none;" id="message_layout_loaded"><strong>Succeed</strong>: Layout loaded!</div>
    <div class="succeed" style="display:none;" id="message_template_deleted"><strong>Succeed</strong>: Template deleted!</div>
	<div class="succeed" style="display:none;" id="message-save-playlist-as"><strong>Succeed</strong>: Playlist successfully created!</div>
	
	<div id="sidebar">

		<?php echo $navigation;?>

		<?php echo $search;?>
		
		<?php echo $blog;?>
	
	</div>
	
	<div id="content">
	    <div id="Inline"></div>
		<?php echo $content;?>
	
	</div>
	
	<div id="footer">
		<span class="left"><!--<a href="#">Dashboard</a> | <a href="#">Clients</a> | <a href="#">Reports</a> | <a href="#">System</a>--></span>
		<span class="right">&copy; 2010 DS. All Rights Reserved.</span>
	</div>

</div>

<?php echo html::script('media/jquery/jquery-1.4.1.min.js')?>
<?php echo html::script('media/jquery/jquery-validate/jquery.validate.js')?>
<?php echo html::script('media/jquery/jquery-validate/cmxforms.js')?>

<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.core.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.draggable.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.resizable.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.dialog.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.sortable.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/external/bgiframe/jquery.bgiframe.js')?>
<?php echo html::script('media/jquery/jquery-ui-1.7.2/ui/ui.slider.js')?>


<?php echo html::script('media/jquery/jPicker/jpicker-1.0.13.js')?>
<?php echo html::script('media/jquery/jquery.quicksearch.js')?>

<?php echo html::script('media/tiny_mce/tiny_mce_src.js')?>

<script type="text/javascript">
function loadTinyMCE(){
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        theme_advanced_buttons1 : "bold,italic,underline,|,fontselect,fontsizeselect,|,forecolor,|,code",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        paste_use_dialog : false,
        theme_advanced_resizing : false,
        theme_advanced_resize_horizontal : true,
        apply_source_formatting : true,
        forced_root_block : false, //add this to remove <p> and replace <br />
        force_br_newlines : true,
        force_p_newlines : false,
        //relative_urls : true
        relative_urls : false,
        remove_script_host : false,
        editor_deselector : "mceNoEditor",
        convert_fonts_to_spans : false,
        width : "570",
        theme_advanced_fonts :
            "Arial=Arial;"+
            "Adihaus=Adihaus;"+
            "Century Gothic=Century Gothic;"+
            "Impact=Impact;"+
            "Tahoma=Tahoma;"+
            "Times New Roman=Times New Roman;"+
            "Verdana=verdana;",
        valid_elements : "font[face|size|color],b/,i/em,u,br",
        theme_advanced_font_sizes : "22, 32, 42, 52, 62, 82",
        inline_styles: false
        //document_base_url : "<?php //echo $base_url;?>"
    });

}

$('document').ready(function()
{
	function playlistContentHighlight()
	{
		$.ajax({
     		type: "POST",
        	url: "ds/index.php/playlist/get_current_content",
        	data: 'component_type=<?php echo $component_type;?>',
        	success: function(msg)
        	{
            	$('.sortable_li_not_text').css({backgroundColor: '#ffffff'})
				$('#sortable_li-' + msg).css({backgroundColor: '#FFF1AF'});
        	},
        	error: function()
       		{
        		alert("An error occured while updating. Try again in a while");
        	}
     	});
	} 
	
	function alertMessageSetTimeOut()
	{
		setTimeout(function()
	    {
	        $('.notice').fadeOut('slow');
	        $('.succeed').fadeOut('slow');
	        $('.error-display').fadeOut('slow');
	    }, 5000); // <-- time in milliseconds
	}
    
    //INITIALIZE HERE
    alertMessageSetTimeOut();
	
	//Highligh playlist content based on current content playing on DS
	if($('#sortable').size())
	{
		window.setInterval(playlistContentHighlight, 2000);  
	}
	
	//Get html content of file broswer list
    filebrowser_list = $("#files").html();
    
    $('table#table_example tbody tr').quicksearch({
        position: 'before',
        attached: 'table#table_example',
        stripeRowClass: ['odd', 'even'],
        labelText: 'Search list'
    });

    //JPICKER
    //$('#Inline').jPicker();
    $('.Multiple').jPicker();
    $('.Multiple1').jPicker();
    $('.Multiple2').jPicker();	
    
    //FORM VALIDATION
    $("#form").validate(); //Initialize Form Validator
    
    $("#form_template").validate();
    
	/* form layout */
	var container = $('div.error_container');
	// validate the form when it is submitted
	var validator = $("#form_layout").validate({
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		meta: "validate"
	});

    $(".cancel").click(function(){
		validator.resetForm();
	});
    
    //Template Creator Sort
    $('#component-list').sortable({
        update: function(event, ui)
        {
            total_component_list = $('#component-list > li').size();
            //console.log(total_component_list);
            
            for(i = 0; i <= total_component_list; i++)
            {
                index_position = $('#component-list-item-'+i).index(); //Get Position
                $('#component-list-item-'+i+' .class-component-counter').val(index_position);
            }

        }
    });
    
    //Template Creator remove component
    $('.dstemplate-remove-component').live('click', function(e)
    {
        //console.log($(this).parent());
        
        $(this).parent()
        .empty()
        .remove();
        
        total_component_list = $('#component-list > li').size();
        
        for(i = 0; i <= total_component_list; i++)
        {
            index_position = $('#component-list-item-'+i).index(); //Get Position
            $('#component-list-item-'+i+' .class-component-counter').val(index_position);
        }
    });
    
    //Template Creator add component
    $('.component-select').live('click', function(e)
    {
        total_component_list = $('#component-list > li').size();
        
        //Create video template settings
        if($(this).attr('id') == 'video')
        {
            component_holder_id = '#component-video-holder';
        }
        
        //Create image template settings
        if($(this).attr('id') == 'image')
        {
            component_holder_id = '#component-image-holder';
        }
        
        //Create Text crawl template settings
        if($(this).attr('id') == 'text-crawl')
        {
            component_holder_id = '#component-text-crawl-holder';
        }
        
        //Create Text template settings
        if($(this).attr('id') == 'text-scroll')
        {
            component_holder_id = '#component-text-scroll-holder';
        }
        
        //Create Time template settings
        if($(this).attr('id') == 'time')
        {
            component_holder_id = '#component-time-holder';
        }
        
        component_render = $(component_holder_id).html();
        component_render = component_render.replace('component-list-item', 'component-list-item-'+total_component_list);
        
        $('#component-list')
        .hide()
        .append(component_render)
        .fadeIn();
        
        $('#component-list-item-'+total_component_list+' .class-component-counter').val(total_component_list); //Set component counter
    });
    
    //Time Font Style Bold
    $('.font-style-b').live('click', function(e){
        if($(this).is(':checked')){
            $(this).next().val($(this).val());
        }
        else{
            $(this).next().val('');
        }
        
    });
    
	//$("#sortable").sortable();    
	//$('#sortable').data('list_1', $('#sortable').html()); 
    
	//sortable div inside li fix
	$('#sortable, #files').sortable({
    	helper: function(evt, el){
            return el.clone().css('color', '#F8F8F8');
        },
    	placeholder: 'placeholder',
        connectWith: '.connectedSortable',
        update: function(event, ui)
        {
            ui_item = ui.item.attr('id')
            ui_item_parent = $('*[id="'+ui_item+'"]').parent().attr('id');

            //Check if this is from the file browser //eliminate error on dragging items within the file browser
            if(ui_item_parent != 'files')
            {
                if(ui_item.indexOf(":") != -1)
                {
                    pl_list_no = 0;
                    add_to_pl_value_split = ui_item.split(":");

                    $.ajax({
                        type: "POST",
                        url: "ds/index.php/playlist/check_folder",
                        data: "component_type="+$('#component_type').val()+"&value="+add_to_pl_value_split[1],
                        success: function(msg)
                        {
                            rendered_item = addToPlaylist(msg, $('#component_type').val(), ui_item, pl_list_no);

                            ui.item.empty().replaceWith(rendered_item);
                        },
                        error: function()
                        {
                            alert("An error occured while updating. Try again in a while");
                        }
                     });

                    //Load file browser
                    $("#files").html(filebrowser_list);
                }
            }
        }
    }).disableSelection();

	//dialog 
	$.ui.dialog.defaults.bgiframe = true;

	//layout - dialog - select video playlist 
	//$("#dialog_video_playlist").dialog("open"); 
	$("#dialog_video_playlist").dialog({
		bgiframe: true,
        autoOpen: false,
		height: 300,
        modal: true,
        show: 'fadeIn',
        hide: 'fadeOut'
	}); 

    //Display video playlist dialog 
   	$(".select_video_playlist").click(function(){
        $('#dialog_video_playlist [name="component_id"]').val($(this).attr('id'));
   		$("#dialog_video_playlist").dialog("open");
	});

	$(".dg_select_video_playlist").click(function()
    {
        var id = $('#dialog_video_playlist [name="component_id"]').val();
		var split_playlist = $(this).attr('id').split(':');        
		
        $('#video_playlist_id-'+id).val(split_playlist[0]);
        $('#video_playlist_name-'+id).val(split_playlist[1]);
        
        //document.getElementById('video_playlist_id').value = split_playlist[0];
		//document.getElementById('video_playlist_name').value = split_playlist[1];
        
        $("#dialog_video_playlist").dialog("close");
	});
    
    //layout - dialog - select image playlist 
    $("#dialog_image_playlist").dialog("open"); 
    $("#dialog_image_playlist").dialog({
        autoOpen: false,
        height: 300,
        modal: true,
        show: 'fadeIn',
        hide: 'fadeOut'
    }); 
     
    $(".select_image_playlist").click(function(){  
        $('#dialog_image_playlist [name="component_id"]').val($(this).attr('id'));
        $("#dialog_image_playlist").dialog("open");
    });
    
    $(".dg_select_image_playlist").click(function()
    {
        var id = $('#dialog_image_playlist [name="component_id"]').val();
        var split_playlist = $(this).attr('id').split(':');        
        
        $('#image_playlist_id-'+id).val(split_playlist[0]);
        $('#image_playlist_name-'+id).val(split_playlist[1]);
        
        $("#dialog_image_playlist").dialog("close");
    });
	
	//layout - dialog - select text playlist 
	$("#dialog_text_playlist").dialog({
        autoOpen: false,
        height: 300,
        modal: true,
        show: 'fadeIn',
        hide: 'fadeOut'
    }); 
     
    //Select Text Playlist Dialog 
   	$(".select_text_playlist").click(function(){  
   		$('#dialog_text_playlist [name="component_id"]').val($(this).attr('id'));
        $("#dialog_text_playlist").dialog("open");
	});
	
    $(".dg_select_text_playlist").click(function(){
		var id = $('#dialog_text_playlist [name="component_id"]').val();
        var split_playlist = $(this).attr('id').split(':');        
        
        $('#text_playlist_id-'+id).val(split_playlist[0]);
        $('#text_playlist_name-'+id).val(split_playlist[1]);
        
        $("#dialog_text_playlist").dialog("close");
	});
    
    //Select Text Scroll Playlist Dialog
    $("#dialog_text_scroll_playlist").dialog({
        autoOpen: false,
        height: 300,
        modal: true,
        show: 'fadeIn',
        hide: 'fadeOut'
    }); 
    
    //Select Text Scroll Playlist Dialog 
    $(".select_text_scroll_playlist").click(function(){  
        $('#dialog_text_scroll_playlist [name="component_id"]').val($(this).attr('id'));
        $("#dialog_text_scroll_playlist").dialog("open");
    });
    
    $(".dg_select_text_scroll_playlist").click(function(){
        var id = $('#dialog_text_scroll_playlist [name="component_id"]').val();
        var split_playlist = $(this).attr('id').split(':');        
        
        $('#text_scroll_playlist_id-'+id).val(split_playlist[0]);
        $('#text_scroll_playlist_name-'+id).val(split_playlist[1]);
        
        $("#dialog_text_scroll_playlist").dialog("close");
    });

    //Dialog Messages
    $("#dialog_no_files").dialog({
        autoOpen: false,
        bgiframe: true,
        modal: true,
        resizable: false,
        show: 'fadeIn',
        hide: 'fadeOut',
        buttons: {
            Ok: function() {
                $(this).dialog('close');
            }
        }
    });
    
    //Text Form Dialog
    $("#dialog-form-text").dialog({
        autoOpen: false,
        bgiframe: true,
        modal: true,
        resizable: false,
        width: 600,
        height: 410,
        show: 'fadeIn',
        hide: 'fadeOut',
        open:function(event, id) {
              loadTinyMCE();
              //Clear Values
              $('#text-name').val('');
              $('#text-content').val('');
        },
        close:function(event, id) {
            //tinyMCE.triggerSave();
            /*var i, t = tinyMCE.editors;
            for (i in t){
                if (t.hasOwnProperty(i)){
                    t[i].remove();
                }
            }*/
            //$('#text-content').attr("value") == '';
            document.forms['form-text'].reset();
            tinyMCE.get('text-content').getContent() == '';
            var i, t = tinyMCE.editors;
            for (i in t){
                if (t.hasOwnProperty(i)){
                    t[i].remove();
                }
            }
        },
        buttons: {
            Cancel: function() {
                $(this).dialog('close');
            },
            Add: function() {
                //count_text_item = count_text_item + 1;
                pl_list_no = $('#sortable > li').size();
                $('#sortable')
                .hide()
                .append('<li id="sortable_li-'+pl_list_no+'" class="sortable_li_text"><div class="pl_item_holder"><div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="'+pl_list_no+':'+$('#text-name').val()+'"></div><div class="pl_item_name_holder top3px"><input type="text" name="pl_item_name[]" class="class_pl_item_name" id="pl_item_name'+pl_list_no+'" style="border:none;width:220px;" value="'+$('#text-name').val()+'" readOnly> <a class="text-edit" id="'+pl_list_no+'"><img src="<?php echo url::base();?>media/images/edit-icon.png" border="0"></a></div><div class="pl_item_text_content_holder"><textarea name="pl_item_text_content[]" id="pl_item_text_content'+pl_list_no+'" class="pl_item_text_content mceNoEditor">'+tinyMCE.get('text-content').getContent()+'</textarea></div><div class="text-add-image-holder" id="text-add-image-holder'+pl_list_no+'"><a class="text-add-image" id="'+pl_list_no+'"><img src="<?php echo url::base();?>media/images/add-icon.png" border="0"></a><input type="hidden" name="pl_item_image[]" value=""></div> <div class="pl_item_text_img_align_holder"><select name="pl_item_text_img_align[]" class="class_pl_item_text_img_align"><option value="left">Left</option><option value="right">Right</option></select></div> <div class="pl_item_remove_holder"><a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a></div></div>')
                .fadeIn("slow");
                
                $(this).dialog('close');
            }
        }
    });
    
    //Edit text playlist item
    $('.text-edit').live('click', function(e){
        var pl_id = $(this).attr('id');
        var parentlist = $(this).parents('li');
        
        //alert(parentlist.attr('id'))
        
        name_value    = parentlist.children('.pl_item_holder').children('.pl_item_name_holder').children('.class_pl_item_name').val();
        content_value = parentlist.children('.pl_item_holder').children('.pl_item_text_content_holder').children('.pl_item_text_content').val();
        
        $('#pl_id').val(pl_id);
        $('#text-name-edit').val(name_value);
        $('#text-content-edit').val(content_value);
        
        $("#dialog-form-text-edit").dialog({
            autoOpen: false,
            bgiframe: true,
            modal: true,
            resizable: false,
            width: 600,
            height: 410,
            show: 'fadeIn',
            hide: 'fadeOut',
            open:function(event, id) {
                  loadTinyMCE();
            },
            close:function(event, id) {
                document.forms['form-text'].reset();
                tinyMCE.get('text-content-edit').getContent() == '';
                var i, t = tinyMCE.editors;
                for (i in t){
                    if (t.hasOwnProperty(i)){
                        t[i].remove();
                    }
                }
            },
            buttons: {
                Cancel: function(){
                    $(this).dialog('close');
                },
                Update: function() {
                    $('#pl_item_name'+$('#pl_id').val()).val($('#text-name-edit').val());
                    $('#pl_item_text_content'+$('#pl_id').val()).val(tinyMCE.get('text-content-edit').getContent());
                    
                    $('#text-name').val('');
                    $('#text-content').val('');
                    tinyMCE.get('text-content-edit').getContent() == '';
                    
                    $(this).dialog('close');
                }
            }
        });
        
        $("#dialog-form-text-edit").dialog("open");
    });
    
    //Add image to text playlist item
    $('.text-add-image').live('click', function(e){
        var pl_id = $(this).attr('id');
        $('#dialog-file-browser-pl_id').val(pl_id);
        
        $("#dialog-file-browser").dialog({
            autoOpen: false,
            bgiframe: true,
            modal: true,
            resizable: false,
            width: 400,
            height: 300,
            show: 'fadeIn',
            hide: 'fadeOut',
            open:function(event, id) {
            },
            close:function(event, id) {
                
            },
            buttons: {
                Cancel: function(){
                    $(this).dialog('close');
                },
                Clear: function() {
                    $('#text-add-image-holder'+$('#dialog-file-browser-pl_id').val()).html('<a class="text-add-image" id="'+$('#dialog-file-browser-pl_id').val()+'"><img src="<?php echo url::base();?>media/images/add-icon.png" border="0"></a>');
                    $(this).dialog('close');
                }
            }
        });
        
        $("#dialog-file-browser").dialog("open");
    });
    
    //Pass data from text-form-edit-dialog to text playlist item
    $('.select-file' || '.text-add-image-holder').live('click', function(e)
    {
        $('#text-add-image-holder'+$('#dialog-file-browser-pl_id').val()).html('<input type="hidden" name="pl_item_image[]" value="'+$(this).attr('id')+'"><a class="text-add-image" id="'+$('#dialog-file-browser-pl_id').val()+'">'+$(this).attr('id')+'</a> <a class="remove_pl_item_image" id="'+$('#dialog-file-browser-pl_id').val()+'"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a>');
        $("#dialog-file-browser").dialog("close");
    });
    
    //Remove Text image Filename
    $('.remove_pl_item_image').live('click', function(e)
    {
        $('#text-add-image-holder'+$(this).attr('id')).html('<a class="text-add-image" id="'+$(this).attr('id')+'"><img src="<?php echo url::base();?>media/images/add-icon.png" border="0"></a><input type="hidden" name="pl_item_image[]" value="">');
    });
    
    //Video - for fullscreen option
    $('.cb_fullscreen').live('click', function(e)
    {
        if($(this).is(':checked'))
        {
            $('#hidden_fullscreen'+$(this).val()).val('fullscreen');
        }
        else
        {
            $('#hidden_fullscreen'+$(this).val()).val('normal');
        }
    });
    
    //Image - for boxed option
    $('.cb_boxed').live('click', function(e)
    {
        if($(this).is(':checked'))
        {
            $('#hidden_boxed'+$(this).val()).val('false');
        }
        else{
            $('#hidden_boxed'+$(this).val()).val('true');
        }
    });
    
	//Add item to playlist
	$('.add_to_pl').live('click', function(e)
    {
    	add_to_pl_value = $(this).attr('id');
        add_to_pl_value_split = add_to_pl_value.split(":");
        pl_list_no = $('#sortable > li').size();
            
        /*if($('#component_type').val() == 'video'){
            rendered_item = render_list_item_video(add_to_pl_value_split[0],add_to_pl_value_split[1],pl_list_no)
        }
        else if($('#component_type').val() == 'image'){
            rendered_item = render_list_item_image(add_to_pl_value_split[0],add_to_pl_value_split[1],pl_list_no)
        }*/
                
        $.ajax({
            type: "POST",
            url: "ds/index.php/playlist/check_folder",
            data: "component_type="+$('#component_type').val()+"&value="+add_to_pl_value_split[1],
            success: function(msg)
            {
                rendered_item = addToPlaylist(msg, $('#component_type').val(), add_to_pl_value, pl_list_no);
                
                $('#sortable')
                .hide()
                .append(rendered_item)
                .fadeIn("slow");
            },
            error: function()
            {
                alert("An error occured while updating. Try again in a while");
            }
         });
	});

    //Remove Playlist Item
	$('.remove_pl_item').live('click', function(e)
    {
        var agree=confirm("Do you want to delete this item?");
        if (agree)
        {                        
            var parentlist = $(this).parents('li');
            parentlist.slideUp("fast").empty();
        }
        else
        {
            return false;
        }s
	});

	//Clear playlist
	$('#clear_playlist').click(function(e)
    {
		$('#sortable').slideUp().empty();
	});	
	
    //Remove Playlist
	$('.remove_playlist').live('click', function(e)
    {
        var agree=confirm("Do you want to delete this playlist?");
        if (agree)
        {                        
            window.location = '<?php echo url::base();?>index.php/playlist/component/<?php echo $component_type;?>/delete/'+$(this).attr("id");
        }
        else
        {
            return false;
        }        
	});
	
	//checkbox - mulitple item delete
	$('#remove_item').live('click', function(e)
    {
		if($('#playlist_cb_value_holder').attr('value'))
        {    
            var split_playlist_cb_value_holder = $('#playlist_cb_value_holder').attr('value').split(',');
			
			for (var i = 0; i < split_playlist_cb_value_holder.length; i++){
				split_split_playlist_cb_value_holder = split_playlist_cb_value_holder[i].split(':');
				$('#sortable_li-'+split_split_playlist_cb_value_holder[0]).slideUp("fast").empty();
			}
			document.getElementById('playlist_cb_value_holder').value = '';
		}
		else
        {
			$("#dialog_no_files").dialog("open");
		}
	});
	
    function doCheck(split_files_cb_value_holder, pl_list_no)
    {
        var split_values = split_files_cb_value_holder.split(':');
                
        var ui_item = split_files_cb_value_holder;
         
        $.ajax({
            type: "POST",
            url: "ds/index.php/playlist/check_folder",
            data: "component_type="+$('#component_type').val()+"&value="+split_values[1],
            success: function(msg)
            {           
                //console.log(ui_item);
                         
                rendered_item = addToPlaylist(msg, $('#component_type').val(), ui_item, pl_list_no);
                
                $('#sortable')
                .hide()
                .append(rendered_item)
                .fadeIn("slow");
            },
            error: function()
            {
                alert("An error occured while updating. Try again in a while");
            }
        });
    }
    
	//checkbox - multiple add item
	$('#add_item').live('click', function(e){
		if($('#files_cb_value_holder').attr('value')){
			var split_files_cb_value_holder = $('#files_cb_value_holder').attr('value').split(',');		
			var pl_list_no = $('#sortable > li').size();
			            
			for (var i = 0; i <= split_files_cb_value_holder.length - 1; i++)
            {		
                doCheck(split_files_cb_value_holder[i], pl_list_no);
			}
            
            //Uncheck Items
            $('#files li .pl_item_holder_files .pl_item_cb_holder input[name="pl_item_cb"]').attr('checked',false);
            //Clear Holder
            $('#files_cb_value_holder').val('');
		}
		else{
			$("#dialog_no_files").dialog("open");
		}
	});
	
    //Open Text Form Dialog
    $('#add_item_text').click(function(e){
        $("#dialog-form-text").dialog("open");
    });
    
	// Remove Layout
	$('.remove_layout').click(function(e){
		var agree=confirm("Do you want to delete this layout?");

	    if (agree){
	        var parentrow = $(this).parents('tr');
	        e.preventDefault();
	        $.ajax(
	        {
	            type: "POST",
	            url: "ds/index.php/layout/delete_layout",
	            data: "id="+$(this).attr("id"),
	            success: function(msg)
	            {
	                parentrow.fadeOut("slow");
                    
                    $('#message_layout_deleted').fadeIn("slow");
                    
                    setTimeout(function()
                    {
                        $('#message_layout_deleted').fadeOut("slow");
                    }, 5000); // <-- time in milliseconds
                    
	            },
	            error: function()
	            {
	                alert("An error occured while updating. Try again in a while");
	            }
	        });
	    }
	    else{
	        return false;
	    }
	});
	
	//Load Layout
	$('.load_layout').click(function(e){
		var agree=confirm("Do you want to load this layout?");

	    if (agree){
	        //alert($(this).attr("id"))
	        var parentrow = $(this).parents('tr');
	        e.preventDefault();
	        $.ajax({
	            type: "POST",
	            url: "<?php echo url::base();?>index.php/layout/load",
	            data: "id="+$(this).attr("id"),
	            success: function(msg)
	            {
	                parentrow.parent().children('tr')
                        .removeClass("loaded")
                        .addClass("odd");
                        
                    parentrow
                        .removeClass("odd")
                        .addClass("loaded");
                        
                    $('#message_layout_loaded').fadeIn("slow");
					alertMessageSetTimeOut();
	            },
	            error: function()
	            {
	                alert("An error occured while updating. Try again in a while");
	            }
	        });
	    }
	    else{
	        return false;
	    }
	});
    
    //Remove Template
    $('.remove_template').click(function(e){
        var agree=confirm("Do you want to delete this template?");

        if (agree){
            var parentrow = $(this).parents('tr');
            e.preventDefault();
            $.ajax(
            {
                type: "POST",
                url: "ds/index.php/dstemplate/delete_template",
                data: "id="+$(this).attr("id"),
                success: function(msg)
                {
                    parentrow.fadeOut("slow");
                    
                    $('#message_template_deleted').fadeIn("slow");
                    
                    setTimeout(function()
                    {
                        $('#message_template_deleted').fadeOut("slow");
                    }, 5000); // <-- time in milliseconds
                },
                error: function()
                {
                    alert("An error occured while updating. Try again in a while");
                }
            });
        }
        else{
            return false;
        }
    });
    
    //Subscription - Integers only
    $(".delay_input").live('keypress', function(e)
    { 
		//Add period as an exemption
    	if(e.which == 46)
		{
			return true;
		}

		//if the letter is not digit then display error and don't type anything
      	if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
      	{
        	return false;
      	}    
    });
    
    $('.bg_transparent').click(function(e){
        $(this).prev().prev().val("");
        $(this).prev().prev().css('background','#ffffff');
        //alert($(this).prev().children('.jPicker_Container').css({ display: 'none' }));
    });
    
    //File Browser Check all
    $('#file_browser_check_all').click(function(e)
    {
        //Check Items
        $('#files li .pl_item_holder_files .pl_item_cb_holder input[name="pl_item_cb"]').attr('checked',true);
        update_files_cb_value_holder();
    });

    //File Browser Check None
    $('#file_browser_check_none').click(function(e)
    {
        //Uncheck Items
        $('#files li .pl_item_holder_files .pl_item_cb_holder input[name="pl_item_cb"]').attr('checked',false);
        $('#files_cb_value_holder').val('');

    });
    
    //Playlist Check all
    $('#playlist_check_all').click(function(e)
    {
        //Check Items
        $('#sortable li .pl_item_holder .pl_item_cb_holder input[name="pl_item_cb"]').attr('checked',true);
        update_playlist_cb_value_holder();
    });

    //Playlist Check None
    $('#playlist_check_none').click(function(e)
    {
        //Uncheck Items
        $('#sortable li .pl_item_holder .pl_item_cb_holder input[name="pl_item_cb"]').attr('checked',false);
        $('#playlist_cb_value_holder').val('');
    });
    
    //Save Playlist As
    $('.save-playlist-as').click(function(e)
    {
        id = $(this).attr('id');
                
        $("#dialog-save-playlist-as").dialog(
        {
            autoOpen: false,
            bgiframe: true,
            modal: true,
            resizable: false,
            width: 400,
            height: 210,
            show: 'fadeIn',
            hide: 'fadeOut',
            open:function(event, id)
            {
                $('#dialog-save-playlist-as').children('.error-display').hide();
                $('#save-playlist-as-name').val('');
            },
            close:function(event, id)
            {
            },
            buttons:
            {
                Cancel: function()
                {
                    $(this).dialog('close');
                },
                Save: function()
                {
                    if($('#save-playlist-as-name').val() == '')
                    {
                        $('#dialog-save-playlist-as').children('.error-display').fadeIn();
						alertMessageSetTimeOut();
                    }
                    else
                    {
                        $.ajax(
                        {
                            type: "POST",
                            url: "ds/index.php/playlist/save_playlist_as",
                            data: "id="+id+"&playlist_name="+$('#save-playlist-as-name').val(),
                            success: function(msg)
                            {
                                $('#table-playlist-list > tbody:first').prepend('<tr class="odd"><td>'+msg+'</td><td>'+$('#save-playlist-as-name').val()+'</td><td><a href="/ds/index.php/playlist/component/<?php echo $component_type;?>/update/'+msg+'">Edit</a> | <a id="<?php echo $component_type;?>:'+msg+'" class="save-playlist-as">Save As</a> | <a class="remove_playlist" id="'+msg+'">Remove</a> | <a href="/ds/index.php/xml/<?php echo $component_type;?>/'+msg+'" target="_blank">View XML</a></td></tr>');
                                $('#message-save-playlist-as').fadeIn();
								alertMessageSetTimeOut();
                            },
                            error: function()
                            {
                                alert("An error occured while updating. Try again in a while");
                            }
                        });
                        
                        $(this).dialog('close');
                    }
                }
            }
        });
        
        $("#dialog-save-playlist-as").dialog("open");
    });

});

/* hidden textbox holders of values */
function update_playlist_cb_value_holder() 
{
     var allVals = [];
     $('.pl_item_holder [name="pl_item_cb"]:checked').each(function()
     {
       allVals.push($(this).val());
     });
     
     $('#playlist_cb_value_holder').val(allVals);
}

$(function()
{
   //$('.pl_item_holder input').click(update_playlist_cb_value_holder);
   $('.pl_item_holder input').live('click', function(e)
   {
        update_playlist_cb_value_holder();
   });
});

/* hidden textbox holders of values */
function update_files_cb_value_holder()
{
    var allVals = [];
    $('.pl_item_holder_files [name="pl_item_cb"]:checked').each(function()
    {
        allVals.push($(this).val());
    });
    
    $('#files_cb_value_holder').val(allVals);
}

$(function()
{
   $('.pl_item_holder_files input').live('click', function(e)
   {
        update_files_cb_value_holder();
   });
});

//Shorten text
function shortenText(text)
{
    if(text.length > 25)
    {
        chars = 15;
        text = text+" ";
        text = text.substring(0,chars);
        text = text+"...";
    }
    return text;
}

//Get File Extension
function getFileExtension(filename)
{
    return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
}

//Original - render list item onto playlist
function render_list_item(add_to_pl_value_split_zero,add_to_pl_value_split_one,pl_list_no)
{
    return '<li id="sortable_li-'+add_to_pl_value_split_zero+'" class="sortable_li_text"><div class="pl_item_holder"><div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="'+add_to_pl_value_split_zero+':'+add_to_pl_value_split_one+'"></div><div class="pl_item_name_holder top3px"><input type="text" name="pl_item_name[]" ></div><div class="pl_item_filename_holder">'+add_to_pl_value_split_one+'</div><div class="pl_item_remove_holder"><a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a></div><input type="hidden" name="pl_item_filename[]" value="'+add_to_pl_value_split_one+'"></li>'
}

//Video - render list item onto playlist
function render_list_item_video(add_to_pl_value_split_zero,add_to_pl_value_split_one,pl_list_no)
{
    //Check if string / (slash) is present
    if(add_to_pl_value_split_one.indexOf('/'))
    {
        add_to_pl_value_split_one_display = add_to_pl_value_split_one.substring(parseInt(add_to_pl_value_split_one.indexOf('/')) + 1);
        add_to_pl_value_split_one_value   = add_to_pl_value_split_one;
    }
    
    return '<li id="sortable_li-'+add_to_pl_value_split_zero+'" class="sortable_li_not_text"><div class="pl_item_holder"><div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="'+add_to_pl_value_split_zero+':'+add_to_pl_value_split_one_value+'"></div><div class="pl_item_name_holder top3px"><input type="text" name="pl_item_name[]" ></div><div class="pl_item_filename_holder" title="'+add_to_pl_value_split_one_display+'">'+shortenText(add_to_pl_value_split_one_display)+'</div><div class="pl_item_fullscreen_holder"><input type="checkbox" class="pl_item_cb_class cb_fullscreen" value="'+add_to_pl_value_split_zero+'"> <div>Fullscreen</div><input type="hidden" name="pl_item_fullscreen[]" id="hidden_fullscreen'+add_to_pl_value_split_zero+'" value="normal"></div><div class="pl_item_remove_holder"><a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a></div><input type="hidden" name="pl_item_filename[]" value="'+add_to_pl_value_split_one_value+'"></li>'
}

//Image - render list item onto playlist
function render_list_item_image(add_to_pl_value_split_zero,add_to_pl_value_split_one,pl_list_no)
{
    //Check if string / (slash) is present
    if(add_to_pl_value_split_one.indexOf('/'))
    {
        add_to_pl_value_split_one_display = add_to_pl_value_split_one.substring(parseInt(add_to_pl_value_split_one.indexOf('/')) + 1);
        add_to_pl_value_split_one_value   = add_to_pl_value_split_one;
    }
    
    return '<li id="sortable_li-'+add_to_pl_value_split_zero+'" class="sortable_li_not_text"><div class="pl_item_holder"><div class="pl_item_cb_holder"><input type="checkbox" name="pl_item_cb" class="pl_item_cb_class" value="'+add_to_pl_value_split_zero+':'+add_to_pl_value_split_one_value+'"></div><div class="pl_item_name_holder top3px"><input type="text" name="pl_item_name[]" ></div><div class="pl_item_filename_holder" title="'+add_to_pl_value_split_one_display+'">'+shortenText(add_to_pl_value_split_one_display)+'</div><div class="pl_item_fullscreen_holder"><input type="checkbox" class="pl_item_cb_class cb_boxed" value="'+add_to_pl_value_split_zero+'"> <div>Unboxed</div><input type="hidden" name="pl_item_boxed[]" id="hidden_boxed'+add_to_pl_value_split_zero+'" value="true"></div>'+render_delay_holder(add_to_pl_value_split_one_value)+'<div class="pl_item_remove_holder"><a class="remove_pl_item"><img src="<?php echo url::base();?>media/images/delete-16x16.png" border="0"></a></div><input type="hidden" name="pl_item_filename[]" value="'+add_to_pl_value_split_one_value+'"></li>'
}

//Image - render delay holder
function render_delay_holder(filename)
{
    ext = getFileExtension(filename);
    if(ext == 'swf'){
        delay_hidden = 'style="visibility:hidden"';
    }
    else{
        delay_hidden = '';
    }
    
    return '<div class="pl_item_delay_holder" '+delay_hidden+'><input type="text" name="pl_item_delay[]" class="class_item_delay" value="0"> Delay (sec)</div>';
}

//Add to Playlist
function addToPlaylist(msg, component_type, ui_item, pl_list_no)
{
    add_to_pl_value_split = ui_item.split(":");
    
    //console.log(msg);
    
    if(msg == 'not_folder')
    {
        if(component_type == 'video')
        {
            rendered_item = render_list_item_video(add_to_pl_value_split[0],add_to_pl_value_split[1],pl_list_no)
        }

        else if(component_type == 'image')
        {
            rendered_item = render_list_item_image(add_to_pl_value_split[0],add_to_pl_value_split[1],pl_list_no)
        }
    }
    else
    {
        //List files from folder
        folder_name = add_to_pl_value_split[1].replace(' ','-');
        
        var file = JSON.parse(msg);
        var rendered_item;

        for ( var i in file )
        {
            list_item_id = i + pl_list_no;
            
            if(component_type == 'video')
            {
                rendered_item = render_list_item_video(folder_name+'-'+list_item_id, add_to_pl_value_split[1]+'/'+file[i], pl_list_no) + rendered_item;
            }
            
            if(component_type == 'image')
            {
                rendered_item = render_list_item_image(folder_name+'-'+list_item_id, add_to_pl_value_split[1]+'/'+file[i], pl_list_no) + rendered_item;
            }
        }
    }
    
    //Remove 'undefined' on outout
    rendered_item = rendered_item.replace('undefined',' ');
    
    return rendered_item;
}
</script>
</body>
</html>
