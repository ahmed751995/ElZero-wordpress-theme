<?php get_header(); ?>

<div class="container">
    <div class="row m-4">
        <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post(); ?>
        <div class="col-12 mb-4">
            <div class="main-post bg-white p-3">
                <h3 class="post-title text-primary">
                    <a href="<?php the_permalink();?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <span class="post-author">
                    <i class="far fa-user"></i> &nbsp;<?php the_author_posts_link();?>&nbsp;
                </span>

                <span class="post-date">
                    <i class="far fa-calendar-alt"></i>&nbsp;<?php the_time('F j, Y');?> at
                    <?php the_time('g:i a');?>&nbsp;
                </span>

                <span class="post-comment">
                    <i
                        class="far fa-comments"></i>&nbsp;<?php comments_popup_link('0 Comment', '1 Comment', '% Comments','','Comments Off'); ?>
                    &nbsp;
                </span>
                <?php edit_post_link('Edit  <i class="fa fa-pen"></i>'); ?> 
                <!-- post image -->
                <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail rounded mb-2 mt-2', 'title' => 'Post thumbnail']); ?>

                <div class="post-content text-dark">
                    <?php the_content(); ?>
                </div>
                <hr>

                <div class="categories"><i class="fas fa-tags"></i>&nbsp; <?php the_category(', '); ?></div>

                <div class="tags">
                    <?php if(has_tag()) {
                                    the_tags();
                                } else {
                                    echo 'Tags: There\'s no tags';
                                } ?>
                </div>
            </div>

        </div>
        <?php
                }// end while loob
            } // end if condition
            echo '<div class="col-12 post-pagination">';
            if(get_previous_post_link()) {
                previous_post_link('%link','<i class="fa fa-chevron-circle-left fa-fw"></i> %title');
            } else {
                echo "";
            }
            if(get_next_post_link()) {
                next_post_link('%link','%title <i class="fa fa-chevron-circle-right fa-fw"></i>');
            } else {
                echo '';
            }
            echo "</div>"
        ?>
    </div>
    <?php comments_template(); ?>
</div>

<?php get_footer(); ?>