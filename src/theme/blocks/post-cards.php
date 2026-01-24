<!-- TODO: Update file -->
<?php
$type = get_field("type");
$events = new WP_Query([
  "post_type" => "events",
  "posts_per_page" => -1,
  "post_status" => "publish",
]);
$filtered_events =
  $type === "past"
    ? array_filter($events->posts, "is_past")
    : array_filter($events->posts, "is_upcoming");
?>

<section class="wrapper p:block-4">
  <div class="container wide dgrid gap-1 md:cols-3">
    <?php foreach ($filtered_events as &$event):
      $id = $event->ID; ?>
      <article class="card p:1 lg:p:2 block-gap-1">
        <figure class="image-wrapper pt:100% has-green-background-color">
          <img src="<?php echo get_the_post_thumbnail_url(
            $id,
          ); ?>" alt="<?php the_title(); ?>">
        </figure>
        <section class="block-gap-1">
          <div>
            <p class="has-small-font-size font-secondary has-gray-dark-color">Event</p>
            <h3 class="has-big-font-size"><?php echo get_the_title($id); ?></h3>
          </div>
          <div class="dflex gap-1">
            <div>
              <p class="has-small-font-size font-secondary has-gray-dark-color">Date</p>
              <p><?php echo get_field("date", $id); ?></p>
            </div>
            <div>
              <p class="has-small-font-size font-secondary has-gray-dark-color">Start Time</p>
              <p><?php echo get_field("start_time", $id); ?></p>
            </div>
            <div>
              <p class="has-small-font-size font-secondary has-gray-dark-color">End Time</p>
              <p><?php echo get_field("end_time", $id); ?></p>
            </div>
          </div>
          <div>
            <?php echo get_the_excerpt($id); ?>
          </div>
          <a class="button button:default button:outlined" href="<?php the_permalink(
            $id,
          ); ?>">Learn More</a>
        </section>
      </article>
    <?php
    endforeach; ?>
  </div>
</section>
