<?php if (have_posts()):  ?>

    <div class="tainacan-books-container">

        <div class="row no-gutters">
        <?php while (have_posts()): the_post(); ?>
            <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="tainacan-book" style="background-image: url('<?php 
                 if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail_url('tainacan-medium-full'));
                 } else {
                    echo get_stylesheet_directory_uri() . '/assets/images/thumbnail_placeholder.png';
                 }
                ?>'), linear-gradient(90deg,#aaa 5px,#ccc 12px,#f2f2f2 20px), linear-gradient(0deg,#ddd 0px,#f2f2f2 6px)">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail('tainacan-medium-full'); ?> 
                        <?php else: ?>
                            <?php echo '<img alt="Thumbnail placeholder" src="'.get_stylesheet_directory_uri().'/assets/images/thumbnail_placeholder.png">'?>
                        <?php endif; ?>  
                    </a>
                    <a href="<?php the_permalink(); ?>">
                        <p class="metadata-title"><?php the_title(); ?></p>
                    </a>
                </div>
            </div>            
            
        <?php endwhile; ?>
        </div>
    </div>

<?php else: ?>
    <div class="tainacan-books-container">
        <section class="section">
            <div class="content has-text-gray4 has-text-centered">
                <p>
                    <span class="icon is-large">
                        <i class="tainacan-icon tainacan-icon-48px tainacan-icon-items"></i>
                    </span>
                </p>
                <p><?php echo__('No item found', 'tainacan-extra-viewmodes') ?></p>
            </div>
        </section>
    </div>
<?php endif; ?>
