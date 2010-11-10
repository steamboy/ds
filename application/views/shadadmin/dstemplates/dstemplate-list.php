		<div class="title">		
			<h2>Template</h2>
		</div>

		<div class="box">
			<h3>Template List</h3>
			<table>
			<thead>
			<tr>
                <th scope="col">ID</th>
				<th scope="col">Layout</th>
				<th scope="col">Name</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($dstemplate as $dstemplates)
			{
			?>
			<tr class="odd">
                <td><?php echo $dstemplates->id;?></td>
				<td><img src="<?php echo url::base();?>media/images/<?php echo $dstemplates->layout_image;?>" alt="DS"></td>
				<td><?php echo $dstemplates->name;?></td>
                <td><a href="<?php echo url::base();?>index.php/layout/form/dstemplate/<?php echo $dstemplates->id;?>">Create layout using this template</a> | <a href="<?php echo url::base();?>index.php/dstemplate/form/update/<?php echo $dstemplates->id;?>">Edit</a> | <a class="remove_template" id="<?php echo $dstemplates->id;?>">Remove</a></td>
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>
			<br />
		</div>