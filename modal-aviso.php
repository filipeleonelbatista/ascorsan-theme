<?php if (get_theme_mod("add-aviso")) : ?>
    <script>
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('btn-modal').click();
            }, 1000);
        }
    </script>
    <section id="modal-aviso">

        <button id="btn-modal" type="button" style="display: none;" data-toggle="modal" data-target="#aviso-modal">
            Aviso!
        </button>


        <?php
        $args = array(
            'post_type' => array('aviso'),
            'posts_per_page' => 1
        );
        $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();  ?>

                <div class="modal fade bd-example-modal-lg" id="aviso-modal" tabindex="-1" role="dialog" aria-labelledby="aviso-modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title"><?php the_title(); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('post-thumbnail', array(
                                                'class' => 'img-fluid',
                                            ));
                                        }
                                        // else {
                                        //     echo '<img src="' . get_bloginfo('stylesheet_directory')
                                        //         . '/img/default.png" />';
                                        // }
                                        ?>
                                    </div>
                                </div>
                                            <div class="espaco"></div>
                                <div class="row">
                                    <div class="col-sm">
                                    <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <?php
                                echo "<p><b>" . date("Y") . " &copy " . get_bloginfo('name') . "</b> - " . get_bloginfo('description') . "</p>";

                                ?>
                            </div>

                        </div>
                    </div>
                </div>


            <?php endwhile; ?>
        <?php endif; ?>



    </section>

<?php endif; ?>