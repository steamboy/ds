<?php
//require("includes/config.inc.php");	 

mysql_connect('localhost','root','') or die(mysql_error());
//echo 'connected to server';

mysql_select_db('ds') or die(mysql_error());
//echo 'connected to database';


	mysql_query("SET @pos=0;");
	
    $_GET['tbl'] = 'report_content';
	$date        = $_GET['date'];
	
	if ($_GET['tbl']) {
		//$where_clause = "WHERE url LIKE '%Source".$_GET['source']."%'";
		
//		if (isset($_GET['admin'])) {
//			$operator = "=";
//		}
//		else{
//			$operator = "!=";
//		}
		
		$export_sql = "SELECT @pos:=@pos+1,
		                    component_type,
                            filename,
                            start_time,
                            end_time,
                            TIMEDIFF(end_time,start_time) AS duration
	                      FROM ".$_GET['tbl']."
                          WHERE DATE(start_time) = '$date'";
	
		$export = mysql_query($export_sql);
		//$fields = mysql_num_fields($export);		
		//echo $export.'<br>'.$fields;
		
        $header ='';
        $header .= "Id" . "\t";
		$header .= "Content Type" . "\t";
        $header .= "Filename/Name" . "\t";
        $header .= "Start Time" . "\t";
        $header .= "End Time" . "\t";
		$header .= "Duration" . "\t";
	}
	/*elseif ($_GET['tbl'] != 'users') {	
		$export_sql = "SELECT * FROM ".$_GET['tbl'];	    
	    
		$export = mysql_query($export_sql);
		$fields = mysql_num_fields($export);	
		
		$header ='';
		for ($i = 0; $i < $fields; $i++) {
		    $header .= mysql_field_name($export, $i) . "\t";
		}
	}*/		
	
	$data='';
	while($row = mysql_fetch_row($export)) {
	    $line = '';
	    foreach($row as $value) {                                            
	        if ((!isset($value)) OR ($value == "")) {
	            $value = "\t";
	        } else {
	            $value = str_replace('"', '""', $value);
	            $value = '"' . stripslashes($value) . '"' . "\t";
	        }
	        $line .= $value;
	    }
	    $data .= trim($line)."\n";
	}
	$data = str_replace("\r","",$data); 
	
	header("Content-type: application/x-msdownload");
    //header("Content-Disposition: attachment; filename=".$_GET['tbl']."-".date("Ymd").".xls");
	header("Content-Disposition: attachment; filename=report-".$date.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";



?>

