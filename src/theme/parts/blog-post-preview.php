<?php $id = $args["id"]; ?>
<a class="blog-post__link" href="<?php the_permalink($id); ?>" data-blog-item>
  <article class="blog-post">
    <figure class="blog-post__thumbnail">
      <?php if (get_the_post_thumbnail_url($id)): ?>
        <img
          class="blog-post-thumbnail__image"
          src="<?php echo get_the_post_thumbnail_url($id, "medium"); ?>"
          alt="<?php the_title(); ?>"
        >
      <?php endif; ?>
    </figure>
    <div class="blog-post__content">
      <h3 class="blog-post__title"><?php the_title(); ?></h3>
      <p class="blog-post__date"><?php the_date(); ?></p>
      <?php the_excerpt(); ?>
      <footer class="blog-post__footer">
        <button class="tbl:button tbl:button--primary tbl:button--size-500">Read Full Article</button>
      </footer>
    </div>
  </article>
</a>