<?php if (have_posts()):  ?>

    <div class="tainacan-mosaic-container card-columns">

        <?php while (have_posts()): the_post(); ?>
        
                <div class="tainacan-mosaic">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail('large'); ?> 
                        <?php else: ?>
                            <?php echo '<img alt="Thumbnail placeholder" src="' . plugins_url('', __FILE__ ) . '/thumbnail_placeholder.png">'?>
                        <?php endif; ?>  
                    </a>    
                    <a href="<?php the_permalink(); ?>">
                        <p class="metadata-title"><?php the_title(); ?></p>
                    </a>
                </div>      

        <?php endwhile; ?>

    </div>

<?php else: ?>
    <div class="tainacan-mosaic-container">
        <section class="section">
            <div class="content has-text-gray4 has-text-centered">
                <p>
                    <span class="icon is-large">
                        <i class="tainacan-icon tainacan-icon-48px tainacan-icon-items"></i>
                    </span>
                </p>
                <p><?php echo __('No item found', 'tainacan-extra-viewmodes') ?></p>
            </div>
        </section>
    </div>
<?php endif; ?>
