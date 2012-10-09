<?php get_header(); ?>

        	<section class="main">
            <?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
            <?php 
				$tabs = get_pages(array(
					'child_of'=>get_the_ID(),
					'sort_column'=>'menu_order',
					'sort_order'=>'asc'
				));
			
				$pageHeader = apply_filters('the_content',get_post_meta($post->ID, '_dphfh-page-header', true)); 
				$pageFooter = apply_filters('the_content',get_post_meta($post->ID, '_dphfh-page-footer', true));
			?>
            	<?php if ($pageHeader != '') : ?>
            		<aside class="before"><?php echo $pageHeader; ?></aside>
                <?php endif; ?>
                
                <article class="dphfh-page-tabs-parent-article">
                	<hgroup><?php echo apply_filters('dphfh_page_title',get_the_title()); ?></hgroup>
                    <div><?php the_content(); ?></div>
                </article>
                
                <div id="dphfh-page-tabs">
                    <ul>
                        <?php foreach ($tabs as $tab) : ?>
                        <li><a href="#<?php echo $tab->post_name; ?>"><?php echo $tab->post_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php foreach ($tabs as $tab) : ?>
                    <?php
                    	$tabHeader = get_post_meta($tab->ID, '_dphfh-page-header', true); 
						$tabFooter = get_post_meta($tab->ID, '_dphfh-page-footer', true);
					?>
                    <div id="<?php echo $tab->post_name; ?>" class="page-tab-content">
                    	<div>
                            <div class="tab-before"><?php echo $tabHeader; ?></div>
                            <hgroup><?php echo apply_filters('dphfh_page_title',$tab->post_title, $tab->ID); ?></hgroup>
                            <div><?php echo apply_filters('the_content',$tab->post_content); ?></div>
                            <div class="tab-after"><?php echo $tabFooter; ?></div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
                
				<?php if ($pageFooter != '') : ?>
            		<aside class="after"><?php echo $pageFooter; ?></aside>
                <?php endif; ?>
            <?php endwhile; endif; ?>
            </section>
            <section class="side"><?php dynamic_sidebar('Sidebar'); ?></section>

<?php get_footer(); ?>
