<?php
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
    // Name Stylesheet.
    $app_styles = "app-stylesheet";
    // Register theme stylesheet.
    $theme_version = wp_get_theme()->get("Version");
    $version_string = is_string($theme_version) ? $theme_version : false;

    wp_register_style(
      $app_styles,
      get_template_directory_uri() . "/assets/app.css",
      [],
      $version_string,
    );
    wp_enqueue_script("app", get_template_directory_uri() . "/assets/app.js");

    // Enqueue theme stylesheet.
    wp_enqueue_style($app_styles);
  }
endif;

add_action("wp_enqueue_scripts", "tufas_theme_scripts");
// #endregion: scripts & styles
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
