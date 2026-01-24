<?php
/**
 * Title: Fotoer
 * Slug: tufas/footer
 * Categories: footer
 */
$globals = get_field("globals", "option"); ?>
<section class="tufas-footer tufas-footer--top">
  <div class="tufas-footer__content tufas-footer-content--top">
    <aside class="tufas-footer-content__left">
      <div class="tbl:iframe tbl:iframe--map">
        <?php echo tufas_extract_field($globals, "google_maps_embed_html"); ?>
      </div>
    </aside>
    <article class="tufas-footer-content__right">
      <h2 class="tbl:h4 tbl:heading--styled">Climb With Us</h2>
      <section class="tufas-footer__block tufas-footer-block">
        <header class="tufas-footer-block__heading">
          <?php echo get_template_part("icons/pin"); ?>
          <h3 class="tufas-footer-block__heading-text tbl:h5">Our Address</h3>
        </header>
        <address class="tbl:address tufas-footer-block__text">
          <?php echo tufas_extract_field($globals, "address_formatted"); ?>
        </address>
      </section>
      <section class="tufas-footer__block tufas-footer-block">
        <header class="tufas-footer-block__heading">
          <?php echo get_template_part("icons/clock"); ?>
          <h3 class="tufas-footer-block__heading-text tbl:h5">Hours of Operation</h3>
        </header>
        <ul class="tufas-footer-block__text tufas-footer-block__text--list">
          <?php
          $hours_of_operation = tufas_extract_field($globals, "hours");
          $hoo_days_array = $hours_of_operation["days"];
          if ($hoo_days_array):
            foreach ($hoo_days_array as $day) {
              echo "
                <li>
                <p class=\"tbl:paragraph\">
                  <strong>{$day["days"]}</strong>: {$day["hours"]}
                </p>
              </li>
              ";
            }
          endif;
          ?>
        </ul>
      </section>
      <section class="tufas-footer__block tufas-footer-block">
        <header class="tufas-footer-block__heading">
          <?php echo get_template_part("icons/chat"); ?>
          <h3 class="tufas-footer-block__heading-text tbl:h5">Any Questions?</h3>
        </header>
        <ul class="tufas-footer-block__text tufas-footer-block__text--list">
          <li>
            <a 
              class="tbl:link" 
              href="mailto:<?php echo tufas_extract_field(
                $globals,
                "email_address",
              ); ?>"
            >
              <?php echo tufas_extract_field($globals, "email_address"); ?>
            </a>
          </li>
          <li>
            <a 
              class="tbl:link" 
              href="tel:<?php echo tufas_extract_field(
                $globals,
                "phone_number",
              ); ?>"
            >
              <?php echo tufas_extract_field($globals, "phone_number"); ?>
            </a>
          </li>
        </ul>
      </section>
    </article>
  </div>
</section>
<section class="tufas-footer tufas-footer--bottom">
  <div class="tufas-footer__content tufas-footer-content--bottom">
    <aside class="tufas-footer-content__left">
      <h2 class="tbl:h4">Who we are</h2>
      <p class="tbl:paragraph">
        <?php echo tufas_extract_field($globals, "mission_statement"); ?>
      </p>
      <p class="tbl:paragraph tufas-footer__address">
        <?php echo get_template_part("icons/pin"); ?>
        <span>
          <?php echo tufas_extract_field($globals, "address"); ?>
        </span>
      </p>
      <a class="tbl:link tbl:link--on-dark" href="mailto:<?php echo tufas_extract_field(
        $globals,
        "email_address",
      ); ?>">
        <?php echo tufas_extract_field($globals, "email_address"); ?>
      </a>
      <a class="tbl:link tbl:link--on-dark" href="tel:<?php echo tufas_extract_field(
        $globals,
        "phone_number",
      ); ?>">
        <?php echo tufas_extract_field($globals, "phone_number"); ?>
      </a>
    </aside>
    <article class="tufas-footer-content__right">
      <?php wp_nav_menu([
        "menu" => "footer-menu",
        "container" => false,
        "item_spacing" => "discard",
        "menu_id" => "tufas-footer-menu",
        "menu_class" => "tufas-footer__menu",
      ]); ?>
  
      <?php wp_nav_menu([
        "menu" => "main-menu",
        "container" => false,
        "item_spacing" => "discard",
        "menu_id" => "tufas-footer-menu-all",
        "menu_class" => "tufas-footer__menu",
      ]); ?>
    </article>
  </div>
</section>