<?php
global $paged;
$curpage = $paged ? $paged : 1;
$posts = new WP_Query(["post_status" => "publish", "paged" => $paged]);
?>

<section class="wrapper p:block-4">
  <div class="container wide">
    <div class="mt-3 gap-1 dflex justify-end">
      <button class="button button:gray button:icon" data-view="landscape">
        <span class="visually-hidden">Landscape View</span>
        <?php echo get_template_part("icons/th-list"); ?>
      </button>
      <button class="button button:gray button:icon" data-view="portrait">
        <span class="visually-hidden">Portrait View</span>
        <?php echo get_template_part("icons/th-large"); ?>
      </button>
    </div>
    <div class="m:block-1">
      <hr class="hr has-gray-lightest-background-color">
    </div>
    <div class="dgrid gap-1" data-blog-wrapper>
      <?php
      while ($posts->have_posts()):
        $posts->the_post();
        $id = get_the_ID();
        get_template_part("template-parts/blog-post-preview", null, [
          "id" => $id,
        ]);
      endwhile;
      echo '
      <div class="m:block-1">
        <hr class="hr has-gray-lightest-background-color">
      </div>
      <div class="dflex gap-1">
          <a class="first page" href="' .
        get_pagenum_link(1) .
        '">&laquo;</a>
          <a class="previous page" href="' .
        get_pagenum_link($curpage - 1 > 0 ? $curpage - 1 : 1) .
        '">&lsaquo;</a>';
      for ($i = 1; $i <= $posts->max_num_pages; $i++) {
        echo '<a class="' .
          ($i == $curpage ? "active " : "") .
          'page button" href="' .
          get_pagenum_link($i) .
          '">' .
          $i .
          "</a>";
      }
      echo '
          <a class="next page" href="' .
        get_pagenum_link(
          $curpage + 1 <= $posts->max_num_pages
            ? $curpage + 1
            : $posts->max_num_pages,
        ) .
        '">&rsaquo;</a>
          <a class="last page" href="' .
        get_pagenum_link($posts->max_num_pages) .
        '">&raquo;</a>
      </div>
      ';
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>