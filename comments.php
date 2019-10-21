<?php 
    echo '<ul class="unstyled-list">';
    ?>
    <h3> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?> </h3>
    <?php
    if(comments_open()) {
        $args = array(
            'max_depth'     => 3,
            'style'         => 'ul',
            'type'          => 'comment',
            'avatar_size'   => 32

        );
        wp_list_comments($args);
    echo '</ul>';
    // $commentform_arguments = array (
    //     'fields' => array (
    //         'author' => '<div class="form-group">name <input class="form-control"></div>',
    //         'email' => '<div class="form-group">email <input class="form-control"></div>',
    //         'url' => '<div class="form-group">url <input class="form-control"></div>'
    //     ),
    //     'comment_field' => '<div class="form-group">comment <input class="form-control"></div>'
    // );
    comment_form();
    } else {
        echo "Oops comments are disabled";
    }
    echo "<hr>";
    
?>