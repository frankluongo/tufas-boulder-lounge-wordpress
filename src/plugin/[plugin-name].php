<?php
/*
 * Plugin Name: Tufas
 */

// #region: acf
//  Add ACF Options Page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'show_in_graphql' => true,
    'redirect'    => false
  ));
}
// #endregion: acf