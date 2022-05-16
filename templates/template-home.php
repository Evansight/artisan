<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>
	
	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->
	
	<!-- BEGIN of main content -->
    <main class="main-content">
        <section class="hero">
            <div class="grid-container">
                <div class="hero__wrapper">
                    <h3 class="hero__title">
                        <?php the_field('hero_title'); ?>
                    </h3>
                    <div class="hero__discr">
                        <?php the_field('hero_text_information'); ?>
                    </div>
                </div>

            </div>
        </section>
        <section class="builders">
            <div class="grid-container">
                <div class="builders__wrapper">
                    <h3 class="titles"><?php the_field('builders_title');?> </h3>
                    <div class="builders__desk-wrapper">
                        <div class="builders__img-wrapper">
                            <?php
                            $image = get_field('builders_photo');
                            if( !empty( $image ) ): ?>
                                <img class="builders__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="builders__names">
                            <?php
                                    if( have_rows('builders_names') ):
                                    while( have_rows('builders_names') ) : the_row();
                                    $sub_name = get_sub_field('builder_name');
                                    $sub_project = get_sub_field('builder_project');?>
                                        <p class="builder__name"><?php echo $sub_name;?><a class="builder__home-name"><?php echo $sub_project;?></a></p>
                            <?php
                                endwhile;
                                endif;
                            ?>
                            <span class="builder__name"> <span class="builder__home-name"> </span> </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="homes">
            <div class="grid-container">
                <h3 class="titles"><?php the_field('home_title'); ?></h3>

                <?php $args = array (
                        'post_type'=> 'homes_card',
                        'post_status' => 'publish',
                        'post_per_page' => 3,
                );
                $the_query = new WP_Query($args); ?>
                <?php if ($the_query->have_posts() ) : ?>

                <div class="homes__wrapper">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <div class="home__card">
                            <div class="card__inner">
                                <div class="image__wrapper">
                                    <?php echo wp_get_attachment_image(the_post_thumbnail(), 'medium', false, array('class'=>'home__img')); ?>
                                </div>
                                <div class="text__wrapper">
                                    <h3 class="home__title"><?php the_title();?></h3>
                                    <span class="company__name"><?php the_field('company_name'); ?></span>
                                </div>

                                <div class="footer__text"><?php the_field('house_name'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
                <?php endif; ?>
                <a href="<?php the_field('view_homes');?>" class="all__homes">View Homes</a>
            </div>
        </section>

        <?php $guide_bg = get_field('guide_background');?>
        <section class="guide" <?php bg($guide_bg);?>>
            <div class="grid-container">
                <div class="guide__inner">
                    <?php
                    $image = get_field('guide_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <div class="button__wrapper">
                        <?php if ($guide_file = get_field('guide_file')) :?>
                        <a href="<?php echo $guide_file; ?>" download="pdfbook.jpg" >View Artisan Guide</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="sponsors">
            <div class="grid-container">
                <h3 class="titles"><?php
                    if ($sponsors_title = get_field('sponsors_title')): ?>
                        <?php echo ($sponsors_title);
                        ?>
                    <?php endif; ?></h3>

                <div class="sponsors__wrapper">
                <?php
                if( have_rows('sponsors_label') ):
                    while( have_rows('sponsors_label') ) : the_row();
                        $sub_img = get_sub_field('sponsors_image');
                        $sub_link = get_sub_field('sponsors_link');
                        ?>
                        <a href="<?php echo $sub_link ['url']; ?>"><img src="<?php echo $sub_img['url'];  ?>" alt=""></a>
                    <?php
                    endwhile;
                endif;
                ?>
                </div>
                <h3 class="titles"><?php
                    if ($partners_title = get_field('partners_title')): ?>
                        <?php echo ($partners_title);
                        ?>
                    <?php endif; ?></h3>

                <div class="sponsors__wrapper">

                <?php
                if( have_rows('partners_label') ):
                    while( have_rows('partners_label') ) : the_row();
                        $sub_img = get_sub_field('partners_image');
                        $sub_link = get_sub_field('partners_link');
                        ?>
                        <a href="<?php echo $sub_link ['url']; ?>"><img src="<?php echo $sub_img['url'];  ?>" alt=""></a>
                    <?php
                    endwhile;
                endif;
                ?>
                </div>
            </div>
        </section>
    </main>
	<!-- END of main content -->

<?php get_footer(); ?>