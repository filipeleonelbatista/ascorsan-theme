<?php if (is_page()) : ?>
  <div class="espaco"></div>
  <?php get_template_part('normal-page', get_post_format()); ?>
<?php else : ?>
  <!-- single -->
  <?php if (is_single()) : ?>

    <!-- Normal -->
    <?php if ('post' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-page', get_post_format()); ?>
    <?php endif; ?>

    <!-- Galery -->
    <?php if ('galeria' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-galery', get_post_format()); ?>
    <?php endif; ?>

    <!-- Associado -->
    <?php if ('associado' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-associado', get_post_format()); ?>
    <?php endif; ?>

    <!-- Solidario -->
    <?php if ('solidario' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-solidario', get_post_format()); ?>
    <?php endif; ?>

    <!-- Convenio -->
    <?php if ('convenio' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-convenio', get_post_format()); ?>
    <?php endif; ?>

    <!-- Video -->
    <?php if ('video' == get_post_type()) : ?>
      <?php get_template_part('normal-video', get_post_format()); ?>
    <?php endif; ?>

    <!-- Areas de lazer -->
    <?php if ('areas_de_lazer' == get_post_type()) : ?>
      <div class="espaco"></div>
      <?php get_template_part('normal-area_de_lazer', get_post_format()); ?>
    <?php endif; ?>

  <?php else : ?>
    <!-- cards -->

    <!-- Normal -->
    <?php if ('post' == get_post_type()) : ?>
      <?php get_template_part('card-post', get_post_format()); ?>
    <?php endif ?>

    <!-- Video -->
    <?php if ('video' == get_post_type()) : ?>
      <?php get_template_part('card-video', get_post_format()); ?>
    <?php endif ?>

    <!-- galeria -->
    <?php if ('galeria' == get_post_type()) : ?>
      <?php get_template_part('card-galery', get_post_format()); ?>
    <?php endif ?>


    <!-- cards -->
  <?php endif ?>
  <!-- single -->

<?php endif ?>