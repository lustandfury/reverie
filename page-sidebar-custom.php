<?php 
/*
Template Name: Custom Sidebar Nav
*/
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content-sidebar" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<!--	<?php reverie_entry_meta(); ?> -->
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
		</article>
<?php endwhile; // End the loop ?>

	</div>
		<div id="sidebar" class="small-12 large-4 columns">
			<h3>Therapy Options</h3>
			<?php
				  if($post->post_parent)
				  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
				  else
				  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				  if ($children) { ?>
				  <ul>
				  <?php echo $children; ?>
				  </ul>
			 <?php } ?>
		</div>
<?php get_footer(); ?>