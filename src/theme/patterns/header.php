<?php
// #region: init
/**
 * Title: Header
 * Slug: tufas/header
 * Categories: header
 */
// #endregion: init
// #region: variables
$globals = get_field("globals", "option");
$socials = get_field("socials", "option");
$logo_image = tufas_extract_field($globals, "logo_image");
$logo_image_size = "thumbnail";

// #endregion: variables
?>
<a href="/" id="tufas-header-logo" class="tufas-header__logo">
  <?php if ($logo_image) {
    echo wp_get_attachment_image($logo_image["id"], $logo_image_size);
  } ?>
</a>
<section class="tufas-header__content">
  <div class="tufas-header__top-bar">
    <!-- wp:pattern {"slug":"tufas/contact"} /-->
  </div>
  <div class="tufas-header__bottom-bar">
    <nav class="tufas-header__navigation" id="tufas-header-navigation">
      <div class="tufas-header-navigation__inner">
        <?php wp_nav_menu([
          "menu" => "main-menu",
          "container" => false,
          "item_spacing" => "discard",
          "menu_id" => "tufas-header-menu",
          "menu_class" =>
            "tufas-header__menu tbl:dropdown-menu tbl:menu tbl:menu--primary js:dropdown-menu",
        ]); ?>
        <footer class="tufas-header-navigation__footer">
          <!-- wp:pattern {"slug":"tufas/contact"} /-->
        </footer>
      </div>
    </nav>
    <a class="tbl:link tbl:link--button-primary tufas-header__waiver-link" href="/waiver">Waiver</a>
    <button 
      aria-controls="tufas-header-navigation" 
      aria-expanded="false"
      class="tbl:button tbl:button--secondary tbl:button--icon tufas-header__menu-toggle js:toggle"
      data-media="(width &lt;= 1100px)"
      title="Toggle menu"
      type="button" 
    >
    <span class="tufas-header-menu-toggle__icon tufas-header-menu-toggle__icon--closed">
      <?php echo get_template_part("icons/bars"); ?>
    </span>
    <span class="tufas-header-menu-toggle__icon tufas-header-menu-toggle__icon--expanded">
      <?php echo get_template_part("icons/close"); ?>
    </span>
    </button>
  </div>
</section>