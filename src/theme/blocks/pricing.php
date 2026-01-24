<!-- TODO: Update file -->
<?php $rows = get_field("services", "option"); ?>

<section class="wrapper p:block-4">
  <div class="container">
    <table-outer>
      <table-inner>
        <table>
          <thead>
            <tr>
              <th class="has-big-font-size font-secondary">Service</th>
              <th class="has-big-font-size font-secondary">Sustainer Rate</th>
              <th class="has-big-font-size font-secondary">Base Rate</th>
              <th class="has-big-font-size font-secondary">Discounted Rate</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($rows) {
              foreach ($rows as $row) { ?>
                <tr>
                  <td class="has-gray-lighter-background-color">
                    <?php if ($row["includes_link"]) { ?>
                      <a class="unstyled-link" href="#<?php echo tufas_slugify(
                        $row["service"],
                      ); ?>">
                        <?php echo $row["service"]; ?>
                      </a>
                    <?php } else {echo $row["service"];} ?>
                  </td>
                  <td><?php echo $row["sustainer_rate"]; ?></td>
                  <td><?php echo $row["base_rate"]; ?></td>
                  <td><?php echo $row["discounted_rate"]; ?></td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </table-inner>
    </table-outer>
  </div>
</section>
