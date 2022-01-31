<?php if (get_theme_mod("select-aviso") != 'nenhum') : ?>

<?php 
            //  select-aviso
            // 'nenhum'
            // 'imposto_renda'
            // 'atualizacao_cadastral'
            // 'page'
            // 'image'

    $type_form = get_theme_mod("select-aviso");    
    $header_title = '';
    $modal_body_message = '';

    if(get_theme_mod("select-aviso") == 'imposto_renda'){
        $header_title = 'Imposto de renda';
        $modal_body_message = 'Solicite já seu comprovante para o imposto de renda';
    }

    if(get_theme_mod("select-aviso") == 'atualizacao_cadastral'){
        $header_title = 'Atualização cadastral';
        $modal_body_message = 'Atualize seu cadastro com a Ascorsan';
    }

    if(get_theme_mod("select-aviso") == 'page'){
        $header_title = get_the_title(get_theme_mod("select-dropdown-pages"));
    }

    if(get_theme_mod("select-aviso") == 'image'){
        $header_title = 'Aviso!';     
    }
?>

<script>
    window.onload = function() {

        if (sessionStorage.getItem("modal-aviso") == null) {
            console.log("Session Storage: Modal Aviso Value", sessionStorage.getItem("modal-aviso"))
            console.log("Selected Aviso Type: ", "<?php echo get_theme_mod("select-aviso") ?>")
            setTimeout(function() {

                document.getElementById('btn-modal').click();
                // sessionStorage.setItem("modal-aviso", "1")
            }, 1000);
        }
    }
</script>

<section id="modal-aviso">

<button id="btn-modal" type="button" style="display: none;" data-toggle="modal" data-target="#aviso-modal">
    Aviso!
</button>


<div class="modal fade bd-example-modal-lg" id="aviso-modal" tabindex="-1" role="dialog" aria-labelledby="aviso-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><?php echo $header_title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                    if(get_theme_mod("select-aviso") == 'imposto_renda'){
                        echo '<p><b>' . $modal_body_message . '</b></p>';
                        get_template_part('update-imposto-renda');
                    }
                    if(get_theme_mod("select-aviso") == 'atualizacao_cadastral'){
                        echo '<p><b>' . $modal_body_message . '</b></p>';
                        get_template_part('update-cadastro');
                    }
                    

                    if(get_theme_mod("select-aviso") == 'page'){
                       echo do_shortcode(get_post_field('post_content', get_theme_mod("select-dropdown-pages")));
                     }

                    if(get_theme_mod("select-aviso") == 'image'){
                        echo '<p><b>' . $modal_body_message . '</b></p>';
                        echo '<img src="' . wp_get_attachment_url(get_theme_mod("img-aviso")) . '" style="width:100%; height: auto" />';
                     }
                ?>
            </div>
            <div class="modal-footer">
                <?php
                echo "<p><b>" . date("Y") . " &copy " . get_bloginfo('name') . "</b> - " . get_bloginfo('description') . "</p>";

                ?>
            </div>

        </div>
    </div>
</div>

</section>

<?php endif; ?>