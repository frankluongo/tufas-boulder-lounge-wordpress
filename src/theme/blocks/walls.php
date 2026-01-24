<!-- TODO: Update file -->
<?php $walls = new WP_Query([
  "post_type" => "walls",
  "posts_per_page" => -1,
  "post_status" => "publish",
]); ?>

<section class="wrapper p:block-4">
  <div class="container wide dgrid gap-1 sm:cols-2 md:cols-3 lg:cols-4">
    <?php while ($walls->have_posts()):

      $walls->the_post();
      $id = get_the_ID();
      $angle = get_field("angle", $id);
      $design = get_field("terrain_design", $id);
      $photos = get_field("previous_sets", $id);
      $featImg = $photos[0]["set_photo"]["sizes"]["medium"];
      ?>
      <button class="dflex image-wrapper rounded small unstyled-button has-text-overlay always-visible" data-launch-global-modal>
        <img src="<?php echo $featImg; ?>" alt="<?php the_title(); ?>">
        <section class="dflex align-center justify-center overlay-text p:1 z2 has-white-color w100% p:2 md:p:block-4">
          <h3 class="has-big-font-size"><?php the_title(); ?></h3>
        </section>
        <div style="display: none;" data-global-modal-content>
          <div class="block-gap-1">
            <?php if ($angle) { ?>
              <div>
                <p> <strong>Wall Angle:</strong>&nbsp;<?php echo $angle; ?> </p>
              </div>
            <?php } ?>
            <section class="dflex align-center flex-wrap gap-1">
              <?php if ($photos) {
                foreach ($photos as $photo) {
                  $image = $photo["set_photo"]["sizes"]["large"]; ?>
                  <div class="flex-10100% md:flex-1049% mw100%">
                    <img class="mw100%" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                  </div>
              <?php
                }
              } ?>
            </section>
          </div>
        </div>
      </button>
    <?php
    endwhile; ?>
  </div>
</section>
