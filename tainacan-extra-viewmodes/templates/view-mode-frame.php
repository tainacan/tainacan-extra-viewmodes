<?php if (have_posts()):  ?>

    <div class="tainacan-frame-container bootstrap-wrapper">

        <div class="row no-gutters">
        <?php while (have_posts()): the_post(); ?>
            <div class="col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <div class="tainacan-frame">
                    <a href="<?php the_permalink(); ?>">
                        <div class="frame">
                            <div class="mat">
                                <div class="art">
                                <?php if ( has_post_thumbnail() ): ?>
                                    <?php the_post_thumbnail('tainacan-medium-full'); ?> 
                                <?php else: ?>
                                    <?php echo '<img alt="Thumbnail placeholder" src="' . plugins_url('', __FILE__ ) . '/thumbnail_placeholder.png">'?>
                                <?php endif; ?>  
                                </div>
                            </div>
                        </div>
                    </a>
                    <p class="metadata-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </p>
                </div>
            </div>            
            
        <?php endwhile; ?>
        </div>
    </div>

<?php else: ?>
    <div class="tainacan-frame-container bootstrap-wrapper">
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
