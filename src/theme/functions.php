<?php
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: base theme supports
if (!function_exists("tufas_base_theme_supports")):
  function tufas_base_theme_supports()
  {
    // Add support for block styles.
    add_theme_support("wp-block-styles");
    // Enqueue editor styles.
    add_editor_style("assets/styles/editor.css");
    // Add Custom Image Sizes
    add_image_size("xsmall", 320, "");
    add_image_size("small", 640, "");
    add_image_size("medium", 960, "");
    add_image_size("large", 1280, "");
    add_image_size("xlarge", 1600, "");
    add_image_size("xxlarge", 1920, "");
  }
  add_action("after_setup_theme", "tufas_base_theme_supports");
endif;
// #endregion: base theme supports
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: custom menus
if (!function_exists("tufas_add_custom_menus")):
  function tufas_add_custom_menus()
  {
    register_nav_menus([
      "header-nav" => __("Header Nav"),
      "footer-nav" => __("Footer Nav"),
    ]);
  }
  add_action("init", "tufas_add_custom_menus");
endif;
// #endregion: custom menus
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: scripts & styles
if (!function_exists("tufas_theme_scripts")):
  function tufas_theme_scripts()
  {
    wp_enqueue_style(
      "tufas-theme-app-stylesheet",
      get_parent_theme_file_uri("/assets/styles/app.css"),
    );

    wp_enqueue_style(
      "tufas-theme-fonts-stylesheet",
      get_parent_theme_file_uri("/assets/styles/fonts.css"),
    );

    wp_enqueue_style(
      "tufas-theme-wp-overrides-stylesheet",
      get_parent_theme_file_uri("/assets/styles/wp.css"),
    );

    wp_enqueue_script(
      "tufas-theme-app-script",
      get_parent_theme_file_uri("/assets/scripts/app.js"),
    );

    if (is_front_page()) {
      wp_enqueue_style(
        "tufas-theme-front-page-stylesheet",
        get_parent_theme_file_uri("/assets/styles/frontpage.css"),
      );
    }

    if (is_home() && !is_front_page()) {
      wp_enqueue_style(
        "tufas-theme-blog-page-stylesheet",
        get_parent_theme_file_uri("/assets/styles/blog.css"),
      );

      wp_enqueue_script(
        "tufas-theme-blog-page-script",
        get_parent_theme_file_uri("/assets/scripts/blog.js"),
      );
    }

    if (is_singular()) {
      wp_enqueue_style(
        "tufas-theme-singular-stylesheet",
        get_parent_theme_file_uri("/assets/styles/singular.css"),
      );
    }
  }
endif;

add_action("wp_enqueue_scripts", "tufas_theme_scripts");
// #endregion: scripts & styles
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
