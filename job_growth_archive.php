<?php

/*

Template Name: Job Growth Archive

*/

get_header(); ?>

	<?php $wp_query = $backup_wp_query;



	$DB_USER = DB_USER_jg;

	$DB_PASS = DB_PASS_jg;

	$DB_NAME = DB_NAME_jg;

	$DB_HOST = DB_HOST_jg;

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST); ?>



  <script>

       $(function(){

	  $("#radio").buttonset();

	});

  </script>


<script type ="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hide_selects.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/sorting/numeric-comma.js"></script>
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="dataTables.numericComma.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var $table = $(".job-growth");
	$table.dataTable({
					"columnDefs" : [
					{"type": "numeric-comma", targets : [4,5]}
					],
					"iDisplayLength": 51,
					"fnInitComplete" : function() {
							$(".job-growth").show();
					},
					"bAutoWidth"   : false,
					"bFilter" : false,
					"sDom": 't',
					"bPaginate" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bSortClasses":false,
					"deferLoading": 57,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth" : "20%",  "sClass" : "left", "aTargets" : [0]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [1]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [2]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [3]},
					 {"sWidth" : "20%", "sClass" : "center", "aTargets" : [4]}
					]
				});
    });
</script>
    <form method = "post" name = "main_form">

	<div id = "radio">

		<input type = "radio" id = "mom" value = "mom" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'mom') echo ' checked = "checked" ';?> onchange = "this.form.submit()" >

		<label for ="mom">1 month change</label>

		<input type = "radio" id = "yoy" value = "yoy" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'yoy') echo ' checked = "checked" ';?> onchange = "this.form.submit()">

		<label for ="yoy">12 month change</label>

		<input type = "radio" id = "ann" value = "ann" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'ann') echo ' checked = "checked" ';?> onchange = "this.form.submit()">

		<label for ="ann">Annual</label>



	<br></br>

	<table>

		<tr>

		<td align = "right">Job Sector:</td>

		<td align = "left">







	<select name = "job_sector"  id = "job_select"  onchange = "this.form.submit()">

			<option value = "Total Nonfarm" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Total Nonfarm')

					echo ' selected="selected"';?> > Total Nonfarm </option>



			<option value =  "Total Private" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Total Private')

					echo ' selected="selected"';?>> Total Private</option>



			<option value =  "Goods Producing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Goods Producing')

					echo ' selected="selected"';?>> Goods Producing</option>



			<option value =  "Service-Providing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Service-Providing')

					echo ' selected="selected"';?>> Service-Providing</option>



			<option value =  "Private Service Providing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Private Service Providing')

					echo ' selected="selected"';?>>Private Service Providing</option>



			<option value =  "Mining, Logging, and Construction" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Mining, Logging, and Construction')

					echo ' selected="selected"';?>>Mining, Logging, and Construction</option>



			<option value =  "Construction" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Construction')

					echo ' selected="selected"';?>>Construction</option>


			<option value =  "Mining" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Mining')

					echo ' selected="selected"';?>>Mining</option>


			<option value =  "Manufacturing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Manufacturing')

					echo ' selected="selected"';?>> Manufacturing</option>



			<option value =  "Durable Goods" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Durable Goods')

					echo ' selected="selected"';?>>Durable Goods</option>



			<option value =  "Non-Durable Goods" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Non-Durable Goods')

					echo ' selected="selected"';?>>Non-Durable Goods</option>



			<option value =  "Trade, Transportation, and Utilities" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Trade, Transportation, and Utilities')

					echo ' selected="selected"';?>>Trade-Transportation-Utilities</option>



			<option value =  "Wholesale Trade" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Wholesale Trade')

					echo ' selected="selected"';?>>Wholesale Trade</option>



			<option value =  "Retail Trade" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Retail Trade')

					echo ' selected="selected"';?>>Retail Trade</option>



			<option value =  "Transportation and Utilities" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Transportation and Utilities')

					echo ' selected="selected"';?>>Transportation and Utilities</option>



			<option value =  "Utilities" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Utilities')

					echo ' selected="selected"';?>>Utilities</option>



			<option value =  "Transportation and Warehousing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Transportation and Warehousing')

					echo ' selected="selected"';?>>Transportation and Warehousing</option>



			<option value =  "Information" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Information')

					echo ' selected="selected"';?>> Information</option>



			<option value =  "Financial Activities" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Financial Activities')

					echo ' selected="selected"';?>> Financial Activities</option>



			<option value =  "Finance and Insurance" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Finance and Insurance')

					echo ' selected="selected"';?>>Finance and Insurance</option>



			<option value =  "Real Estate and Rental and Leasing" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Real Estate and Rental and Leasing')

					echo ' selected="selected"';?>>Real Estate and Rental and Leasing</option>



			<option value =  "Professional and Business Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Professional and Business Services')

					echo ' selected="selected"';?>> Professional and Business Services</option>



			<option value =  "Professional, Scientific, and Technical Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Professional, Scientific, and Technical Services')

					echo ' selected="selected"';?>>Professional, Scientific, and Technical Services</option>



			<option value =  "Administrative and Support and Waste Management and Remediation Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Administrative and Support and Waste Management and Remediation Services')

					echo ' selected="selected"';?>>Administrative and Support and Waste Management and Remediation Services</option>



			<option value =  "Management of Companies and Enterprises" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Management of Companies and Enterprises')

					echo ' selected="selected"';?>>Management of Companies and Enterprises</option>



			<option value =  "Education and Health Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Education and Health Services')

					echo ' selected="selected"';?>> Education and Health Services</option>


			<option value =  "Ambulatory Health Care Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Ambulatory Health Care Services')
					echo ' selected="selected"';?>>Ambulatory Health Care Services</option>


			<option value =  "Hospitals" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Hospitals')
					echo ' selected="selected"';?>>Hospitals</option>


			<option value =  "Nursing and Residential Care Facilities" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Nursing and Residential Care Facilities')
					echo ' selected="selected"';?>>Nursing and Residential Care Facilities</option>


			<option value =  "Educational Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Educational Services')

					echo ' selected="selected"';?>>Educational Services</option>



			<option value =  "Health Care and Social Assistance" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Health Care and Social Assistance')

					echo ' selected="selected"';?>>Health Care and Social Assistance</option>



			<option value =  "Leisure and Hospitality" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Leisure and Hospitality')

					echo ' selected="selected"';?>> Leisure and Hospitality</option>



			<option value =  "Accommodation and Food Services"<?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Accommodation and Food Services')

					echo ' selected="selected"';?>> Accommodation and Food Services</option>



			<option value =  "Food Services and Drinking Places"<?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Food Services and Drinking Places')

					echo ' selected="selected"';?>> Food Services and Drinking Places</option>




			<option value =  "Arts, Entertainment, and Recreation"<?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Arts, Entertainment, and Recreation')

					echo ' selected="selected"';?>>Arts, Entertainment, and Recreation</option>



			<option value =  "Other Services" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Other Services')

					echo ' selected="selected"';?>>Other Services</option>



			<option value =  "Government" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Government')

					echo ' selected="selected"';?>>Government</option>



			<option value =  "Federal Government" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Federal Government')

					echo ' selected="selected"';?>>Federal Government</option>



			<option value =  "State Government" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'State Government')

					echo ' selected="selected"';?>>State Government</option>



			<option value =  "Local Government" <?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Local Government')

					echo ' selected="selected"';?>>Local Government</option>

		</select>

		</td>

		</tr>



		<tr>

		<td class = "Month_id_field" align = "right">Month:</td>

		<td class = "Month_id_field" align = "left">

		<select name = "Month"  onchange = "this.form.submit()">

			<option value = "1" <?php if(isset($_POST['Month']) && $_POST['Month'] == '1')

					echo ' selected="selected"';?>>January</option>

			<option value = "2" <?php if(isset($_POST['Month']) && $_POST['Month'] == '2')

					echo ' selected="selected"';?>>February</option>

			<option value = "3" <?php if(isset($_POST['Month']) && $_POST['Month'] == '3')

					echo ' selected="selected"';?>>March</option>

			<option value = "4" <?php if(isset($_POST['Month']) && $_POST['Month'] == '4')

					echo ' selected="selected"';?>>April</option>

			<option value = "5" <?php if(isset($_POST['Month']) && $_POST['Month'] == '5')

					echo ' selected="selected"';?>>May</option>

			<option value = "6" <?php if(isset($_POST['Month']) && $_POST['Month'] == '6')

					echo ' selected="selected"';?>>June</option>

			<option value = "7" <?php if(isset($_POST['Month']) && $_POST['Month'] == '7')

					echo ' selected="selected"';?>>July</option>

			<option value = "8" <?php if(isset($_POST['Month']) && $_POST['Month'] == '8')

					echo ' selected="selected"';?>>August</option>

			<option value = "9" <?php if(isset($_POST['Month']) && $_POST['Month'] == '9')

					echo ' selected="selected"';?>>September</option>

			<option value = "10" <?php if(isset($_POST['Month']) && $_POST['Month'] == '10')

					echo ' selected="selected"';?>>October</option>

			<option value = "11" <?php if(isset($_POST['Month']) && $_POST['Month'] == '11')

					echo ' selected="selected"';?>>November</option>

			<option value = "12" <?php if(isset($_POST['Month']) && $_POST['Month'] == '12')

					echo ' selected="selected"';?>>December</option>

		</select>

		</td>

		</tr>







		<tr>

		<td  align = "right">Year:</td>

		<td  align = "left">

		<select name = "Year"  onchange = "this.form.submit()">

			<option value = "2014" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2014')

					echo ' selected="selected"';?>>2014</option>

			<option value = "2013" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2013')

					echo ' selected="selected"';?>>2013</option>

			<option value = "2012" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2012')

					echo ' selected="selected"';?>>2012</option>

			<option value = "2011" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2011')

					echo ' selected="selected"';?>>2011</option>

			<option value = "2010" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2010')

					echo ' selected="selected"';?>>2010</option>

			<option value = "2009" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2009')

					echo ' selected="selected"';?>>2009</option>

			<option value = "2008" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2008')

					echo ' selected="selected"';?>>2008</option>

			<option value = "2007" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2007')

					echo ' selected="selected"';?>>2007</option>

			<option value = "2006" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2006')

					echo ' selected="selected"';?>>2006</option>

			<option value = "2005" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2005')

					echo ' selected="selected"';?>>2005</option>

			<option value = "2004" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2004')

					echo ' selected="selected"';?>>2004</option>

			<option value = "2003" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2003')

					echo ' selected="selected"';?>>2003</option>

			<option value = "2002" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2002')

					echo ' selected="selected"';?>>2002</option>

			<option value = "2001" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2001')

					echo ' selected="selected"';?>>2001</option>

			<option value = "2000" <?php if(isset($_POST['Year']) && $_POST['Year'] == '2000')

					echo ' selected="selected"';?>>2000</option>

			<option value = "1999" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1999')

					echo ' selected="selected"';?>>1999</option>

			<option value = "1998" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1998')

					echo ' selected="selected"';?>>1998</option>

			<option value = "1997" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1997')

					echo ' selected="selected"';?>>1997</option>

			<option value = "1996" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1996')

					echo ' selected="selected"';?>>1996</option>

			<option value = "1995" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1995')

					echo ' selected="selected"';?>>1995</option>

			<option value = "1994" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1994')

					echo ' selected="selected"';?>>1994</option>

			<option value = "1993" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1993')

					echo ' selected="selected"';?>>1993</option>

			<option value = "1992" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1992')

					echo ' selected="selected"';?>>1992</option>

			<option value = "1991" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1991')

					echo ' selected="selected"';?>>1991</option>

			<option value = "1990" <?php if(isset($_POST['Year']) && $_POST['Year'] == '1990')

					echo ' selected="selected"';?>>1990</option>

		</select>

		</td>

		</tr>

		</table>

		<br></br>

		<div style = "text-align:center">

		</div>

		</form>



	<div id = "txtHint"></div>



	<br></br>







	<?php



	$DB_USER = DB_USER_jg;

	$DB_PASS = DB_PASS_jg;

	$DB_NAME = DB_NAME_jg;

	$DB_HOST = DB_HOST_jg;



	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);



	$Month_in = $newdb->get_row('SELECT month FROM date_ref_t',ARRAY_N);

	$Year_in  = $newdb->get_row('SELECT year FROM date_ref_t',ARRAY_N);





	if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')

	{

	$job_sector = $_POST['job_sector'];

	$Year = $_POST['Year'];

	$Month = $_POST['Month'];

	$type = $_POST['radio'];

	}

	else

	{

	$job_sector = "Total Nonfarm";

	$type = "yoy";

	$Month = (int)$Month_in[0];

	$Year  = (int)$Year_in[0];

	}









	if($type == "mom")

	{



	$type_out = "1 month change";

	$table = state_rankings_mom_t;

	$table_us = national_rankings_mom_t;



	$col_state_name = state_name;

	$col_rank = rank;

	$col_pct_change = pct_change;

	$col_job_growth = job_growth;

	$col_value = value;



	$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));

	$LastMonthName = date("F",mktime(0,0,0,$Month-1,date("d"),date("y")));



	$This_Year  = (int)$Year;

	$Last_Year  = date("Y",mktime(0,0,0,$Month-1,date("d"),$Year));

	$disclaimer = "Seasonally adjusted; figures for current month are preliminary and may be revised.";

	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': '.$MonthName.' '.$This_Year.' over '.$LastMonthName.' '.$Last_Year.' <p>';



	}



	elseif ($type == "yoy")

	{



	$type_out = "12 month change";

	$table = state_rankings_t;

	$table_us = national_rankings_t;



	$col_state_name = state_name;

	$col_rank = rank;

	$col_pct_change = pct_change;

	$col_job_growth = job_growth;

	$col_value = value;



	$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));

	$LastMonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));



	$This_Year  = (int)$Year;

	$Last_Year  = $This_Year-1;

	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";

	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': '.$MonthName.' '.$This_Year.' over '.$LastMonthName.' '.$Last_Year.' <p>';



	}

	elseif ($type == "ann")

	{

	$type_out = "Annual";

	$table = state_rankings_t;

	$table_us = national_rankings_t;


	$col_state_name = state_name;

	$col_rank = rank_ann;

	$col_pct_change = pct_change_ann;

	$col_job_growth = job_growth_ann;

	$col_value = value_ann_avg;


	$Month = 12;
	$Year = ($Year == $Year_in[0]) ? $Year - 1 : $Year;
	$MonthName = $Year;

	$This_Year  = (int)$Year;
	$Last_Year  = $This_Year-1;
	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";
	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': '.$This_Year.' over ' .$Last_Year.' <p>';


	}

	else

	{



	$Month_in = $newdb->get_row('SELECT month FROM date_ref_t',ARRAY_N);
	$Year_in  = $newdb->get_row('SELECT year FROM date_ref_t',ARRAY_N);



	$Month =  $Month_in[0];
	$Year  =  $Year_in[0];



	$type_out = "Year to date";

	$table = state_rankings_t;

    $table_us = national_rankings_t;



	$col_state_name = state_name;

	$col_rank = rank_ytd;

	$col_pct_change = pct_change_ytd;

	$col_job_growth = job_growth_ytd;

	$col_value = value_ytd_avg;



	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";

	$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));

	$LastMonthName = date("F",mktime(0,0,0,1,date("d"),date("y")));



	$This_Year  = (int)$Year;

	$Last_Year  = $This_Year-1;

	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': January Through '.$MonthName.' '.$This_Year.' over same period '.$Last_Year.' <p>';



	}





	$DB_USER = DB_USER_jg;

	$DB_PASS = DB_PASS_jg;

	$DB_NAME = DB_NAME_jg;

	$DB_HOST = DB_HOST_jg;

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);


 	$query = 'SELECT '.$col_state_name.', '.$col_rank.', FORMAT('.$col_pct_change.',2),
					FORMAT('.$col_job_growth.',2), FORMAT('.$col_value.',2)
					FROM '.$table.' WHERE industry_name = "'.$job_sector.'"
					AND Year = "'.$Year.'"
					AND Month = "'.$Month.'"
					UNION ALL
					      SELECT '.$col_state_name.', rank, FORMAT('.$col_pct_change.',2),
						FORMAT('.$col_job_growth.',2), FORMAT('.$col_value.',2)
						FROM '.$table_us.' WHERE industry_name = "'.$job_sector.'"
						AND industry_name <=> supersector_name
						AND Year = "'.$Year.'"
						AND Month = "'.$Month.'";';

	$rows = $newdb->get_results($query);



	$data_blurb = '<div class = "dataBlurb">
						<font size = "4">
							<div class = "sector">'.$type_out.' </div>
							<div class = "verticalLine"> '.$job_sector.' </div>
							<div class = "verticalLine">'.$MonthName.' </div>
						</font>
				   </div>';


	echo '<p align = "center"><em> '.$disclaimer.'  <br> Thousands of Jobs  <br> Source: U.S. Bureau of Labor Statistics </em><p>';

	echo '<br></br>';
	echo $data_blurb;



	echo '<br></br>';
	echo '<br></br>';







	echo '<table cellpadding = "2" cellspacing = "2" class = "job-growth" align = "center">';

	echo '<col style = "word-wrap:initial;" width = 200 />';

	echo '<col span = "5" />';

		echo '<thead><tr><th>State</th>

		  <th>Rank</th>

		  <th>% Change</th>

	          <th>Job Growth</th>

	          <th># of Jobs</th>

              </tr></thead><tbody>';



	foreach ( $rows as $rows )

	{

	echo '<tr>';

	foreach($rows as $key=>$value)

	{

	echo '<td>',$value,'</td>';

	}

	echo '</tr>';

	}

	echo '</tbody></table>';





        ?>











	<?php



	$content_css = '';

	$sidebar_css = '';

	if(get_post_meta($post->ID, 'pyre_full_width', true) == 'yes') {

		$content_css = 'width:100%';

		$sidebar_css = 'display:none';

	}

	elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {

		$content_css = 'float:right;';

		$sidebar_css = 'float:left;';

	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {

		$content_css = 'float:left;';

		$sidebar_css = 'float:right;';

	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default') {

		if($data['default_sidebar_pos'] == 'Left') {

			$content_css = 'float:right;';

			$sidebar_css = 'float:left;';

		} elseif($data['default_sidebar_pos'] == 'Right') {

			$content_css = 'float:left;';

			$sidebar_css = 'float:right;';

		}

	}

	if(class_exists('Woocommerce')) {

		if(is_cart() || is_checkout() || is_account_page() || (get_option('woocommerce_thanks_page_id') && is_page(get_option('woocommerce_thanks_page_id')))) {

			$content_css = 'width:100%';

			$sidebar_css = 'display:none';

		}

	}

	?>

	<div id="content" style="<?php echo $content_css; ?>">

		<?php

		global $query_string;

		query_posts($query_string);



		if(function_exists('barley_wrap_the_title') && current_user_can('edit_post') && is_page()):

			$wp_query = $backup_wp_query;

		endif;



		if(have_posts()): the_post();

		?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<span class="entry-title" style="display: none;"><?php the_title(); ?></span>

			<span class="vcard" style="display: none;"><span class="fn"><?php the_author_posts_link(); ?></span></span>

			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>

			<div class="image">

				<?php the_post_thumbnail('blog-large'); ?>

			</div>

			<?php endif; ?>

			<div class="post-content">

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

			</div>

			<?php if(class_exists('Woocommerce')): ?>

			<?php if($data['comments_pages'] && !is_cart() && !is_checkout() && !is_account_page() && !is_page(get_option('woocommerce_thanks_page_id'))): ?>

				<?php wp_reset_query(); ?>

				<?php comments_template(); ?>

			<?php endif; ?>

			<?php else: ?>

			<?php if($data['comments_pages']): ?>

				<?php wp_reset_query(); ?>

				<?php comments_template(); ?>

			<?php endif; ?>

			<?php endif; ?>

		</div>

		<?php endif; ?>

	</div>

	<div id="sidebar" style="<?php echo $sidebar_css; ?>"><?php generated_dynamic_sidebar();   ?></div>

<?php get_footer(); ?>