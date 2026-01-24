<!-- TODO: Update file -->
<?php
$team = new WP_Query([
  "post_type" => "team_members",
  "posts_per_page" => -1,
  "post_status" => "publish",
  "meta_key" => "fields_active",
  "meta_value" => "1",
  "compare" => "=",
  "order" => "ASC",
]);
$remainder = $team->post_count % 4;
?>

<div class="team">
  <section class="team__container">
    <?php while ($team->have_posts()):

      $team->the_post();
      $id = get_the_ID();
      $fields = get_field("fields", $id);
      ?>
      <a 
        class="team__member" 
        href="<?php the_permalink($id); ?>"
      >
        <?php echo get_the_post_thumbnail($id); ?>
        <section class="team-member__text">
          <header class="team-member-text__header">
            <h3 class="tbl:h5"><?php the_title(); ?></h3>
            <strong 
              class="team-member-text__position"
            >
              <?php echo $fields["position"]; ?>
            </strong>
          </header>
          <article class="team-member-text__excerpt">
            <?php the_excerpt(); ?>
          </article>
          <footer>
            <button class="tbl:button tbl:button--primary tbl:button--size-500">Read More</button>
          </footer>
        </section>
      </a>
    <?php
    endwhile; ?>
    <?php if ($remainder > 0): ?>
      <div class="dflex align-center justify-center rounded has-gray-lighter-background-color has-text-align-center p:1" style="grid-column: span <?php echo $remainder; ?>">
        <div class="block-gap-1">
          <h3 class="has-xl-font-size has-green-color">Want to Join the team?</h3>
          <a class="button button:default button:filled-in" href="/contact">Get In Touch</a>
        </div>
      </div>
    <?php endif; ?>
  </section>
</div>