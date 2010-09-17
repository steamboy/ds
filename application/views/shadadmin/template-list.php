		<div class="title">		
			<h2>Template</h2>
		</div>

		<div class="box">
			<h3>Template List</h3>
			<table>
			<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($template as $templates)
			{
			?>
			<tr class="odd">
				<td><?php echo $templates->id;?></td>
				<td><?php echo $templates->name;?></td>
				<td><a class="remove_layout" id="<?php echo $templates->id;?>">Remove</a> | <!--<a href="<?php echo url::base();?>index.php/xml/layout/<?php echo $templates->id;?>" target="_blank">View XML</a> |--> <a id="<?php echo $templates->id;?>" class="load_layout">Select</a></td>
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>
			<br />
		</div>