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

  namespace ClicShopping\Apps\Report\StatsProductsNoPurchased\Module\ClicShoppingAdmin\Config\SN\Params;

  class sort_order extends \ClicShopping\Apps\Report\StatsProductsNoPurchased\Module\ClicShoppingAdmin\Config\ConfigParamAbstract
  {

    public $default = '300';
    public $app_configured = false;

    protected function init()
    {
      $this->title = $this->app->getDef('cfg_stats_products_no_purchased_sort_order_title');
      $this->description = $this->app->getDef('cfg_stats_products_no_purchased_sort_order_description');
    }
  }
