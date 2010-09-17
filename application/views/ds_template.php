<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
<title>DS - <?php echo $title; ?></title>

<?php echo html::stylesheet('media/jquery/jquery-validate/css/screen.css', 'screen')?>
<?php echo html::stylesheet('media/css/style.css')?>

</head>
<body>
<div id="wrapper">
	<div id="main">
		<!--<table border="1" cellpadding="0" cellspacing="0">
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>-->
		<div id="playlist">
			<div class="name">Video Component Name</div>
			<div id="back-to-display-holder"><input type="button" id="back-to-display" value="Back to display"></div>
			<div class="list">
				<ul id="sortable">
					<?php for ($i = 0; $i < 5; $i++){
					$pl_item_id = $i;
					?>
					<li>
						Item Name <?php echo $pl_item_id; ?>
						<input type="text" name="pl_item_id" id="pl_item_id<?php echo $pl_item_id;?>" class="class_pl_item_id" value="<?php echo $pl_item_id;?>">
						<input type="text" name="pl_item_id_post[]" value="<?php echo $pl_item_id;?>">
						<a class="remove_pl_item">REMOVE</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="file-browser">
			<div class="name">Available Videos</div>
			<div class="list">
				<ul id="files">
					<?php for ($i = 0; $i < 10; $i++){ ?>
					<li>File Name <?php echo $i;?> <a class="add_to_pl" id="<?php echo $i;?>:File Name <?php echo $i;?>">ADD TO PLAYLIST<a/></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php echo html::script('media/jquery/jquery-1.3.2.min.js')?>
<?php echo html::script('media/jquery/jquery-ui-personalized-1.6rc6.min.js')?>
<?php echo html::script('media/jquery/jquery-validate/jquery.validate.js')?>
<?php echo html::script('media/jquery/jquery-validate/cmxforms.js')?>
</body>
<script type="text/javascript">
	$('document').ready(function(){
		$("#sortable").sortable();
		$('#sortable').data('list_1', $('#sortable').html()); 
	});
	
	//Page Add Sub Nav
	$('.add_to_pl').click(function(e){
    	allow_pl_item_add = 1;
		add_to_pl_value = $(this).attr('id');
		var add_to_pl_value_split = add_to_pl_value.split(":");
		
		$('#sortable > li').each(
			function(index){
				if($('#pl_item_id'+index).attr('value') == add_to_pl_value_split[0]){
					alert('File already in the list')
					allow_pl_item_add = 0;
				}
			}
		);
		
		if(allow_pl_item_add){
			pl_list_no = $('#sortable > li').size();
			$('#sortable')
			.hide()
			.append('<li>'+add_to_pl_value_split[1]+' <input type="text" name="pl_item_id" id="pl_item_id'+pl_list_no+'" class="class_pl_item_id" value="'+add_to_pl_value_split[0]+'"><input type="text" name="pl_item_id_post[]" value="'+add_to_pl_value_split[0]+'"><a class="remove_pl_item">REMOVE</a></li>')
			.fadeIn("slow");
		}
	});
	
	$('.remove_pl_item').live('click', function(e) { 
		var parentlist = $(this).parents('li');
		parentlist.slideUp("fast").empty();
	});
</script>
</html>
