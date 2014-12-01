<?php

/*

Template Name: Job Growth Regional

*/

get_header(); ?>

	<?php $wp_query = $backup_wp_query; ?>

	<form method = "post">

	<table>

		<tr>

		<td align = "right">Job Sector:</td>

		<td align = "left">

		<select name = "job_sector">

			<option value = "Total Nonfarm" selected="selected">Total Nonfarm</option>

			<option value = "Total Private"> Total Private</option>

			<option value = "Goods Producing"> Goods Producing</option>

			<option value = "Service-Providing"> Service-Providing</option>

			<option value = "Private Service Providing"> Private Service Providing</option>

			<option value = "Construction and Mining"> Construction and Mining</option>

			<option value = "Natural Resources and Mining"> 	Natural Resources and Mining</option>

			<option value = "Construction"> 	Construction</option>

			<option value = "Manufacturing"> Manufacturing</option>

			<option value = "Durable Goods"> 	Durable Goods</option>

			<option value = "Non-Durable Goods"> 	Non-Durable Goods</option>

			<option value = "Trade-Transportation-Utilities"> Trade-Transportation-Utilities</option>

			<option value = "Trade"> 	Trade</option>

			<option value = "Wholesale Trade"> 	Wholesale Trade</option>

			<option value = "Retail Trade"> 	Retail Trade</option>

			<option value = "Transportation-Warehousing-Utilities"> 	Transportation-Warehousing-Utilities</option>

			<option value = "Utilities"> 	Utilities</option>

			<option value = "Transportation-Warehousing"> 	Transportation-Warehousing</option>

			<option value = "Information"> Information</option>

			<option value = "Financial Activities"> Financial Activities</option>

			<option value = "Finance and Insurance"> 	Finance and Insurance</option>

			<option value = "Real Estate and Rental and Leasing"> 	Real Estate and Rental and Leasing</option>

			<option value = "Professional and Business Services"> Professional and Business Services</option>

			<option value = "Professional-Scientific-Technical"> 	Professional-Scientific-Technical </option>Services

			<option value = "Admin. and Support and Waste Mgmt and Remediation Services"> 	Admin. and Support and Waste Mgmt and Remediation</option>

			<option value = "Management of Companies and Enterprises"> 	Management of Companies and Enterprises</option>

			<option value = "Educational and Health Services"> Educational and Health Services</option>

			<option value = "Educational Services"> 	Educational Services</option>

			<option value = "Health Care and Social Assistance"> 	Health Care and Social Assistance</option>

			<option value = "Leisure and Hospitality"> Leisure and Hospitality</option>

			<option value = "Accommodation and Food Services"> 	Accommodation and Food Services</option>

			<option value = "Arts-Entertainment-Recreation"> 	Arts-Entertainment-Recreation</option>

			<option value = "Other Services"> Other Services</option>

			<option value = "Government"> Government</option>

			<option value = "Federal Government"> 	Federal Government</option>

			<option value = "State Government"> 	State Government</option>

			<option value = "Local Government"> 	Local Government</option>

		</select>

		</td>

		</tr>





		<tr>

		<td align = "right">Month:</td>

		<td align = "left">

		<select name = "Month">



			<option value = "1" selected = "selected">January</option>

			<option value = "2">February</option>

			<option value = "3">March</option>

			<option value = "4">April</option>

			<option value = "5">May</option>

			<option value = "6">June</option>

			<option value = "7">July</option>

			<option value = "8">August</option>

			<option value = "9">September</option>

			<option value = "10">October</option>

			<option value = "11">November</option>

			<option value = "12">December</option>

		</select>

		</td>

		</tr>


		<tr>

		<td align = "right">Year:</td>

		<td align = "left">

		<select name = "Year">

			<option selected= "selected">2014</option>

			<option value = "2013">2013</option>

			<option value = "2012">2012</option>

			<option value = "2011">2011</option>

			<option value = "2010">2010</option>

			<option value = "2009">2009</option>

			<option value = "2008">2008</option>

			<option value = "2007">2007</option>

			<option value = "2006">2006</option>

			<option value = "2005">2005</option>

			<option value = "2004">2004</option>

			<option value = "2003">2003</option>

			<option value = "2002">2002</option>

			<option value = "2001">2001</option>

			<option value = "2000">2000</option>

			<option value = "1999">1999</option>

			<option value = "1998">1998</option>

			<option value = "1997">1997</option>

			<option value = "1996">1996</option>

			<option value = "1995">1995</option>

			<option value = "1994">1994</option>

			<option value = "1993">1993</option>

			<option value = "1992">1992</option>

			<option value = "1991">1991</option>

			<option value = "1990">1990</option>

		</select>

		</td>

		</tr>

		</table>

		<br></br>

		<div style = "text-align:center">

		<input type="submit" value='Submit'>

		</div>

		</form>



	<br></br>









	<?php





	if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')

	{

	$job_sector = $_POST['job_sector'];

	$Year = $_POST['Year'];

	$Month = $_POST['Month'];

	}

	else

	{

	$job_sector = "Total Nonfarm";

	$Year = (string)date('Y');

	$Month = (int)date('m') - 2;

	$Month = (string)$Month;

	}







	$DB_USER = "eocmaster";

	$DB_PASS = "eocseidman";

	$DB_NAME = "eocdb";

	$DB_HOST = "eoc.cgzanv6lfrne.us-west-2.rds.amazonaws.com";

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);



		$rows = $newdb->get_results( 'SELECT region, rank, FORMAT(pct_change,2), FORMAT(job_growth,2), FORMAT(value,2)

					FROM region_rankings WHERE industry_name = "'.$job_sector.'"

					AND industry_name <=> supersector_name

					AND Year = "'.$Year.'"

					AND Period = "'.$Month.'" ORDER BY rank;');







	echo '<table cellpadding = "2" cellspacing = "2" class = "job-growth" align = "center">';

	echo '<col style = "word-wrap:initial;" width = 150 />';

	echo '<col span = "5" />';

		echo '<thead><tr><th>Region</th>

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



	header('Location: http://www.research.wpcarey.asu.edu');





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