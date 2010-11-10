		<div>
			<h2>Navigation</h2>
		</div>
		
		<div class="navigation">
			<ul>
				<li class="active"><a href="#">Dashboard</a></li>
				<li><img src="<?php echo url::base();?>media/images/resolution_32.ico" alt="Layout"> Layout
					<ul>
						<li><a
							<?php
								echo functions::highlightNavLink($this->uri->string(),'layout');
								echo functions::highlightNavLink($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3),'layout/form/update');
							?>
							href="<?php echo url::base();?>index.php/layout">View List of Layout</a></li>
						<li><a
							<?php
								echo functions::highlightNavLink($this->uri->string(),'dstemplate');
								echo functions::highlightNavLink($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3),'layout/form/dstemplate');
							?>
							href="<?php echo url::base();?>index.php/dstemplate">Select Template</a></li>
					</ul>
				</li>
				<li><img src="<?php echo url::base();?>media/images/Movies_32.png" alt="Video"> Video
					<ul>
						<li><a
							<?php
								echo functions::highlightNavLink($this->uri->string(),'playlist/component/video');
								echo functions::highlightNavLink($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'playlist/component/video/update');
							?>
							href="<?php echo url::base();?>index.php/playlist/component/video">View Video Playlist</a></li>
						<li><a <?php echo functions::highlightNavLink($this->uri->string(),'playlist/component/video/create');?> href="<?php echo url::base();?>index.php/playlist/component/video/create">Create Playlist</a></li>
					</ul>
				</li>
				<li><img src="<?php echo url::base();?>media/images/Picture_32.png" alt="Image"> Image
                    <ul>
                        <li><a
							<?php
								echo functions::highlightNavLink($this->uri->string(),'playlist/component/image');
								echo functions::highlightNavLink($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'playlist/component/image/update');
							?>
							href="<?php echo url::base();?>index.php/playlist/component/image">View Image Playlist</a></li>
                        <li><a <?php echo functions::highlightNavLink($this->uri->string(),'playlist/component/image/create');?> href="<?php echo url::base();?>index.php/playlist/component/image/create">Create Playlist</a></li>
                    </ul>
                </li>
				<li><img src="<?php echo url::base();?>media/images/Font_32.png" alt="Text"> Text
					<ul>
						<li><a
							<?php
								echo functions::highlightNavLink($this->uri->string(),'playlist/component/text');
								echo functions::highlightNavLink($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'playlist/component/text/update');
							?>
							href="<?php echo url::base();?>index.php/playlist/component/text">View Text Playlist</a></li>
						<li><a <?php echo functions::highlightNavLink($this->uri->string(),'playlist/component/text/create');?> href="<?php echo url::base();?>index.php/playlist/component/text/create">Create Playlist</a></li>
					</ul>
				</li>
                <li><img src="<?php echo url::base();?>media/images/Reports-32.png" alt="Report"> Report
                    <ul>
                        <li><a <?php echo functions::highlightNavLink($this->uri->segment(1),'report');?> href="<?php echo url::base();?>index.php/report/dates">View Report</a></li>
                    </ul>
                </li>
				<li><img src="<?php echo url::base();?>media/images/Settings_32.png" alt="Report"> Settings
                    <ul>
                        <li><a <?php echo functions::highlightNavLink($this->uri->segment(1),'report');?> href="<?php echo url::base();?>index.php/settings/edit/">View Settings</a></li>
                    </ul>
                </li>
                <!--<li><a href="<?php echo url::base();?>index.php/user">User</a>
                    <ul>
                        <li><a href="<?php echo url::base();?>index.php/user">View List of User</a></li>
                        <li><a href="<?php echo url::base();?>index.php/user/form/create">Create User</a></li>
                    </ul>
                </li>-->
			</ul>
		</div>