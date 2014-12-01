<?php

/*

Template Name: States Consensus

*/

get_header(); ?>





	<script type = "text/javascript">table_enhancement();</script>



	<?php



	$day   = 1;

	$Month = date("F",mktime(0,0,0,date("m"),date("d"),date("y")));

	$Year  = date("Y",mktime(0,0,0,date("m"),date("d"),date("y")));



	echo '<h1 align = "center"> Forecast Released '.$Month.' '.$day.', '.$Year.'</h1>';




	$state = basename($_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]).PHP_EOL;

	$state = preg_replace('/\s+/',' ',$state);





	$DB_USER = DB_USER_wbc;

	$DB_PASS = DB_PASS_wbc;

	$DB_NAME = DB_NAME_wbc;

	$DB_HOST = DB_HOST_wbc;





	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);



	$rows = $newdb->get_results( 'SELECT States, FORMAT(Q1A1,1), FORMAT(Q2A1,1), FORMAT(Q3A1,1),

					 FORMAT(Q4A1,1), FORMAT(Q5A1,1)

					FROM wbc_deployment WHERE Organization = "Consensus" ORDER BY

 					States ASC;');







	$test = mysql_num_rows($rows);

	echo $test;





	echo '<table cellpadding = "2" id = "state-db-tables" cellspacing = "2" class = "state-db-tables" align = "center">';

	echo '<col style = "word-wrap:initial;" width = 250 />';

	echo '<col span = "5" />';



	echo '<caption> 2014 Forecasts Annual Percentage Change</caption>';

	echo '<thead><tr>

		  <th></th>

		  <th>Current Personal Income</th>

		  <th>Retail Sales</th>

	          <th>Wage & Salary Employment</th>

	          <th>Population Growth</th>

	          <th>Single-Family Housing Permits</th>

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









	$rows = $newdb->get_results( 'SELECT States, FORMAT(Q1A2,1), FORMAT(Q2A2,1), FORMAT(Q3A2,1),

					 FORMAT(Q4A2,1), FORMAT(Q5A2,1)

					FROM wbc_deployment WHERE Organization = "Consensus" ORDER BY

 					States ASC;');





	echo '<br></br>';

	echo '<br></br>';

	echo '<table cellpadding = "2" id = "state-db-tables" cellspacing = "2" class = "state-db-tables" align = "center">';

	echo '<col style = "word-wrap:initial;" width = 250 />';

	echo '<col span = "5" />';



	echo '<caption> 2015 Forecasts Annual Percentage Change</caption>';

	echo '<thead><tr><th></th>

		  <th>Current Personal Income</th>

		  <th>Retail Sales</th>

	          <th>Wage & Salary Employment</th>

	          <th>Population Growth</th>

	          <th>Single-Family Housing Permits</th>

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

	<div id="sidebar" style="<?php echo $sidebar_css; ?>"><?php generated_dynamic_sidebar(); ?></div>

<?php get_footer(); ?>