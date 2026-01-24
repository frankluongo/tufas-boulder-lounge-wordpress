<!-- TODO: Update file -->
<?php $rows = get_field("services_offered", "option"); ?>

<section class="wrapper p:block-4">
  <div class="container block-gap-3">
    <?php if ($rows) {
      foreach ($rows as $row) {
        $info = $row["service"]; ?>
        <div class="block-gap-1">
          <h2 class="has-xxl-font-size has-text-align-center mb:2">
            <?php echo $info["name"]; ?>
          </h2>
          <div class="dflex justify-center gap-1">
            <?php
            $options = $info["options"];
            if ($options) {
              foreach ($options as $option) { ?>
                <article class="w100% mw336px flex-01336px" id="#<?php echo $option[
                  "title"
                ]; ?>">
                  <h3 class="rounded-top has-gray-lightest-background-color p:1 has-text-align-center font-secondary">
                    <?php echo $option["title"]; ?>
                  </h3>
                  <div class="has-green-background-color has-white-color p:1 has-text-align-center font-secondary has-big-font-size">
                    <?php echo $option["price"]; ?>
                  </div>
                  <?php
                  $benefits = $option["benefits"];
                  if ($benefits) {
                    foreach ($benefits as $benefit) { ?>
                      <div class="has-gray-lightest-background-color p:1 has-text-align-center mt-2px last-rounded-bottom">
                        <?php echo $benefit["benefit"]; ?>
                      </div>
                  <?php }
                  }
                  ?>
                </article>
            <?php }
            }
            ?>
          </div>
        </div>
    <?php
      }
    } ?>
  </div>
</section>
