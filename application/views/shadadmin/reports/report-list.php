		<div class="title">		
			<h2>Report</h2>
		</div>

		<div class="box">
			<h3>Report List <?php if($display_date) echo '- '.$display_date;?></h3>
            <?php
            if($display_date)
            {
            ?>
            <p class="export"><a href="<?php echo url::base();?>export-report.php?date=<?php echo $display_date;?>">Export to Excel</a></p>
            <?php
            }
            ?>
            <?php
            if($reports)
			{
			?>
                <form method="post" action="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>" class="cmxform_admin" id="form_layout">
                <ul>
                    <li>
                        <label>Search</label><br />
                        <input name="search" id="search" type="text" style="width:90%;">
                        <input type="submit" value="Submit">
                    </li>
                </ul>
                </form>
            
                <table>
                <thead>
                <!--<tr>
                    <td colspan="20" style="padding:0 0 0 0;">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding-left:0;width:100px;">
                                    <input type="button" value="View All" style="width:100px;" onclick="window.location='<?php echo $_SERVER['PHP_SELF'];?>'">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>-->
                <tr>
                    <th scope="col"><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>?sortby=name&sortby_type=<?php echo $sortby_type;?>">Name</a></th>
                    <th scope="col"><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>?sortby=content_type&sortby_type=<?php echo $sortby_type;?>">Content Type</a></th>
                    <th scope="col"><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>?sortby=start_time&sortby_type=<?php echo $sortby_type;?>">Start Time</a></th>
                    <th scope="col"><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>?sortby=end_time&sortby_type=<?php echo $sortby_type;?>">End Time</a></th>
                    <th scope="col"><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $display_date;?>?sortby=duration&sortby_type=<?php echo $sortby_type;?>">Duration</a></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($reports as $report)
                {
                ?>
                <tr class="odd">
                    <td><?php echo $report->filename;?></td>
                    <td><?php echo $report->component_type;?></td>
                    <td><?php echo $report->start_time;?></td>
                    <td><?php echo $report->end_time;?></td>
                    <td><?php echo $report->duration;?></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>
            <?php
			}
			else
			{
			?>
                <table>
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($report_dates as $report_date)
                {
                ?>
                <tr class="odd">
                    <td><?php echo $report_date->report_date;?></td>
                    <td><a href="<?php echo url::base();?>index.php/report/rdate/<?php echo $report_date->report_date;?>">View</a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>
            <?php
			}
            
            echo $pagination;
			?>
			<br />
		</div>
