<?php

/*

Template Name: d3 test page

*/

get_header(); ?>

	<?php $wp_query = $backup_wp_query; ?>

<style type="text/css">
.background {
  fill: none;
  pointer-events: all;
}

#states {
  fill: #aaa;
}

#states .active {
  fill: orange;
}

#state-borders {
  fill: none;
  stroke: #fff;
  stroke-width: 1.5px;
  stroke-linejoin: round;
  stroke-linecap: round;
  pointer-events: none;
}

</style>


<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/datamaps.usa.js"></script>

<div id="container" style="position: relative; width: 800px; height: 1200px; margin:0 auto;"></div>





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