<!-- TODO: Update file -->
<?php $routesetters = new WP_Query([
  "post_type" => "routesetters",
  "posts_per_page" => -1,
  "post_status" => "publish",
]); ?>

<section class="wrapper p:block-4">
  <div class="container wide dgrid gap-1 md:cols-288">
    <?php while ($routesetters->have_posts()):

      $routesetters->the_post();
      $id = get_the_ID();
      ?>
      <a class="dflex image-wrapper rounded unstyled-link has-text-overlay" href="<?php the_permalink(
        $id,
      ); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(
          $id,
        ); ?>" alt="<?php the_title(); ?>">
        <section class="overlay-text p:1 z2 has-white-color block-gap-1 w100%">
          <h3 class="has-big-font-size"><?php the_title(); ?></h3>
          <?php the_excerpt(); ?>
          <button class="button button:filled-in button:default">Read More</button>
        </section>
      </a>
    <?php
    endwhile; ?>
  </div>
</section>
