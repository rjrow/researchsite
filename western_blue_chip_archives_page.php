<?php

/*

Template Name: WBC Archives

*/

get_header(); ?>

	<?php $wp_query = $backup_wp_query; ?>





  	<p> Month </p>

	<form method = "post">

	<select name = "Month" value = "">

			<option selected = "selected">--</option>

			<option value = "January"> January</option>

			<option value = "February"> February</option>

			<option value = "March"> March</option>

			<option value = "April"> April</option>

			<option value = "May"> May</option>

			<option value = "June"> June</option>

			<option value = "July"> July</option>

			<option value = "August"> August</option>

			<option value = "September"> September</option>

			<option value = "October"> October</option>

			<option value = "November"> November</option>

			<option value = "December"> December</option>

	</select>











	<p> Year </p>

	<select name = "Year" value = "">

		<option selected = "selected">--</option>

		<option value = "2001"> 2001</option>

		<option value = "2002"> 2002</option>

		<option value = "2003"> 2003</option>

		<option value = "2004"> 2004</option>

		<option value = "2005"> 2005</option>

		<option value = "2006"> 2006</option>

		<option value = "2007"> 2007</option>

		<option value = "2008"> 2008</option>

		<option value = "2009"> 2009</option>

		<option value = "2010"> 2010</option>

		<option value = "2011"> 2011</option>

		<option value = "2012"> 2012</option>

		<option value = "2013"> 2013</option>

		<option value = "2014"> 2014</option>

	</select>

	<input type = "submit"/>

	</form>





	<?php







	function url_file_exists($url) {
	    $context  = stream_context_create(array('http' =>array('method'=>'HEAD')));
	    $fd = @fopen($url, 'rb', false, $context);
	    if ($fd!==false) {
	       fclose($fd);
	       return true;
	    }
	    return false;
	}




	function viewPDF($Dir, $Month, $Year)

	{

		$file = $Dir.'/wbcArchive/'.$Month.$Year.'.pdf';

		if (url_file_exists($file))
		{
		echo '<script>window.location = "'.$file.'";</script>';
		}
		else
		{
		echo '<h3 align = "center"> We were unable to find the selected file, we will be uploading it soon</h3>';
		}

	}





	$Month = $_POST['Month'];

	$Year  = $_POST['Year'];

	$Dir   = get_template_directory_uri();



	if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && ($Year != "--" && $Month != "--"))

	{

	viewPDF($Dir, $Month, $Year);

	}

#	else

#	{

#	echo '<script>alert('Please Enter the Month and Year for archives to be retrieved');</script>';

#	}





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