<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>


<div id="content">

	<div id="featurebanner"><?php the_post_thumbnail( 'page-feature' ); ?></div>

	<div id="contentleft">
	
		<div class="postarea">
							
			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('select_categories_blog'),'showposts'=>of_get_option('number_display_blog'),'paged'=>$paged)); ?>
			<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php global $more; $more = 0; ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				
                <div class="postauthor">
            		<p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), __("% Comments", 'organicthemes')); ?></a>&nbsp;<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?></p>
                </div>
            
            <?php the_content(__("Read More", 'organicthemes')); ?><div style="clear:both;"></div>
            				
			<div class="meta">
				<p><?php _e("Category:", 'organicthemes'); ?> <?php the_category(', ') ?> &middot; <?php _e("Tags:", 'organicthemes'); ?> <?php the_tags('') ?></p>
			</div>
							
			<?php endwhile; ?>
			
			<div id="prevLink"><p><?php previous_posts_link(); ?></p></div>
			<div id="nextLink"><p><?php next_posts_link(); ?></p></div>
            
            <?php else : // do not delete ?>

            <h3><?php _e("Page not Found", 'organicthemes'); ?></h3>
            <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
            <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>

			<?php endif; // do not delete ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>