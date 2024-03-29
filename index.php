<?php get_header();
$limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 ?>
    <!-- main container -->
    <div class="container">
    	<div class="article-list">
        <?php
		global $query_string;
		query_posts($query_string.'&orderby=id');
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
            <article class="article">
                <h1><a href="<?php the_permalink(); ?>" title="<?php the_title();?>" alt="<?php the_title();?>"><?php the_title() ?></a></h1>
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="article-img">
                	<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" alt="<?php the_title();?>"><?php the_post_thumbnail(); ?></a>
                </div>
				<?php }?>
                <div class="article-summary">
                   <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0,180,"..."); ?>
                </div>
                <div class="article-info">
                    <i class="fa fa-calendar"></i> <?php the_time("Y-m-d");?> &nbsp; <i class="fa fa-map-marker"></i> 
					<?php
						the_category(',');
					?>
                </div>
                <div class="readmore"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>" alt="<?php the_title();?>">+ 阅读全文</a></div>
            </article>
                    <?php
							endwhile; else:
							?>
                                        <div class="article">
                <h1>Sorry, 没有文章</h1>
                <div class="article-summary">
                   没有文章
                </div>
                
            </div>
                            <?
							endif;
							wp_reset_query();
							?>
                            <div class="pagenavi"><?php pagenavi(); ?></div>
            <div class="clear"></div>
            <div class="footer">COPYRIGHT &copy; <a href="">IM050.COM</a> | THEME BY <a href="">MEMORY</a></div>
        </div>
        <?php get_sidebar(); ?>
        
    </div>
<?php get_footer(); ?>