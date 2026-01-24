<?php
$icon = get_field("icon");
$size = get_field("size");
$color = get_field("color");
?>

<span class="tbl:icon" style="--size: <?php echo $size; ?>rem;--color: <?php echo $color; ?>;">
  <?php get_template_part("icons/$icon"); ?>
</span>