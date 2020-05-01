<?php if (get_theme_mod("add-video_index")) : ?>
    <div class="video-content">

        <div class="container" style="border: solid 2px #006c8a; border-radius: 15px; margin: 15px auto; padding: 30px 0;">
            <div class="row d-flex align-items-center">
                <div class="col-sm-9 text-center">
                    <h2>NÓS TEMOS UM RECADO PARA VOCÊ</h2>
                </div>
                <div id="video-content-button-open" onclick="acao(1);" class="col-sm-3 d-none">
                    <button class="btn btn-md btn-ascorsan-primary-outline"><i class="fas fa-arrow-circle-down"></i> Clique aqui</button>
                </div>
                <div id="video-content-button-close" onclick="acao(2);"  class="col-sm-3">
                    <button class="btn btn-md btn-ascorsan-primary-outline"><i class="fas fa-arrow-circle-up"></i> Fechar</button>
                </div>
            </div>
            <div id="video-content" class="row mt-4" style="padding 30px;">
                <div class="col-sm text-center">
                    <video style="border-radius: 10px; width:auto; height: 300px;" controls>
                        <source src="<?php echo wp_get_attachment_url(get_theme_mod("img-video_index")); ?>" type="video/mp4">
                        Seu navegador não suporta video em HTML5.
                    </video>

                </div>
            </div>
        </div>

    </div>
<script>
    function acao(op){
        if(op == 1){
            document.getElementById('video-content-button-open').classList.add("d-none")
            document.getElementById('video-content-button-close').classList.remove("d-none")
            document.getElementById('video-content').classList.remove("d-none")
        }
        if(op == 2){
            document.getElementById('video-content-button-open').classList.remove("d-none")
            document.getElementById('video-content-button-close').classList.add("d-none")
            document.getElementById('video-content').classList.add("d-none")
        }
    }
</script>

<?php endif; ?>