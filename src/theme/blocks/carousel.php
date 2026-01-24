<article 
  class="carousel js:carousel" 
  data-autoslide="<?php echo get_field("autoslide"); ?>" 
  data-timing="<?php echo get_field("timing"); ?>"
  >
  <?php if (have_rows("slides")):
    while (have_rows("slides")):

      the_row();
      $description = get_sub_field("description", false);
      $image = get_sub_field("image");
      $link = get_sub_field("link");
      ?>
      <section class="carousel__slide js:carousel-slide">
        <div class="carousel-slide__image" inert aria-hidden="true">
          <?php if ($image) {
            echo wp_get_attachment_image($image["id"], "xxlarge");
          } ?>
        </div>
        <div class="carousel-slide__content">
          <div class="carousel-slide-content__text">
            <h2 class="tbl:h2"><?php the_sub_field("title"); ?></h2>
            <?php if ($description) {
              echo "<p class=\"tbl:paragraph--large\">$description</p>";
            } ?>
          </div>
          <footer class="carousel-slide-content__footer">
          <?php if ($link):
            $link_url = esc_url($link["url"]);
            $link_title = $link["title"];
            echo "<a class=\"tbl:link tbl:link--button-primary\" href=\"$link_url\">$link_title</a>";
          endif; ?>
          </footer>
        </div>
      </section>
  <?php
    endwhile;
  endif; ?>
  <button 
    class="carousel__control carousel__control--left tbl:button tbl:button--primary tbl:button--icon" 
    data-arrow="-1" 
    title="View Previous Slide"
  >
    <?php get_template_part("icons/chevron-left"); ?>
  </button>
  <button 
    class="carousel__control carousel__control--right tbl:button tbl:button--primary tbl:button--icon" 
    data-arrow="1" 
    title="View Next Slide"
  >
    <?php get_template_part("icons/chevron-right"); ?>
  </button>
  <footer class="carousel__dots js:carousel-dots">
    <!-- dots will be generated here -->
  </footer>
</article>