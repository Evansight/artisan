<?php
/**
 * Template Name: Artisan Homes
 */
get_header(); ?>

    <body>
    <header class="homes__header">
        <div class="hh__wrapper">
            <?php
            $link = get_field('artisan_homes_link');
            if ($link):
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button__title" href="<?php echo esc_url($link); ?>"
                   target="<?php echo esc_attr($link_target); ?>">Artisan Homes</a>
            <?php endif; ?>

            <span class="select__title">
                <?php $confirm = get_field('filter_text');
                if ($confirm) {
                    echo $confirm;
                } else {
                    echo 'empty';
                } ?>
            </span>

            <?php $terms = get_terms('company_id');
            if ($terms && !is_wp_error($terms)) {
                echo "<select class='filters-select'>";
                echo '<option value="*">' . __('All', 'default') . '</option>';
                foreach ($terms as $term) {

                    echo '<option value=".' . $term->slug . '">' . $term->name . '</option>';
                }
                echo "</select>";
            } ?>
        </div>
    </header>

    <main>
        <div class="grid-container">

            <?php $args = array(
                'post_type' => 'artisan_homes',
                'post_status' => 'publish',
                'post_per_page' => -1,
            );
            $the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()) : ?>

                <!-- BEGIN of Post -->

                <div class="homes__block grid-item grid-x">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();
                        $post_terms = wp_get_post_terms($post_id, 'company_id');
                        ?>
                        <div class="large-4 medium-4 small-6 cell <?php echo $post_terms->slug; ?>">
                            <div class="homes__card ">
                                <div class="homes__inner">
                                    <div class="image__wrapper">
                                        <?php echo wp_get_attachment_image(the_post_thumbnail(), 'medium', false, array('class' => 'home__img')); ?>
                                    </div>
                                    <div class="text__wrapper">
                                        <h3 class="home__title"><?php the_title(); ?></h3>
                                        <?php
                                        if (is_array($post_terms) && !is_wp_error($terms)) {
                                            foreach ($post_terms as $post_term):
                                                echo '<span class="company__name">' . $post_term->name . '</span>';

                                            endforeach;
                                        } ?>
                                    </div>

                                    <div class="footer__text"><?php the_field('house_name'); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            <?php endif; ?>
        </div>

    </main>

    </body>

<?php get_footer(); ?>