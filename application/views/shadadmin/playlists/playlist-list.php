		<div class="title">		
			<h2>Playlist</h2>
		</div>

		<div class="box">
			<h3><?php echo ucfirst($component_type);?> Playlist</h3>
			<table id="table-playlist-list">
			<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($playlist as $playlists)
			{
			?>
			<tr class="odd">
				<td><?php echo $playlists->id;?></td>
				<td><?php echo $playlists->name;?></td>
				<td>
                    <a href="<?php echo url::base();?>index.php/playlist/component/<?php echo $component_type;?>/update/<?php echo $playlists->id;?>">Edit</a> |
                    <a id="<?php echo $component_type;?>:<?php echo $playlists->id;?>" class="save-playlist-as">Save As</a> |
                    <a class="remove_playlist" id="<?php echo $playlists->id;?>">Remove</a> 
                <?php
                if(settings::view_xml()){   
                ?>
                | <a href="<?php echo url::base();?>index.php/xml/<?php echo $component_type;?>/<?php echo $playlists->id;?>" target="_blank">View XML</a></td>
			    <?php
                }
                ?>
            </tr>
			<?php
			}
			?>
			</tbody>
			</table>
			<br />
		</div>