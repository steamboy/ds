<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Shadmin | Dashboard</title>

<?php echo html::stylesheet('media/css/style.css', 'screen')?>
<?php echo html::stylesheet('media/css/table.css', 'screen')?>
<?php echo html::stylesheet('media/css/form.css', 'screen')?>

<script type="text/javascript" src="Shadmin%20_%20Dashboard_files/minmax.js"></script>

<script charset="utf-8" id="injection_graph_func" src="Shadmin%20_%20Dashboard_files/injection_graph_func.js"></script>
</head>
<div FirebugVersion="1.3.3" style="display: none;" id="_firebugConsole"></div><body>

<div id="header">

	<h1><a href="#"><img src="<?php echo url::base();?>media/images/logo.gif" alt="Shadmin"></a></h1>
	<div class="menu">Welcome <a href="#">Admin</a>! | <a href="#">Help</a> | <a href="#">Settings</a> | <a href="#">Logout</a></div>

</div>

<div id="wrapper">

	<div id="notice"><strong>Updated</strong>: Your dashboard has been updated.</div>
	<div id="succeed"><strong>Succeed</strong>: We have successfully sent your message!</div>
	<div id="error"><strong>Error</strong>: Something went wrong.</div>

	<div id="sidebar">
	
		<div class="title">
			<h2>Navigation</h2>
		</div>
		
		<div class="navigation">
			<ul>
				<li class="active"><a href="#">Dashboard</a></li>
				<li><a href="#">Clients</a>
					<ul>
						<li><a href="#">New Clients</a></li>
						<li><a href="#">Top Clients</a></li>
						<li><a href="#">Search</a></li>
					</ul>
				</li>
				<li><a href="#">Reports</a></li>
				<li><a href="#">System</a></li>
			</ul>
		</div>

		<div class="title">		
			<h2>Search</h2>
		</div>
		
		<div class="box">
			<form id="search-form" method="get" action="#">
				<input name="search" id="search-input" class="search-input" type="text">
				<input src="<?php echo url::base();?>media/images/button-search.gif" id="search-submit" class="search-submit" type="image">
			</form>
		</div>

		<div class="title">		
			<h2>Blog</h2>
		</div>
		
		<div class="box">
			<ul id="blog">
				<li><h4><a href="#" title="Sample Title">Sample Title</a> <abbr title="2009-01-20">2009-01-20</abbr></h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></li>
				<li><h4><a href="#" title="Sample Title 2">Sample Title 2</a> <abbr title="2009-01-20">2009-01-15</abbr></h4><p>Duis
sed orci. Fusce sapien sapien, ultricies eu, sagittis in, pretium nec,
quam. Curabitur sed turpis. Aenean pharetra, quam non sagittis
venenatis, eros nisl fringilla ligula, in viverra mi tortor a massa. In
mi.</p></li>
				<li><h4><a href="#" title="Sample Title 3">Sample Title 3</a> <abbr title="2009-01-20">2009-01-10</abbr></h4><p>Ut urna. Praesent scelerisque risus ut ipsum. Duis lacinia elit ut dolor.</p></li>
			</ul>
		</div>
	
	</div>
	
	<div id="content">
	
		<div class="title">		
			<h2>Dashboard</h2>
		</div>
		
		<div class="box">
			<h3>Subtitle Sample</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#">Donec tempus</a> ullamcorper lacus. Aliquam at purus. Sed viverra aliquam urna. Nam sapien lectus, pretium eu, consequat ut, tempor et, augue.</p>
		
			<h4>Smaller Subtitle Sample</h4>
			
			<ul>
				<li>List Sample</li>
				<li><a href="#">List Sample</a></li>
				<li>List Sample</li>
			</ul>
		</div>
		
		<div class="box">
			<h3>Form Sample</h3>
			<form method="post" action="#">

			<p class="success"><strong>SUCCESS:</strong> Success message.</p>
			
			<p class="error"><strong>ERROR:</strong> Error message.<br>
			<strong>ERROR:</strong> Second error message.</p>
			
			<ul>
				<li>
					<label>Short Input <span class="req">*</span></label>
					<div><input name="" class="short text" value="" type="text"> <input name="" class="short text" value="" type="text"></div>
					<label class="note">Input note message goes here.</label>
				</li>
				<li>
					<label>Medium Input</label>
					<div><input name="" class="text medium" value="" type="text"></div>
				</li>
				<li>
					<label>Long Input</label>
					<div><input name="" class="text long" value="" type="text"></div>
				</li>
				<li>
					<label>Radio Sample</label>
					<div><input name="" class="radio" value="" checked="checked" type="radio"> <label class="choice">Radio Button 1</label> <input name="" class="radio" value="" type="radio"> <label class="choice">Radio Button 2</label> <input name="" class="radio" value="" type="radio"> <label class="choice">Radio Button 3</label></div>
 				</li>
				<li>
					<label>Checkbox Sample</label>
					<div><input name="" class="checkbox" value="" checked="checked" type="checkbox"> <label class="choice">Checkbox Button 1</label> <input name="" class="checkbox" value="" type="checkbox"> <label class="choice">Checkbox Button 2</label> <input name="" class="checkbox" value="" type="checkbox"> <label class="choice">Checkbox Button 3</label></div>
 				</li>
				<li>
					<label>Dropdown Sample</label>
					<div>
						<select class="drop" name="">
							<option selected="selected" value="day">Day &nbsp;</option>
							<option value="1">1 &nbsp;</option>
							<option value="1">2 &nbsp;</option>
							<option value="1">3 &nbsp;</option>
							<option value="1">4 &nbsp;</option>
							<option value="1">5 &nbsp;</option>
						</select>
						<select class="drop" name="">
							<option selected="selected" value="month">Month &nbsp;</option>
							<option value="1">1 &nbsp;</option>
							<option value="1">2 &nbsp;</option>
							<option value="1">3 &nbsp;</option>
							<option value="1">4 &nbsp;</option>
							<option value="1">5 &nbsp;</option>
						</select>
						<select class="drop" name="">
							<option selected="selected" value="month">Year &nbsp;</option>
							<option value="1">1980 &nbsp;</option>
							<option value="1">1981 &nbsp;</option>
							<option value="1">1982 &nbsp;</option>
							<option value="1">1983 &nbsp;</option>
							<option value="1">1984 &nbsp;</option>
						</select>
					</div>
				</li>
				<li>
					<label>Upload Sample</label>
					<div><input class="file" name="" type="file"></div>
				</li>
				<li>
					<label>Textarea Sample</label>
					<div><textarea name="" rows="6" cols="60" tabindex="1" class="textarea"></textarea></div>
				</li>
				<li>
					<input value="Submit" class="button" type="button"> <input value="Reset" class="button" type="button">
				</li>
			</ul>
			</form>
			</div>
			
			<div class="box">
			<h3>Table Sample</h3>
			<table>
			<thead>
			<tr>
				<th scope="col">Date</th>
				<th scope="col">Username</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
			</tr>
			</thead>
			<tbody>
			<tr class="odd">
				<td>2009-01-20</td>
				<td>admin</td>
				<td><span class="active">Active</span></td>
				<td><a href="#">Edit</a> | <a href="#">Remove</a></td>
			</tr>
			<tr>
				<td>2009-01-15</td>
				<td>ne-design</td>
				<td><span class="pending">Pending</span></td>
				<td><a href="#">Edit</a> | <a href="#">Remove</a></td>
			</tr>
			<tr class="odd">
				<td>2009-01-10</td>
				<td>blackdragon</td>
				<td><span class="closed">Closed</span></td>
				<td><a href="#">Edit</a> | <a href="#">Remove</a></td>
			</tr>
			<tr>
				<td>2009-01-05</td>
				<td>otaku</td>
				<td><span class="active">Active</span></td>
				<td><a href="#">Edit</a> | <a href="#">Remove</a></td>
			</tr>
			</tbody>
			</table>
			
			<div class="pagination">
            	<ul>	   
                	<li class="pages">Page:</li>
					<li>1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>...</li>
					<li><a href="#">10</a></li>
				</ul>
            </div>

		</div>
	
	</div>
	
	<div id="footer">
		<span class="left"><a href="#">Dashboard</a> | <a href="#">Clients</a> | <a href="#">Reports</a> | <a href="#">System</a></span>
		<span class="right">© 2009 DS. All Rights Reserved.</span>
	</div>

</div>

</body></html>