<?php get_header(); ?>

<div class="container">
    <div class="row m-4">
        <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post(); ?>
                    <div class="col-12 col-sm-6 mb-4">
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
                                <i class="far fa-calendar-alt"></i>&nbsp;<?php the_time('F j, Y');?> at <?php the_time('g:i a');?>&nbsp;
                            </span>

                            <span class="post-comment">
                                <i class="far fa-comments"></i>&nbsp;<?php comments_popup_link('0 Comment', '1 Comment', '% Comments','','Comments Off'); ?> &nbsp;
                            </span>
                            <!-- post image -->
                            <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail rounded mb-2 mt-2', 'title' => 'Post thumbnail']); ?>

                            <div class="post-content text-dark">
                                <?php the_excerpt(); ?>
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
        ?>
    </div>
</div>
<!-- 
<div class="container">
    <div class="row m-4">
        <div class="col-12 col-sm-6">
            <div class="main-post bg-white m-2 p-3">
                <h3 class="post-title text-primary">Calculus summary 1</h3>
                <span class="post-author"><i class="far fa-edit"></i> Ahmed</span>
                <span class="post-date"> <i class="far fa-calendar-alt"></i> 3/4/2015 </span>
                <span class="post-comment"><i class="far fa-comments"></i> 17 comments</span>
                <img src="https://c8.alamy.com/comp/JMXAB4/calculus-text-with-geometric-shapes-against-image-of-ac-chalkboard-JMXAB4.jpg"
                    alt="math image" class="post-img d-block p-2 img-thumbnail rounded p-2">
                 <p class="post-content text-dark mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quae
                    modi hic at accusamus! Doloremque totam, veritatis eum harum odio officiis, eius earum consectetur
                    ipsum, praesentium nemo possimus molestias dolorum repellendus dolor eos quis hic ab voluptas neque
                    quam quia libero ea.</p>
                <hr>
                <p class="categories text-success"><i class="fas fa-tags"></i> Math, Calculus</p>
            </div>
        </div>
    </div>
</div> -->


<?php get_footer(); ?>
