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

       $(function(){
		$("#radio").buttonset();
			       });

  </script>


     <form method = "post" name = "main_form">

	<div id = "radio">

		<input type = "radio" id = "mom" value = "mom" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'mom') echo ' checked = "checked" ';?> >

		<label for ="mom">1 month change</label>

		<input type = "radio" id = "yoy" value = "yoy" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'yoy') echo ' checked = "checked" ';?> >

		<label for ="yoy">12 month change</label>

		<input type = "radio" id = "ytd" value = "ytd" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'ytd') echo ' checked = "checked" ';?> >

		<label for ="ytd">Year to date</label>

		<input type = "radio" id = "ann" value = "ann" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'ann') echo ' checked = "checked" ';?> >

		<label for ="ann">Prior Year</label>
	
	<script type="text/javascript">document.getElementById('yoy').checked = true;</script>

	<br></br>

	<div id = "select">
	<table>
	<tr>
	<td align = "right">Job Sector:</td>
	<td align = "left">
	<select name = "job_sector"  id = "job_select" name = "job_selection" class = "jobselection" > <!-- onchange="this.form.submit()"-->
			<?php
			    $value=$_POST["job_sector"];
			    $table_name = '';

			    $newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);

			    	$state_query = 'SELECT DISTINCT industry_name as name FROM state_rankings WHERE state_name = "Arizona" ORDER BY
			    					FIELD(name, "Total Nonfarm", "Total Private", "Government","Goods Producing",
			    						"Manufacturing","Durable Goods","Fabricated Metal Product Manufacturing",
			    						"Computer and Electronic Product Manufacturing","Aerospace Product and Parts Manufacturing",
			    						"Non-Durable Goods","Metal Ore Mining","Mining and Logging","Construction",
			    						"Construction of Buildings","Heavy and Civil Engineering Construction","Specialty Trade Contractors",
			    						"Service-Providing","Private Service Providing","Trade, Transportation, and Utilities","Wholesale Trade","Retail Trade",
			    						"Motor Vehicle and parts Dealers","Furniture and Home Furnishings Stores",
			    						"Building Material and Garden Equipment and Supplies Dealers","Food and Beverage Stores",
			    						"Clothing and Clothing Accessories Stores","General Merchandise Stores","Department Stores",
			    						"Other General Merchandise Stores","Transportation and Warehousing","Air Transportation","Truck Transportation",
			    						"Transportation and Utilities","Utilities","Information","Telecommunications","Financial Activities","Finance and Insurance",
			    						"Credit Intermediation and Related Activities, and Monetary Authorities","Insurance Carriers and Related Activities, and Funds & Trusts",
			    						"Securities, Commodity Contracts, and Other Financial Investments and Related Activities","Real Estate and Rental and Leasing",
			    						"Professional and Business Services","Professional, Scientific, and Technical Services","Management of Companies and Enterprises",
			    						"Administrative and Support and Waste Management and Remediation Services","Employment Services","Business Support Services",
			    						"Services to Buildings and Dwellings","Education and Health Services","Educational Services","Health Care and Social Assistance",
			    						"Ambulatory Health Care Services","Hospitals","Nursing and Residential Care Facilities","Social Assistance",
			    						"Leisure and Hospitality","Arts, Entertainment, and Recreation","Accommodation and Food Services","Accommodation",
			    						"Food Services and Drinking Places","Other Services","Government","Federal Government","State Government","State Government Educational Services",
			    						"Local Government","Local Government Educational Services");';
			    	$fetch_industry_name = $newdb->get_results($state_query);

				if(!empty($fetch_industry_name)) :
			    /** Loop through the $results and add each as a dropdown option */
			    	$options = '';
			    	foreach($fetch_industry_name as $result) :
			        	$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $result->name);
			    	endforeach;
			    	/** Output the dropdown */
			    	echo $options;
				    echo '</select>'."\n\n";
					endif;
				?>
	</select>
	</td>
	</tr>
	</table>
	</div>
	

		<br></br>
		<div style = "text-align:center">
		</div>

		<center>
			<input type = "button" value = "Submit" onclick = "this.form.submit()"/>
		</center>
	</form>

	<br></br>

	<script type="text/javascript">
	  document.getElementsByClassName('jobselection')[0].value = "<?php echo $_POST['job_sector'];?>";
	</script>




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
						FROM '.$table_us.' WHERE industry_name = "'.$job_sector.'" AND industry_name <=> supersector_name
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