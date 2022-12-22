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

  namespace ClicShopping\Apps\Report\StatsProductsNoPurchased\Sites\ClicShoppingAdmin\Pages\Home\Actions;

  use ClicShopping\OM\Registry;

  class StatsProductsNoPurchased extends \ClicShopping\OM\PagesActionsAbstract
  {
    public function execute()
    {
      $CLICSHOPPING_StatsProductsNoPurchased = Registry::get('StatsProductsNoPurchased');

      $this->page->setFile('stats_products_no_purchased.php');

      $CLICSHOPPING_StatsProductsNoPurchased->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }