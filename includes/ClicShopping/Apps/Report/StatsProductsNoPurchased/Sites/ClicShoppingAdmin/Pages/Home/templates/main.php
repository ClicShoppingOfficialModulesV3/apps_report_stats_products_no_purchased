<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\CLICSHOPPING;
  use ClicShopping\OM\Registry;

  $CLICSHOPPING_StatsProductsNoPurchased = Registry::get('StatsProductsNoPurchased');
  $CLICSHOPPING_MessageStack = Registry::get('MessageStack');

  if ($CLICSHOPPING_MessageStack->exists('StatsProductsNoPurchased')) {
    echo $CLICSHOPPING_MessageStack->get('StatsProductsNoPurchased');
  }
?>
<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span
            class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . 'categories/stats_products_purchased.gif', $CLICSHOPPING_StatsProductsNoPurchased->getDef('heading_title'), '40', '40'); ?></span>
          <span
            class="col-md-4 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_StatsProductsNoPurchased->getDef('heading_title'); ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>
  <div class="col-md-12 mainTitle">
    <strong><?php echo $CLICSHOPPING_StatsProductsNoPurchased->getDef('text_stats_products_no_purchased'); ?></strong>
  </div>
  <div class="adminformTitle">
    <div class="row">
      <div class="separator"></div>

      <div class="col-md-12">
        <div class="form-group">
          <div class="col-md-12">
            <?php echo $CLICSHOPPING_StatsProductsNoPurchased->getDef('text_intro'); ?>
          </div>
        </div>
        <div class="separator"></div>

        <div class="col-md-12 text-center">
          <div class="form-group">
            <div class="col-md-12">
              <?php
                echo HTML::form('configure', CLICSHOPPING::link(null, 'A&Report\StatsProductsNoPurchased&Configure'));
                echo HTML::button($CLICSHOPPING_StatsProductsNoPurchased->getDef('button_configure'), null, null, 'primary');
                echo '</form>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
