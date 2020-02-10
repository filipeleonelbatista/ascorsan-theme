<div class="col-sm-12">
    <a class='titulo-link' href=" <?php echo esc_url( get_category_link( get_cat_ID( 'Notícias' ) ) ); ?> "><h3>Ultimas Notícias</h3></a>
    <hr>
    <div class="row">

    <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
    
    <?php if($the_query->have_posts() ) : ?>
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>        
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile;?>        
    <?php else : ?>
    <div class="col-sm">
    <p class="lead"> Nenhuma publicação encontrada.</p>
    </div>
    <?php endif; ?>               
        </div>
    </div>
</div>

