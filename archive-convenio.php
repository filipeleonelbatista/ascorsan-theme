<?php get_header(); ?>
<div class="espaco"></div>
<div class="container">

    <?php

    $args = array(
        'post_type' => 'convenio',
        'posts_per_page' => -1,
    );


    $lista_municipios = [];
    $lista_segmento = [];
    $lista_uf = [];
    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
        <h1>Convênios</h1>
        <hr>

        <!-- Menu de buscas -->

        <div class="row mb-4">
            <div class="col-sm">
                <a class="btn btn-sm btn-ascorsan-primary ml-2" href="<?php echo get_post_type_archive_link('convenio'); ?>">Todos</a>
                <?php while ($the_query->have_posts()) :
                    $the_query->the_post();  ?>

                    <?php
                    array_push($lista_uf, get_field("uf", get_the_id()));
                    ?>

                <?php endwhile; ?>

                <?php
                $lista_uf = array_unique($lista_uf);

                foreach ($lista_uf as $uf) { ?>
                    <a class="btn btn-sm btn-ascorsan-primary-outline ml-2" href="<?php echo esc_url(add_query_arg('uf', $uf, get_post_type_archive_link('convenio')));  ?>"><?php echo $uf; ?></a>
                <?php  }
                ?>
            </div>
            <form class="form-inline" action="">
                <input type="hidden" id="uf" value="<?php echo get_query_var("uf", 0); ?>">
                <div class="col-sm">

                    <select class="custom-select" id="municipio">
                        <option value="0">Selecione um municipio...</option>
                        <?php while ($the_query->have_posts()) :
                            $the_query->the_post();  ?>

                            <?php
                            array_push($lista_municipios, get_field("municipio", get_the_id()));
                            ?>

                        <?php endwhile; ?>

                        <?php
                        $lista_municipios = array_unique($lista_municipios);

                        foreach ($lista_municipios as $municipio) { ?>
                            <option value="<?php echo $municipio; ?>">
                                <?php echo $municipio; ?>
                            </option>
                        <?php  }
                        ?>


                    </select>

                </div>

                <div class="col-sm">

                    <div class="input-group">
                        <select class="custom-select" id="segmento">
                            <option value="0">Selecione um Segmento...</option>
                            <?php while ($the_query->have_posts()) :
                                $the_query->the_post();  ?>

                                <?php
                                array_push($lista_segmento, get_field("segmento", get_the_id()));
                                ?>

                            <?php endwhile; ?>

                            <?php
                            $lista_segmento = array_unique($lista_segmento);

                            foreach ($lista_segmento as $segmento) { ?>
                                <option value="<?php echo $segmento; ?>">
                                    <?php echo $segmento; ?>
                                </option>
                            <?php  }
                            ?>


                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-ascorsan-primary" onclick="pesquisar();" type="button"><i class="fas fa-search"></i></button>
                        </div>
                        <script>
                            function pesquisar() {
                                URLBase = "<?php echo get_post_type_archive_link('convenio'); ?>"

                                URI = ""

                                municipio = document.getElementById('municipio')
                                segmento = document.getElementById('segmento')

                                if (document.getElementById('uf').value != 0) {
                                    URI += "&uf=" + document.getElementById('uf').value
                                }

                                if (municipio.options[municipio.selectedIndex].value != 0) {
                                    URI += "&municipio=" + municipio.options[municipio.selectedIndex].value
                                }

                                if (segmento.options[segmento.selectedIndex].value != 0) {
                                    URI += "&segmento=" + segmento.options[segmento.selectedIndex].value
                                }

                                window.open(URLBase + URI, "_self");
                            }
                        </script>

                    </div>
                </div>

            </form>
        </div>

        <!-- Menu de buscas -->
        <!-- Loop -->

        <?php

        $uf = get_query_var("uf", '');
        $municipio = get_query_var("municipio", '');
        $segmento = get_query_var("segmento",  '');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        wp_reset_query();

        //echo "uf = '" . $uf . "' municipio = '" . $municipio . "' segmento = '" . $segmento . "'<br>";

        if (($uf == '') && ($municipio == '') && ($segmento == '')) {
            // echo "Entrei aqui => " . '($uf == "") && ($municipio == "") && ($segmento == "")';
            $args1 = array(
                'post_type' => 'convenio',
                'posts_per_page' => 5,
                'paged' => $paged,
            );
        } else {
            if (($uf != '') && ($municipio == '') && ($segmento == '')) {

                // echo "Entrei aqui => " . '($uf != "") && ($municipio == "") && ($segmento == "")';
                $args1 = array(
                    'post_type' => 'convenio',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'meta_key' => 'uf',
                    'meta_value' => $uf,
                );
            } else {

                if (($uf == '') && ($municipio != '') && ($segmento == '')) {

                    // echo "Entrei aqui => " . '($uf == "") && ($municipio != "") && ($segmento == "")';
                    $args1 = array(
                        'post_type' => 'convenio',
                        'posts_per_page' => 5,
                        'paged' => $paged,
                        'meta_key' => 'municipio',
                        'meta_value' => $municipio,
                    );
                } else {
                    if (($uf == '') && ($municipio == '') && ($segmento != '')) {

                        // echo "Entrei aqui => " . '($uf == "") && ($municipio == "") && ($segmento != "")';
                        $args1 = array(
                            'post_type' => 'convenio',
                            'posts_per_page' => 5,
                            'paged' => $paged,
                            'meta_key' => 'segmento',
                            'meta_value' => $segmento,
                        );
                    } else {
                        if (($uf != '') && ($municipio != '') && ($segmento == '')) {

                            // echo "Entrei aqui => " . '($uf != "") && ($municipio != "") && ($segmento == "")';
                            $args1 = array(
                                'post_type' => 'convenio',
                                'posts_per_page' => 5,
                                'paged' => $paged,
                                'meta_query' =>
                                array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'uf',
                                        'value' => $uf,
                                        'compare' => '='
                                    ),
                                    array(
                                        'key' => 'municipio',
                                        'value' => $municipio,
                                        'compare' => '='
                                    ),
                                ),
                            );
                        } else {
                            if (($uf != '') && ($municipio == '') && ($segmento != '')) {

                                // echo "Entrei aqui => " . '($uf != "") && ($municipio == "") && ($segmento != "")';
                                $args1 = array(
                                    'post_type' => 'convenio',
                                    'posts_per_page' => 5,
                                    'paged' => $paged,
                                    'meta_query' =>
                                    array(
                                        'relation' => 'AND',
                                        array(
                                            'key' => 'uf',
                                            'value' => $uf,
                                            'compare' => '='
                                        ),
                                        array(
                                            'key' => 'segmento',
                                            'value' => $segmento,
                                            'compare' => '='
                                        ),
                                    ),
                                );
                            } else {
                                if (($uf == '') && ($municipio != '') && ($segmento != '')) {

                                    // echo "Entrei aqui => " . '($uf == "") && ($municipio != "") && ($segmento != "")';
                                    $args1 = array(
                                        'post_type' => 'convenio',
                                        'posts_per_page' => 5,
                                        'paged' => $paged,
                                        'meta_query' =>
                                        array(
                                            'relation' => 'AND',
                                            array(
                                                'key' => 'municipio',
                                                'value' => $municipio,
                                                'compare' => '='
                                            ),
                                            array(
                                                'key' => 'segmento',
                                                'value' => $segmento,
                                                'compare' => '='
                                            ),
                                        ),
                                    );
                                } else {
                                    if (($uf != '') && ($municipio != '') && ($segmento != '')) {

                                        // echo "Entrei aqui => " . '($uf != "") && ($municipio != "") && ($segmento != "")';
                                        $args1 = array(
                                            'post_type' => 'convenio',
                                            'posts_per_page' => 5,
                                            'paged' => $paged,
                                            'meta_query' =>
                                            array(
                                                'relation' => 'AND',
                                                array(
                                                    'key' => 'municipio',
                                                    'value' => $municipio,
                                                    'compare' => '='
                                                ),
                                                array(
                                                    'key' => 'segmento',
                                                    'value' => $segmento,
                                                    'compare' => '='
                                                ),
                                                array(
                                                    'key' => 'uf',
                                                    'value' => $uf,
                                                    'compare' => '='
                                                ),
                                            ),
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        $the_query1 = new WP_Query($args1); ?>

        <?php if ($the_query1->have_posts()) : ?>

            <?php while ($the_query1->have_posts()) :
                $the_query1->the_post(); ?>

                <?php get_template_part('content_convenio', get_post_format());   ?>

            <?php endwhile; ?>
            <div class="row ml-3 mb-4">
                <?php if (function_exists("pagination")) {
                    pagination($the_query->max_num_pages);
                } ?>
            </div>
        <?php else :
            get_template_part('no_results');
        endif;

        ?>
        <!-- Fim do loop -->

    <?php else :
        get_template_part('no_results');
    endif; ?>






    <?php get_template_part('ultimas-noticias'); ?>
</div>
<?php get_footer(); ?>