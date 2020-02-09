<form class="mb-0" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input type="search" class="form-control" 
                placeholder="Busque aqui o que você procura"
                value="<?php echo get_search_query(); ?>" name="s">
        <div class="input-group-append">
            <button class="btn btn-ascorsan-search" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form> 
