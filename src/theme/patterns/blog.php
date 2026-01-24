<?php
/**
 * Title: Blog Content
 * Slug: tufas/blogcontent
 * Categories: featured
 */

global $paged;
$curpage = $paged ? $paged : 1;
$posts = new WP_Query(["post_status" => "publish", "paged" => $paged]);
?>
<section class="tufas-blog-content">
  <div class="tufas-blog-content__container">
    <header class="tufas-blog-content__controls">
      <button 
        class="tbl:button tbl:button--icon tbl:button--ghost js:view-toggle" 
        data-view="landscape"
        title="View posts in landscape"
      >
        <?php echo get_template_part("icons/th-list"); ?>
      </button>
      <button 
        class="tbl:button tbl:button--icon tbl:button--ghost js:view-toggle" 
        data-view="portrait" 
        title="View posts in portrait"
      >
        <?php echo get_template_part("icons/th-large"); ?>
      </button>
    </header>
    <hr class="tufas-blog-content__divider">
    <section class="tufas-blog-content__posts js:blog-posts">
      <?php while ($posts->have_posts()):
        $posts->the_post();
        $id = get_the_ID();
        get_template_part("parts/blog-post-preview", null, [
          "id" => $id,
        ]);
      endwhile; ?>
      <hr class="tufas-blog-content__divider">
      <footer class="tufas-blog-content__pagination">
        <a 
          class="tbl:link" 
          href="<?php echo get_pagenum_link(1); ?>"
        >
          &laquo;
        </a>
        <a 
          class="tbl:link" 
          href="<?php echo get_pagenum_link(
            $curpage - 1 > 0 ? $curpage - 1 : 1,
          ); ?>"
        >
          &lsaquo;
        </a>
      <?php for ($i = 1; $i <= $posts->max_num_pages; $i++) { ?>
        <a 
          class="tbl:link <?php echo $i == $curpage ? "active " : ""; ?>"
          href="<?php echo get_pagenum_link($i); ?>">
          <?php echo $i; ?>
        </a>
      <?php } ?>
        <a 
          class="tbl:link next page" 
          href="
            <?php echo get_pagenum_link(
              $curpage + 1 <= $posts->max_num_pages
                ? $curpage + 1
                : $posts->max_num_pages,
            ); ?>"
        >
          &rsaquo;
        </a>
        <a class="tbl:link last page" href="<?php echo get_pagenum_link(
          $posts->max_num_pages,
        ); ?>">&raquo;</a>
      </footer>
      <?php wp_reset_postdata(); ?>
    </section>
  </div>
</section>