<?php
/*
 * Plugin Name: Tufas Boulder Lounge Custom Features
 * Description: Custom features and functionality for the Tufas Boulder Lounge website.
 */
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: acf custom blocks
if (!function_exists("tufas_acf_init_custom_blocks")):
  function tufas_acf_init_custom_blocks()
  {
    // Check ACF function exists.
    if (function_exists("acf_register_block_type")) {
      acf_register_block_type([
        "name" => "blog",
        "title" => __("Blog Posts"),
        "description" => __("Display Blog Posts"),
        "render_template" => "blocks/blog.php",
        "category" => "widget",
        "icon" => "images-alt",
        "enqueue_style" => get_template_directory_uri() . "/assets/blog.css",
        "enqueue_script" => get_template_directory_uri() . "/assets/blog.js",
        "keywords" => ["blog", "posts"],
      ]);

      acf_register_block_type([
        "name" => "carousel",
        "title" => __("Image Carousel"),
        "description" => __("Display a carousel of images"),
        "render_template" => "blocks/carousel.php",
        "category" => "widget",
        "icon" => "images-alt",
        "enqueue_style" => get_parent_theme_file_uri(
          "/assets/styles/blocks/carousel.css",
        ),
        "enqueue_script" => get_parent_theme_file_uri(
          "/assets/scripts/blocks/carousel.js",
        ),
        "keywords" => ["carousel"],
      ]);

      acf_register_block_type([
        "name" => "classes",
        "title" => __("Classes"),
        "description" => __("Display a list of classes"),
        "render_template" => "blocks/classes.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["class", "classes"],
      ]);

      acf_register_block_type([
        "name" => "icon",
        "title" => __("Custom Icon"),
        "description" => __("Display Custom Icon"),
        "render_template" => "blocks/icon.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["icon", "icons"],
      ]);

      acf_register_block_type([
        "name" => "logo",
        "title" => __("Website Logo"),
        "description" => __("Display the Website Logo"),
        "render_template" => "blocks/logo.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["logo", "website"],
      ]);

      acf_register_block_type([
        "name" => "post-cards",
        "title" => __("Posts (Card Display)"),
        "description" => __("Display Posts in Cards"),
        "render_template" => "blocks/post-cards.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["cards", "card"],
      ]);

      acf_register_block_type([
        "name" => "pricing",
        "title" => __("Pricing"),
        "description" => __("Display Pricing"),
        "render_template" => "blocks/pricing.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["pricing", "chart"],
      ]);

      acf_register_block_type([
        "name" => "services",
        "title" => __("Services"),
        "description" => __("Display Services"),
        "render_template" => "blocks/services.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["services"],
      ]);

      acf_register_block_type([
        "name" => "team",
        "title" => __("Tufas Team"),
        "description" => __("Display Tufas Team Members"),
        "render_template" => "blocks/team.php",
        "enqueue_style" => get_parent_theme_file_uri(
          "/assets/styles/blocks/team.css",
        ),
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["team"],
      ]);

      acf_register_block_type([
        "name" => "routesetters",
        "title" => __("Tufas Routesetters"),
        "description" => __("Display Tufas Routesetters"),
        "render_template" => "blocks/routesetters.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["routesetter", "routesetters", "route"],
      ]);

      acf_register_block_type([
        "name" => "walls",
        "title" => __("Walls Info"),
        "description" => __("Display Tufas Walls"),
        "render_template" => "blocks/walls.php",
        "category" => "widget",
        "icon" => "images-alt",
        "keywords" => ["walls", "wall"],
      ]);
    }
  }
  add_action("acf/init", "tufas_acf_init_custom_blocks");
endif;
// #endregion: acf custom blocks
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: acf | init options page
//  Add ACF Options Page
if (function_exists("acf_add_options_page")) {
  acf_add_options_page([
    "page_title" => "Theme Settings",
    "menu_title" => "Theme Settings",
    "menu_slug" => "theme-settings",
    "capability" => "edit_posts",
    "show_in_graphql" => true,
    "redirect" => false,
  ]);
}
// #endregion: acf | init options page
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: acf | global items
add_action("acf/include_fields", function () {
  if (!function_exists("acf_add_local_field_group")) {
    return;
  }

  acf_add_local_field_group([
    "key" => "group_606125a4ee801",
    "title" => "Theme Settings",
    "fields" => [
      [
        "key" => "field_606125a92cc5f",
        "label" => "Global Items",
        "type" => "tab",
      ],
      [
        "key" => "field_606125bf2cc60",
        "name" => "globals",
        "type" => "group",
        "layout" => "block",
        "sub_fields" => [
          [
            "key" => "field_global_logo_image",
            "label" => "Logo Image",
            "name" => "logo_image",
            "type" => "image",
          ],
          [
            "key" => "field_606125d52cc61",
            "label" => "Address (Single Line)",
            "name" => "address",
            "type" => "text",
          ],
          [
            "key" => "field_6061268c2cc6e",
            "label" => "Address (Formatted)",
            "name" => "address_formatted",
            "type" => "wysiwyg",
          ],
          [
            "key" => "field_606125dc2cc62",
            "label" => "Phone Number",
            "name" => "phone_number",
            "type" => "text",
          ],
          [
            "key" => "field_606125e22cc63",
            "label" => "Email Address",
            "name" => "email_address",
            "type" => "text",
          ],
          [
            "key" => "field_606126452cc6a",
            "label" => "Hours",
            "name" => "hours",
            "type" => "group",
            "layout" => "block",
            "sub_fields" => [
              [
                "key" => "field_6061264f2cc6b",
                "label" => "Days",
                "name" => "days",
                "type" => "repeater",
                "layout" => "block",
                "button_label" => "Add Row",
                "sub_fields" => [
                  [
                    "key" => "field_6061266d2cc6c",
                    "label" => "Day(s)",
                    "name" => "days",
                    "type" => "text",
                    "parent_repeater" => "field_6061264f2cc6b",
                  ],
                  [
                    "key" => "field_606126792cc6d",
                    "label" => "Hours",
                    "name" => "hours",
                    "type" => "text",
                    "parent_repeater" => "field_6061264f2cc6b",
                  ],
                ],
                "rows_per_page" => 20,
              ],
            ],
          ],
          [
            "key" => "field_6061299a21703",
            "label" => "Google Maps Url",
            "name" => "google_maps_url",
            "type" => "url",
          ],
          [
            "key" => "field_tufas_google_maps_embed",
            "label" => "Google Embed HTML",
            "name" => "google_maps_embed_html",
            "type" => "textarea",
          ],
          [
            "key" => "field_606b8b12db397",
            "label" => "Mission Statement",
            "name" => "mission_statement",
            "type" => "textarea",
          ],
        ],
      ],
      [
        "key" => "field_606125f02cc64",
        "label" => "Socials",
        "type" => "tab",
      ],
      [
        "key" => "field_606125fc2cc65",
        "name" => "socials",
        "type" => "group",
        "layout" => "block",
        "sub_fields" => [
          [
            "key" => "field_606126042cc66",
            "label" => "Facebook",
            "name" => "facebook",
            "type" => "url",
          ],
          [
            "key" => "field_6061260d2cc67",
            "label" => "Twitter",
            "name" => "twitter",
            "type" => "url",
          ],
          [
            "key" => "field_6061261b2cc68",
            "label" => "Instagram",
            "name" => "instagram",
            "type" => "url",
          ],
          [
            "key" => "field_606126242cc69",
            "label" => "YouTube",
            "name" => "youtube",
            "type" => "url",
          ],
        ],
      ],
      [
        "key" => "field_606126af2cc6f",
        "label" => "Services Pricing",
        "type" => "tab",
      ],
      [
        "key" => "field_606126d72cc70",
        "name" => "services",
        "type" => "repeater",
        "layout" => "table",
        "button_label" => "Add Row",
        "sub_fields" => [
          [
            "key" => "field_606127152cc71",
            "label" => "Service",
            "name" => "service",
            "type" => "text",
            "parent_repeater" => "field_606126d72cc70",
          ],
          [
            "key" => "field_6061271c2cc72",
            "label" => "Discounted Rate",
            "name" => "discounted_rate",
            "type" => "text",
            "parent_repeater" => "field_606126d72cc70",
          ],
          [
            "key" => "field_606127232cc73",
            "label" => "Base Rate",
            "name" => "base_rate",
            "type" => "text",
            "parent_repeater" => "field_606126d72cc70",
          ],
          [
            "key" => "field_606127292cc74",
            "label" => "Sustainer Rate",
            "name" => "sustainer_rate",
            "type" => "text",
            "parent_repeater" => "field_606126d72cc70",
          ],
          [
            "key" => "field_60927058bd4a2",
            "label" => "Includes Link?",
            "name" => "includes_link",
            "type" => "true_false",
            "parent_repeater" => "field_606126d72cc70",
          ],
        ],
        "rows_per_page" => 20,
      ],
      [
        "key" => "field_6061286fe5525",
        "label" => "Services Offered",
        "type" => "tab",
      ],
      [
        "key" => "field_6061273b2cc75",
        "name" => "services_offered",
        "type" => "repeater",
        "layout" => "table",
        "button_label" => "Add Row",
        "sub_fields" => [
          [
            "key" => "field_606127562cc76",
            "label" => "Service",
            "name" => "service",
            "type" => "group",
            "layout" => "block",
            "sub_fields" => [
              [
                "key" => "field_606127662cc77",
                "label" => "Name",
                "name" => "name",
                "type" => "text",
              ],
              [
                "key" => "field_6061276c2cc78",
                "label" => "Options",
                "name" => "options",
                "type" => "repeater",
                "layout" => "table",
                "button_label" => "Add Row",
                "sub_fields" => [
                  [
                    "key" => "field_606127932cc79",
                    "label" => "Title",
                    "name" => "title",
                    "type" => "text",
                    "parent_repeater" => "field_6061276c2cc78",
                  ],
                  [
                    "key" => "field_6061279c2cc7a",
                    "label" => "Price",
                    "name" => "price",
                    "type" => "text",
                    "parent_repeater" => "field_6061276c2cc78",
                  ],
                  [
                    "key" => "field_606127a82cc7b",
                    "label" => "Benefits",
                    "name" => "benefits",
                    "type" => "repeater",
                    "collapsed" => "",
                    "layout" => "table",
                    "button_label" => "Add Row",
                    "sub_fields" => [
                      [
                        "key" => "field_606127b92cc7c",
                        "label" => "Benefit",
                        "name" => "benefit",
                        "type" => "textarea",
                        "parent_repeater" => "field_606127a82cc7b",
                      ],
                    ],
                    "rows_per_page" => 20,
                    "parent_repeater" => "field_6061276c2cc78",
                  ],
                  [
                    "key" => "field_606127c52cc7d",
                    "label" => "Purchase Link",
                    "name" => "purchase_link",
                    "type" => "link",
                    "return_format" => "array",
                    "parent_repeater" => "field_6061276c2cc78",
                  ],
                ],
                "rows_per_page" => 20,
              ],
            ],
            "parent_repeater" => "field_6061273b2cc75",
          ],
        ],
        "rows_per_page" => 20,
      ],
      [
        "key" => "field_6064dd0253abd",
        "label" => "Current Occupancy",
        "type" => "tab",
        "placement" => "top",
        "endpoint" => 0,
        "selected" => 0,
      ],
      [
        "key" => "field_6064dd0e53abe",
        "label" => "Current # of Occupants",
        "name" => "current_occupancy",
        "type" => "number",

        "min" => "",
        "max" => "",
        "step" => "",
      ],
      [
        "key" => "field_6064dd2c53abf",
        "label" => "Total Capacity",
        "name" => "total_capacity",
        "type" => "number",

        "min" => "",
        "max" => "",
        "step" => "",
      ],
      [
        "key" => "field_616f436e44488",
        "label" => "Announcement",
        "name" => "",
        "type" => "tab",

        "show_in_graphql" => 1,
        "placement" => "top",
        "endpoint" => 0,
        "selected" => 0,
      ],
      [
        "key" => "field_616f438044489",
        "label" => "Announcement",
        "name" => "announcement",
        "type" => "group",

        "show_in_graphql" => 1,
        "layout" => "block",
        "sub_fields" => [
          [
            "key" => "field_616f43e94448c",
            "label" => "Display?",
            "name" => "display",
            "type" => "true_false",

            "show_in_graphql" => 1,
            "message" => "",
            "default_value" => 0,
            "ui" => 0,
            "ui_on_text" => "",
            "ui_off_text" => "",
          ],
          [
            "key" => "field_616f439f4448a",
            "label" => "Start Date",
            "name" => "start_date",
            "type" => "date_picker",
            "show_in_graphql" => 1,
            "display_format" => "m/d/Y",
            "return_format" => "m/d/Y",
            "first_day" => 1,
            "default_to_current_date" => 0,
          ],
          [
            "key" => "field_616f43dc4448b",
            "label" => "End Date",
            "name" => "end_date",
            "type" => "date_picker",

            "show_in_graphql" => 1,
            "display_format" => "m/d/Y",
            "return_format" => "m/d/Y",
            "first_day" => 1,
            "default_to_current_date" => 0,
          ],
          [
            "key" => "field_616f44244448d",
            "label" => "Announcement Text",
            "name" => "announcement_text",
            "type" => "wysiwyg",

            "show_in_graphql" => 1,
            "tabs" => "all",
            "toolbar" => "full",
            "media_upload" => 1,
            "delay" => 0,
          ],
          [
            "key" => "field_61700b59fe4bb",
            "label" => "Link (Optional)",
            "name" => "link",
            "type" => "link",

            "show_in_graphql" => 1,
            "return_format" => "array",
          ],
        ],
      ],
    ],
    "location" => [
      [
        [
          "param" => "options_page",
          "operator" => "==",
          "value" => "theme-settings",
        ],
      ],
      [
        [
          "param" => "page",
          "operator" => "==",
          "value" => "6591",
        ],
      ],
    ],
    "menu_order" => 0,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "top",
    "instruction_placement" => "label",
    "hide_on_screen" => "",
    "active" => true,
    "description" => "",
    "show_in_rest" => 0,
    "display_title" => "",
    "show_in_graphql" => 0,
    "graphql_field_name" => "themeSettings",
    "map_graphql_types_from_location_rules" => 0,
    "graphql_types" => "",
  ]);
});
// #endregion: acf | global items
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: custom footer hook
if (!function_exists("tufas_add_to_footer")):
  function tufas_add_to_footer()
  {
    ?>
  <global-modal style="display: none;" aria-hidden="true">
    <button class="global-modal-close" type="button" title="Close Modal" data-close-global-modal>
      <span class="visually-hidden">Close Modal</span>
      <svg class="global-modal-icon" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 352 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
        <path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
      </svg>
    </button>
    <global-modal-content></global-modal-content>
  </global-modal>
<?php
  }
  add_action("wp_footer", "tufas_add_to_footer");
endif;
// #endregion: custom footer hook
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: helpers
function tufas_check_for_image($image_arr, $size)
{
  if (!$image_arr || !array_key_exists("sizes", $image_arr)) {
    return "";
  }
  $sizes = $image_arr["sizes"];
  if (!array_key_exists($size, $sizes)) {
    return "";
  }
  return $sizes[$size];
}

function tufas_console_log($data)
{
  echo "<script>";
  echo "console.log(" . json_encode($data) . ")";
  echo "</script>";
}

function tufas_extract_field($array, $field)
{
  if (!isset($array)) {
    return "";
  }
  if (array_key_exists($field, $array)) {
    return $array[$field];
  }
  return "";
}

function tufas_slugify($string)
{
  return strtolower(trim(preg_replace("/[^A-Za-z0-9-]+/", "-", $string)));
}
// #endregion: helpers
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: shortcodes
function display_class_details()
{
  $fields = get_field("fields");
  $price = $fields["price"];
  $when = $fields["when"];
  $has_url = !empty($fields["signup_link"]["url"]);
  if ($has_url) {
    $link_url = $fields["signup_link"]["url"];
    $link_target = $fields["signup_link"]["target"];
    $link_title = $fields["signup_link"]["title"];
    return <<<HTML
    <div class="block-gap-1">
      <div><p class="font-secondary has-gray-medium-color has-small-font-size">Date / Time</p>{$when}</div>
      <div><p class="font-secondary has-gray-medium-color has-small-font-size">Price</p>{$price}</div>
      <a class="button button:filled-in button:default" href="$link_url" target="{$link_target}">{$link_title}</a>
    </div>
    HTML;
  } else {
    return <<<HTML
    <div class="block-gap-1">
      <div><p class="font-secondary has-gray-medium-color has-small-font-size">Date / Time</p>{$when}</div>
      <div><p class="font-secondary has-gray-medium-color has-small-font-size">Price</p>{$price}</div>
    </div>
    HTML;
  }
}

function display_feat_image()
{
  $featImg = get_the_post_thumbnail_url();
  $title = get_the_title();

  if ($featImg) {
    return "<figure class=\"image-wrapper has-green-background-color rounded pt:290px\"><img src=\"$featImg\" alt=\"$title\"></figure>";
  }
}

function render_template_part($atts)
{
  $template_name = $atts["template_name"];
  ob_start();
  get_template_part("template-parts/$template_name", null, $atts);
  return ob_get_clean();
}

add_shortcode("display_class_details", "display_class_details");
add_shortcode("display_feat_image", "display_feat_image");
add_shortcode("render_template_part", "render_template_part");
// #endregion: shortcodes
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
