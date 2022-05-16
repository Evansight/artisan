
<?php
/*
Template Name: Главная страница
*/
get_header(); ?>
<div id="page" class="single">
    <?php
    $arg_cat = array(
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'exclude'      => '',
        'include'      => '',
        'taxonomy'     => 'category',
    );
    $categories = get_categories( $arg_cat );
    ?>
    <article class="<?php mts_article_class(); ?>">
        <div id="content_box" >
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
                    <div class="single_page">
                        <div class="post-content box mark-links entry-content">
                            <?php the_content(); ?>

                        </div><!--.post-content box mark-links-->
                    </div>
                </div>
            <?php endwhile; ?>
            <?php
            if( $categories ){
                foreach( $categories as $cat ){

                    $arg_posts =  array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'posts_per_page' => 3,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $cat->cat_ID,
                    );
                    $query = new WP_Query($arg_posts);

                    ?>
                    <?php if ($query->have_posts() ) ?>
                        <h2><?php echo $cat->name; ?> </h2>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="main-page-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'widgetfull' );?>
                            </a>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>

                    <?php endwhile; wp_reset_postdata()?>
                    <?php
                }
            }
            ?>
        </div>
    </article>
    <?php get_sidebar();
    get_footer(); ?>
