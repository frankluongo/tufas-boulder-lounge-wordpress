<!-- TODO: Update file -->

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

<section class="wrapper p:block-4">
  <div class="container wide block-gap-3 md:block-gap-6">
    <?php while ($classes->have_posts()):

      $classes->the_post();
      $id = get_the_ID();
      $fields = get_field("fields", $id);
      ?>
      <article class="dgrid md:cols-2 gap-1 align-center alternating">
        <figure class="dblock image-wrapper rounded has-green-background-color w100% h100%">
          <img src="<?php echo get_the_post_thumbnail_url(
            $id,
          ); ?>" alt="<?php the_title(); ?>">
        </figure>
        <section class="block-gap-1">
          <div>
            <p class="font-secondary has-gray-medium-color has-small-font-size">Class</p>
            <h3 class="has-big-font-size"><?php the_title(); ?></h3>
          </div>
          <div>
            <p class="font-secondary has-gray-medium-color has-small-font-size">Date / Time</p>
            <?php echo $fields["when"]; ?>
          </div>
          <div>
            <p class="font-secondary has-gray-medium-color has-small-font-size">Price</p>
            <?php echo $fields["price"]; ?>
          </div>
          <div>
            <p class="font-secondary has-gray-medium-color has-small-font-size">What To Expect</p>
            <?php echo $fields["excerpt"]; ?>
          </div>
          <div class="md:dflex gap-1">
            <a class="button button:outlined button:default" href="<?php the_permalink(
              $id,
            ); ?>">
              Learn More
            </a>
            <?php if (!empty($fields["signup_link"]["url"])): ?>
              <a class="button button:filled-in button:default" href="<?php echo $fields[
                "signup_link"
              ]["url"]; ?>" target="<?php echo $fields["signup_link"][
  "target"
]; ?>">
                <?php echo $fields["signup_link"]["title"]; ?>
              </a>
            <?php endif; ?>
          </div>
        </section>
      </article>
    <?php
    endwhile; ?>
  </div>
</section>