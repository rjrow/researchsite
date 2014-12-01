<?php

// Template Name: Job Growth Current

get_header(); ?>



<script type="text/javascript" src="/js/table_enhancement.js"></script>
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
					{"type": "numeric-comma", targets : 4}
					],
					"bAutoWidth"   : false,
					"bPaginate" : false,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"stripeClasses" : ['zebra'],
					"sDom": 't',
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


  <script>
       $(function(){
	  $("#radio").buttonset();
	});
  </script>







     <form method = "post" name = "main_form">

	<div id = "radio">

		<input type = "radio" id = "mom" value = "mom" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'mom') echo ' checked = "checked" ';?> onchange="this.form.submit()">

		<label for ="mom">1 month change</label>

		<input type = "radio" id = "yoy" value = "yoy" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'yoy') echo ' checked = "checked" ';?> onchange="this.form.submit()">

		<label for ="yoy">12 month change</label>

		<input type = "radio" id = "ytd" value = "ytd" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'ytd') echo ' checked = "checked" ';?> onchange="this.form.submit()">

		<label for ="ytd">Year to date</label>

		<input type = "radio" id = "ann" value = "ann" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'ann') echo ' checked = "checked" ';?> onchange="this.form.submit()">

		<label for ="ann">Prior Year</label>






	<br></br>

	<div id = "select">
	<table>
	<tr>
	<td align = "right">Job Sector:</td>
	<td align = "left">
	<select name = "job_sector"  id = "job_select" name = "job_selection"  onchange="this.form.submit()">
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
			<option value =  "Arts-Entertainment-Recreation"<?php if(isset($_POST['job_sector']) && $_POST['job_sector'] == 'Arts-Entertainment-Recreation')
					echo ' selected="selected"';?>>Arts-Entertainment-Recreation</option>
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

	</table>

	</div>

	</div>

		<br></br>

		<div style = "text-align:center">

		</div>

	</form>



	<br></br>





	<?php

	$DB_USER = DB_USER_jg;

	$DB_PASS = DB_PASS_jg;

	$DB_NAME = DB_NAME_jg;

	$DB_HOST = DB_HOST_jg;



	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);



	$Month_in = $newdb->get_row('SELECT month FROM date_ref_t',ARRAY_N);

	$Year_in  = $newdb->get_row('SELECT year FROM date_ref_t',ARRAY_N);




	$Month =  $Month_in[0];


	$Year  =  $Year_in[0];





	if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')

	{

	$job_sector = $_POST['job_sector'];

	$type = $_POST['radio'];

	}

	else

	{

	$job_sector = "Total Nonfarm";

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





	$disclaimer = "Seasonally adjusted; figures for current month are preliminary and may be revised.";

	$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));

	$LastMonthName = date("F",mktime(0,0,0,$Month-1,date("d"),date("y")));



	$This_Year  = (int)$Year;

	$Last_Year  = date("Y",mktime(0,0,0,$Month-1,date("d"),date("y")));

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



	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";
	$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));
	$LastMonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));



	$This_Year  = (int)$Year;
	$Last_Year  = $This_Year-1;
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
	$Year = $Year - 1;
	$MonthName = $Year;

	$This_Year  = (int)$Year;
	$Last_Year  = $This_Year-1;
	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";
	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': '.$This_Year.' over ' .$Last_Year.' <p>';


	}

	else

	{

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
	$data_blurb = '<p align = "center">'.$job_sector.' '.$type_out.': January through '.$MonthName.' '.$This_Year.' over same period '.$Last_Year.' <p>';



}


	$rows = $newdb->get_results( 'SELECT '.$col_state_name.', '.$col_rank.', FORMAT('.$col_pct_change.',2),
					FORMAT('.$col_job_growth.',2), FORMAT('.$col_value.',2)
					FROM '.$table.' WHERE industry_name = "'.$job_sector.'"
					AND Year = "'.$Year.'"
					AND Month = "'.$Month.'"  UNION ALL
					      SELECT '.$col_state_name.', rank, FORMAT('.$col_pct_change.',2),
						FORMAT('.$col_job_growth.',2), FORMAT('.$col_value.',2)
						FROM '.$table_us.' WHERE industry_name = "'.$job_sector.'"
						AND Year = "'.$Year.'"
						AND Month = "'.$Month.'";');


	$data_blurb = '<div class = "dataBlurb">
						<font size = "4">
							<div class = "sector">'.$type_out.' </div>
							<div class = "verticalLine"> '.$job_sector.' </div>
							<div class = "verticalLine">'.$MonthName.' </div>
						</font>
				   </div>';


	echo '<p align = "center"><em> '.$disclaimer.' <br> Thousands of Jobs <br> Source: U.S. Bureau of Labor Statistics </br></em><p>';
	echo '<br></br>';

	echo $data_blurb;

	echo '<br></br>';
	echo '<br></br>';





	echo '<div id = "data">';

	echo '<table class = "job-growth" align = "center">';

	echo '<col style = "word-wrap:initial;" width = 940 />';

	echo '<col span = "5" />';

	echo '<thead><tr>

		<th>State</th>

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

	echo'</div>';





    ?>



	<div id="content" class="full-width">

		<?php while(have_posts()): the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<span class="entry-title" style="display: none;"><?php the_title(); ?></span>

			<span class="vcard" style="display: none;"><span class="fn"><?php the_author_posts_link(); ?></span></span>

			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>

			<div class="image">

				<?php the_post_thumbnail('full'); ?>

			</div>

			<?php endif; ?>

			<div class="post-content">

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

			</div>

			<?php if($data['comments_pages']): ?>

				<?php wp_reset_query(); ?>

				<?php comments_template(); ?>

			<?php endif; ?>

		</div>

		<?php endwhile; ?>

	</div>

<?php get_footer(); ?>