<?php if (!is_single()) : ?>

    <div class="col-sm-12 mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-sm-9">
                <h4 style="color: #24647c;margin:0;"><?php the_title(); ?></h4>
                <div class="row ml-2">
                    <p style="color: #888; "><b><?php echo get_field("segmento", get_the_id()); ?></b></p>
                </div>    
                <div class="row ml-2">
                    <?php echo get_field("logradouro", get_the_id()); ?>, <?php echo get_field("nr_logradouro", get_the_id()); ?>, Bairro <?php echo get_field("bairro", get_the_id()); ?>
                </div>
                <div class="row ml-2">
                    <?php echo get_field("municipio", get_the_id()); ?>-<?php echo get_field("uf", get_the_id()); ?>
                </div>
                <div class="row ml-2">
                    <a href="tel:<?php echo get_field("telefone", get_the_id()); ?>"><?php echo get_field("telefone", get_the_id()); ?></a>
                </div>
                <div class="row ml-2">
                    <?php echo get_field("tipo_convenio", get_the_id()); ?>
                </div>

            </div>
            <div class="col-sm-3">
                <?php if((get_field("logradouro", get_the_id()) != '') && (get_field("nr_logradouro", get_the_id()) != '') && (get_field("municipio", get_the_id()) != '') && (get_field("uf", get_the_id()) != '')):?>
                <div class="row">     
                    <?php 
                        $url_g_maps = "";
                        $url_g_maps .= "https://www.google.com/maps/search/?api=1&query=";
                        $url_g_maps .= urlencode( get_field("logradouro", get_the_id()) );
                        $url_g_maps .= "%2C+" . urlencode( get_field("nr_logradouro", get_the_id()) );
                        $url_g_maps .= "%2C+" . urlencode( get_field("municipio", get_the_id()) );
                        $url_g_maps .= "-" . urlencode( get_field("uf", get_the_id()) );

                    ?>               
                    <a class="btn btn-lg btn-convenio-mobile btn-ascorsan-primary-outline mr-2" href="<?php echo $url_g_maps; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php endif ?>