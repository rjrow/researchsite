<?php 
/*
Template Name: WBC Historical Wyoming Data
*/
get_header(); ?>

	
	<script type = "text/javascript">table_enhancement();</script>

	<?php 
	
	$state = basename($_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]).PHP_EOL;
	$state = preg_replace('/\s+/',' ',$state);
	$state = trim($state);

	$DB_USER = DB_USER_wbc;
	$DB_PASS = DB_PASS_wbc;
	$DB_NAME = DB_NAME_wbc;
	$DB_HOST = DB_HOST_wbc;

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
	
	$rows = $newdb->get_results( 'SELECT row_type, Q1, Q3, Q4, Q5 FROM wyoming_historical;');

	echo '<table id = "state-db-tables" class = "historical-state-db-tables-idaho-montana-wyoming" align = "center">';
	echo '<thead><tr><th></th>
		  <th>Personal Income ($ millions)</th>
		  <th>Wage & Salary Employment (thousands)</th>
	          <th>Population (thousands)</th>
	          <th>Single-family Permits (number)</th>
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