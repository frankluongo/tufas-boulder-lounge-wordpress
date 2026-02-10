<?php
$postType = get_field("post_type");
$array = [
  "post_type" => $postType,
  "posts_per_page" => -1,
  "post_status" => "publish",
];
$limit = get_field("limit");
if ($limit) {
  $array["cat"] = get_field("category");
}
$classes = new WP_Query($array);
?>

<section class="classes">
  <div class="classes__container">
    <?php while ($classes->have_posts()):

      $classes->the_post();
      $id = get_the_ID();
      $fields = get_field("fields", $id);
      ?>
      <article class="class">
        <figure class="class__figure">
          <img 
            class="class__image"
            src="<?php echo get_the_post_thumbnail_url($id); ?>" 
            alt="<?php the_title(); ?>"
          />
        </figure>
        <section class="class__content">
          <div>
            <p class="class-content__heading tbl:heading tbl:heading--h4">Class</p>
            <h3 class="wp-block-heading"><?php the_title(); ?></h3>
          </div>
          <div>
            <p class="class-content__heading tbl:heading tbl:heading--h4">Date / Time</p>
            <?php echo $fields["when"]; ?>
          </div>
          <div>
            <p class="class-content__heading tbl:heading tbl:heading--h4">Price</p>
            <?php echo $fields["price"]; ?>
          </div>
          <div>
            <p class="class-content__heading tbl:heading tbl:heading--h4">What To Expect</p>
            <?php echo $fields["excerpt"]; ?>
          </div>
          <footer class="class-content__footer">
            <a 
              class="tbl:link tbl:link--button-secondary" 
              href="<?php the_permalink($id); ?>"
            >
              Learn More
            </a>
            <?php if (!empty($fields["signup_link"]["url"])): ?>
              <a 
                class="tbl:link tbl:link--button-primary" 
                href="<?php echo $fields["signup_link"]["url"]; ?>" 
                target="<?php echo $fields["signup_link"]["target"]; ?>"
              >
                <?php echo $fields["signup_link"]["title"]; ?>
              </a>
            <?php endif; ?>
          </footer>
        </section>
      </article>
    <?php
    endwhile; ?>
  </div>
</section>