<?php

/*

Template Name: Job Growth Historical Tables Test

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

     
<script type="text/javascript" src="../js/table_enhancement.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hide_selects.js"></script>

	<form class = "action_form" method = "POST">
	<div id = "radio">

		<input type = "radio" id = "mom" value = "mom" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'mom') echo ' checked = "checked" ';?>  onchange = "this.form.submit()">

		<label for ="mom">1 month change</label>

		<input type = "radio" id = "yoy" value = "yoy" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'yoy') echo ' checked = "checked" ';?>  onchange = "this.form.submit()">

		<label for ="yoy">12 month change</label>

		<input type = "radio" id = "ann" value = "ann" name = "radio"  <?php if (isset($_POST['radio']) && $_POST['radio'] == 'yoy') echo ' checked = "checked" ';?>  onchange = "this.form.submit()">

		<label for ="ann">12 mos moving average</label>

	</div>

	<br></br>

	<div id = "form_list">
		<table>
<!-- 			<tr class = "row_state">
				<td> State: </td>
					<td>
					<select name = "statelist" class = "statelist">
					<?php
					    $value=$_POST ["statelist"];

						$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
						$fetch_state_name = $newdb->get_results('SELECT DISTINCT state_name FROM state_rankings ORDER BY state_name ASC;');
						echo '<optgroup label = "States">';
						if(!empty($fetch_state_name)) :
					    /** Loop through the $results and add each as a dropdown option */
					    	foreach($fetch_state_name as $result) :
					        	$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $result->state_name);
					    	endforeach;
					    	/** Output the dropdown */
					    	echo $options;
						    echo '</select>'."\n\n";
						echo '</optgroup>';
							endif;
						?>
			</td>
			</tr> -->

			<tr class = "row_area">
				<td> Area: </td>
				<td id = "arealist">
				<select name = "arealist" class = "arealist" onchange = "this.form.submit()">
					<?PHP
						$value=$_POST ["arealist"];
						$value_area = $_POST ["arealist"];

						$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
						$fetch_state_name = $newdb->get_results('SELECT DISTINCT state_name FROM state_rankings ORDER BY state_name ASC;');
						echo '<optgroup label = "States">';
						if(!empty($fetch_state_name)) :
					    /** Loop through the $results and add each as a dropdown option */
					    	foreach($fetch_state_name as $result) :
					        	$options1.= sprintf("\t".'<option value="States[%1$s]">%1$s</option>'."\n", $result->state_name);
					    	endforeach;
					    	/** Output the dropdown */
					    	echo $options1;
						echo '</optgroup>';
							endif;

						$fetch_area_name = $newdb->get_results('SELECT DISTINCT area_name FROM msa_rankings  WHERE area_name LIKE "%,%" ORDER BY area_name ASC;');
						echo '<optgroup label = "MSAs">';
						if(!empty($fetch_area_name)) :
					    /** Loop through the $results and add each as a dropdown option */
					    	foreach($fetch_area_name as $result) :
					        	$options2.= sprintf("\t".'<option value="MSAs[%1$s]">%1$s</option>'."\n", $result->area_name);
					    	endforeach;
					    	/** Output the dropdown */
					    	echo $options2;
					    	echo '</optgroup>';
						echo '</select>'."\n\n";

							endif;
					?>

				</td>
		</tr>

		<?PHP
			$option_group = explode('[', $value_area);
			$area_selected = explode(']', $option_group[1]);
		?>

		<tr class = "row_industry">
			<td> Industry: </td>
			<td>
			<select name = "industrylist" class = "industrylist" onchange = "this.form.submit()">
			<?php
			    $value=$_POST["industrylist"];
			    $table_name = '';

			    $newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);

			    if($option_group[0] == 'States'){
			    	$state_query = 'SELECT DISTINCT industry_name FROM state_rankings WHERE state_name = "'.$area_selected[0].'" ORDER BY industry_name ASC;';
			    	$fetch_industry_name = $newdb->get_results($state_query);
			    }else if($option_group[0] == 'MSAs'){
			    	$MSA_query = 'SELECT DISTINCT industry_name FROM msa_rankings WHERE area_name = "'.$area_selected[0].'" ORDER BY industry_name ASC;';
			    	$fetch_industry_name = $newdb->get_results($MSA_query);
			    }
			    			    
				if(!empty($fetch_industry_name)) :
			    /** Loop through the $results and add each as a dropdown option */
			    	$options = '';
			    	foreach($fetch_industry_name as $result) :
			        	$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $result->industry_name);
			    	endforeach;
			    	/** Output the dropdown */
			    	echo $options;
				    echo '</select>'."\n\n";
					endif;
				?>
			</td>
		</tr>

		<tr class = "row_month">
			<td> Month: </td>
			<td>
			<select name = "monthlist" class = "monthlist" onchange = "this.form.submit()">
			<?php
			    $value=$_POST["monthlist"];

				$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
				$fetch_year_name = $newdb->get_results('SELECT DISTINCT CAST(Month AS UNSIGNED) AS Month FROM state_rankings ORDER BY CAST(Month AS UNSIGNED) ASC;');

				if(!empty($fetch_year_name)) :
			    /** Loop through the $results and add each as a dropdown option */
			    	$options = '';
			    	foreach($fetch_year_name as $result) :
						$Month = $result->Month;
						$MonthName = date("F",mktime(0,0,0,$Month,date("d"),date("y")));
			    		$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $MonthName);

			    	endforeach;
			    	/** Output the dropdown */
			    	echo $options;
				    echo '</select>'."\n\n";
					endif;
				?>
			</td>
		</tr>
		</table>
		</form>
	</div>


	<br></br>
	<script type="text/javascript">
	  document.getElementsByClassName('monthlist')[0].value = "<?php echo $_POST['monthlist'];?>";
	  document.getElementsByClassName('arealist')[0].value = "<?php echo $_POST['arealist'];?>";
	  document.getElementsByClassName('industrylist')[0].value = "<?php echo $_POST['industrylist'];?>";
	  </script>

	<?php


	$DB_USER = DB_USER_jg;
	$DB_PASS = DB_PASS_jg;
	$DB_NAME = DB_NAME_jg;
	$DB_HOST = DB_HOST_jg;


	$areas = $_POST['arealist'];
	$area_type = strstr($areas, '[', true);

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);

	$area1 = strstr($areas, ']', true);
	$area = substr($area1, strpos($area1, '[') + 1);

	$Month_in = $newdb->get_row('SELECT month FROM date_ref_t',ARRAY_N);
	$Year_in  = $newdb->get_row('SELECT year FROM date_ref_t',ARRAY_N);


	if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	{

	$job_sector = $_POST['industrylist'];
	$Month = $_POST['monthlist'];
	$Month = (int)date('m', strtotime($Month));
	$type = $_POST['radio'];
		if("" == trim($type))
		{
	    	$type = 'yoy';
		}

	}
	else
	{

	$job_sector = "Total Nonfarm";
	$type = "yoy";
	$area = "Arizona";
	$col_state_name = "state_name";
	$table = "state_rankings";
	$Month = (int)$Month_in[0];
	$Year  = (int)$Year_in[0];
	}



	$MonthName = date("F",mktime(0,0,0,$Month, 10));

	if($type == "mom")
	{

	$type_out = "1 month change";
	$col_state_name = state_name;
	$col_rank = rank;
	$col_pct_change = pct_change;
	$col_job_growth = job_growth;
	$col_value = value;
	$disclaimer = "Seasonally adjusted; figures for current month are preliminary and may be revised.";

	}

	elseif ($type == "yoy")
	{

	$type_out = "12 month change";
	$col_state_name = state_name;
	$col_rank = rank;
	$col_pct_change = pct_change;
	$col_job_growth = job_growth;
	$col_value = value;
	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";

	}

	elseif($type == "ann")
	{

	$type_out = "12 mos moving average";
	$col_state_name = state_name;
	$col_rank = rank_ann;
	$col_pct_change = pct_change_ann;
	$col_job_growth = job_growth_ann;
	$col_value = value_ann_avg;
	$disclaimer = "Not seasonally adjusted; figures for current month are preliminary and may be revised.";

	}

	if($area_type == "States")
	{
		if($type == "mom")
		{
		$table = "state_rankings_mom";
		} else {
			$table = "state_rankings";
		}
	}
	elseif ($area_type == "MSAs")
	{
		$col_state_name = area_name;
		if($type == "mom")
		{
		$table = "msa_rankings_mom";
		} else {
			$table = "msa_rankings";
		}
	}




	$data_blurb = '<div class = "dataBlurb">
						<font size = "4">
							<div class = "sector">'.$type_out.' </div>
							<div class = "verticalLine"> '.$area.' </div>
							<div class = "verticalLine"> '.$job_sector.' </div>
							<div class = "verticalLine">'.$MonthName.' </div>
						</font>
				   </div>';



	$query = 'SELECT Year, '.$col_rank.', FORMAT('.$col_pct_change.',2),
					FORMAT('.$col_job_growth.',2), FORMAT('.$col_value.',2)
					FROM '.$table.' WHERE industry_name = "'.$job_sector.'"
					AND '.$col_state_name.' = "'.$area.'"
					AND Month = "'.$Month.'" LIMIT 10000 OFFSET 2;';

	$rows_main = $newdb->get_results($query);

	echo '<p align = "center"><em> '.$disclaimer.'  <br> Thousands of Jobs  <br> Source: U.S. Bureau of Labor Statistics </em><p>';
	echo '<br></br>';

	echo $data_blurb;
	echo '<br></br>';
	echo '<br></br>';

	echo '<table class = "job-historical-tables" align = "center">';
	echo '<col style = "word-wrap:initial;" width = 200 />';
	echo '<col span = "5" />';
		echo '<thead><tr><th>Year</th>
		  <th>Rank</th>
		  <th>% Change</th>
	          <th>Job Growth</th>
	          <th># of Jobs</th>
              </tr></thead><tbody>';

	foreach ( $rows_main as $rows )
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