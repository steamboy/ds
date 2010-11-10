		<div class="title">		
			<h2>Layout</h2>
		</div>

		<div class="box">
			<h3>Layout List</h3>
			<table>
			<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($layout as $layouts)
			{
                if ($layouts->id == $current_layout_id)
                {
                    $css_class = 'loaded';
                }
                else
                {
                    $css_class = 'odd';
                }
			?>
			<tr class="<?php echo $css_class;?>">
				<td><?php echo $layouts->id;?></td>
				<td><?php echo $layouts->name;?></td>
				<td><a href="<?php echo url::base();?>index.php/layout/form/update/<?php echo $layouts->id;?>">Edit</a> |
                    <a class="remove_layout" id="<?php echo $layouts->id;?>">Remove</a>
                     |
                    <?php
                    if(settings::view_xml()){   
                    ?> 
                    <a href="<?php echo url::base();?>index.php/xml/layout/<?php echo $layouts->id;?>" target="_blank">View XML</a> |
                    <?php
                    }
                    ?>
                    <a id="<?php echo $layouts->id;?>" class="load_layout">Load</a></td>
			</tr>
			<?php
			}
			?>
            
            <?php //echo javascript::alert("Oh no!");?>
			</tbody>
			</table>
			<br />
		</div>