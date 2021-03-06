<?php
// Template Name: d3 test
get_header(); ?>

    <style type="text/css">

div.tooltip {
  position: absolute;
  text-align: center;
  width: 60px;
  height: 12px;
  padding: 8px;
  font: 10px sans-serif;
  background: #ddd;
  border: solid 1px #aaa;
  border-radius: 8px;
  pointer-events: none;
}

    </style>


<script type="text/javascript">

var w = 960,
    h = 500;

var svg = d3.select("body").append("svg:svg")
    .attr("width", w)
    .attr("height", h);

svg.append("svg:g")
    .attr("transform", "translate(480,50)rotate(60)scale(2)")
  .append("svg:rect")
    .attr("width", 140)
    .attr("height", 140)
    .on("mouseover", mouseover)
    .on("mousemove", mousemove)
    .on("mouseout", mouseout);

var div = d3.select("body").append("div")
    .attr("class", "tooltip")
    .style("opacity", 1e-6);

function mouseover() {
  div.transition()
      .duration(500)
      .style("opacity", 1);
}

function mousemove() {
  div
      .text(d3.event.pageX + ", " + d3.event.pageY)
      .style("left", (d3.event.pageX - 34) + "px")
      .style("top", (d3.event.pageY - 12) + "px");
}

function mouseout() {
  div.transition()
      .duration(500)
      .style("opacity", 1e-6);
}

    </script>




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