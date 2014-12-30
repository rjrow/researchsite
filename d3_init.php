<?php

/*

Template Name: d3 test page

*/

get_header(); ?>

	<?php $wp_query = $backup_wp_query; ?>

<link  rel="stylesheet" href="http://research.wpcarey.asu.edu/seidman/wp-content/themes/Avada/js/c3/c3.css" type="text/css"/>

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

<script src="<?php bloginfo('template_url');?>/js/underscore.js"></script>
<script src="<?php bloginfo('template_url');?>/js/c3/c3.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/datamaps.usa.js"></script>
<script src="<?php bloginfo('template_url');?>/js/miso.ds.0.4.1.js"></script>


	<div id = "form_list">
		<table>

		<tr class = "row_industry">
			<td> Industry: </td>
			<td>
			<select name = "industrylist" class = "industrylist" onchange = "updateIndustry(this.value)">
			<?php
			    $value=$_POST["industrylist"];

				$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
				$fetch_industry_name = $newdb->get_results('SELECT DISTINCT supersector_name FROM state_rankings ORDER BY supersector_name ASC;');

				if(!empty($fetch_industry_name)) :
			    /** Loop through the $results and add each as a dropdown option */
			    	$options = '';
			    	foreach($fetch_industry_name as $result) :
			        	$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $result->supersector_name);
			    	endforeach;
			    	/** Output the dropdown */
			    	echo $options;
				    echo '</select>'."\n\n";
					endif;
				?>
			</td>
		</tr>
		</table>


<div id="container" style="position: relative; width: 800px; height: 400px; margin:0 auto;"></div>
<div id="chart5" ></div>

<script>


function updateIndustry(value)
{
	d3.json("<?php bloginfo('template_url');?>/data/current_base_states.json", function(error, csvdata1)
	{
		json = csvdata1;
		console.log(json);
		json_select = json[value];
		map.updateChoropleth(json_select);
	});
}




//Function used to build hierarchies with
function genJSON(csvData, groups) {

  var genGroups = function (data) {
    return _.map(data, function(element, index) {
      return { name : index, children : element };
    });
  };

  var nest = function (node, curIndex) {
    if (curIndex === 0) {
      node.children = genGroups(_.groupBy(csvData, groups[0]));
      _.each(node.children, function (child) {
        nest(child, curIndex + 1);
      });
    }
    else {
      if (curIndex < groups.length) {
        node.children = genGroups(
          _.groupBy(node.children, groups[curIndex])
        );
        _.each(node.children, function (child) {
          nest(child, curIndex + 1);
        });
      }
    }
    return node;
  };
  return nest({}, 0);
}
// Load in dataset with new dataset library for javascript

var data;

var map = new Datamap({
    element: document.getElementById('container'),
    scope: 'usa',
    data: {},
    fills : {

                '1-10': '#0B486B',
                '11-20': '#3B8686',
                '21-30': '#79BD9A',
                '31-40': '#A8DBA8',
                '41-50': '#CFF09E',
                defaultFill: 'grey'},
    geographyConfig: {
            popupTemplate: function(geo, data) {
                if ( !data ) return;
                return '<div class = "hoverinfo" ><strong>' +
                          '<p style = "text-align:center; font-weight: bolder; text-decoration: underline;">' +
                          geo.properties.name + '</p>' +
                         'Rank: ' + data.rank + '<br>' +
                         'Jobs: ' + data.jobs + '<br>' +
                         'Job Growth: ' + data.job_growth +
                    '</strong></div>';
            }, highlightBorderWidth : 3
        }
});
map.legend();


	d3.json("<?php bloginfo('template_url');?>/data/current_base_states.json", function(error, csvdata1)
	{
		json = csvdata1;
		json_select = json['Total Nonfarm'];
		map.updateChoropleth(json_select);
	});


	d3.json("<?php bloginfo('template_url');?>/data/current_base_states_ts.json", function(error, csvdata1)
	{
		json = csvdata1;
		console.log(json);
	});


</script>
<br></br>
<br></br>

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