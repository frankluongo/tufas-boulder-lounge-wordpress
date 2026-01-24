<?php
/**
 * Title: Contact
 * Slug: tufas/contact
 * Categories: contact
 */
// #region: variables
$globals = get_field("globals", "option");
$socials = get_field("socials", "option");

// #endregion: variables
?>
<div class="tbl:contact">
  <div>
    <?php echo tufas_extract_field($globals, "address"); ?>
  </div>
  <div>
    <?php echo tufas_extract_field($globals, "phone_number"); ?>
  </div>
  <!-- wp:social-links {"iconColor":"gray-lightest","iconColorValue":"#f6f6f6","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":"8px"}}} -->
    <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only unstyled-list">
    <!-- wp:social-link {"url":"<?php echo tufas_extract_field(
      $globals,
      "email_address",
    ); ?>","service":"mail"} /-->
    <!-- wp:social-link {"url":"<?php echo tufas_extract_field(
      $socials,
      "facebook",
    ); ?>","service":"facebook"} /-->
    <!-- wp:social-link {"url":"<?php echo tufas_extract_field(
      $socials,
      "instagram",
    ); ?>","service":"instagram"} /-->
    <!-- wp:social-link {"url":"<?php echo tufas_extract_field(
      $socials,
      "youtube",
    ); ?>","service":"youtube"} /-->
    </ul>
  <!-- /wp:social-links -->
</div>
