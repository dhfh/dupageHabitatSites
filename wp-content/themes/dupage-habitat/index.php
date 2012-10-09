<?php get_header(); ?>

        	<section class="main">
            <?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
            <?php 
				$pageHeader = apply_filters('the_content',get_post_meta($post->ID, '_dphfh-page-header', true)); 
				$pageFooter = apply_filters('the_content',get_post_meta($post->ID, '_dphfh-page-footer', true));
			?>
            	<?php if ($pageHeader != '') : ?>
            		<aside class="before"><?php echo $pageHeader; ?></aside>
                <?php endif; ?>
                <article>
                	<hgroup><?php echo apply_filters('dphfh_page_title',get_the_title()); ?></hgroup>
                    <div><?php the_content(); ?></div>
                </article>
                <?php if ($pageFooter != '') : ?>
            		<aside class="after"><?php echo $pageFooter; ?></aside>
                <?php endif; ?>
            <?php endwhile; endif; ?>
            </section>
            <section class="side"><?php dynamic_sidebar('Sidebar'); ?></section>

<?php get_footer(); ?>