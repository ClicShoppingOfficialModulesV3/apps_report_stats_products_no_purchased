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

  $CLICSHOPPING_Template = Registry::get('TemplateAdmin');
  $CLICSHOPPING_Language = Registry::get('Language');

  $CLICSHOPPING_StatsProductsNoPurchased = Registry::get('StatsProductsNoPurchased');
  $CLICSHOPPING_Page = Registry::get('Site')->getPage();

  $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;
?>

<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span
            class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . 'categories/stats_products_purchased.gif', $CLICSHOPPING_StatsProductsNoPurchased->getDef('heading_title'), '40', '40'); ?></span>
          <span
            class="col-md-3 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_StatsProductsNoPurchased->getDef('heading_title'); ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>

  <table border="0" width="100%" cellspacing="0" cellpadding="2">
    <td>
      <table class="table table-sm table-hover table-striped">
        <thead>
        <tr class="dataTableHeadingRow">
          <th width="20"></th>
          <th width="50"></th>
          <th><?php echo $CLICSHOPPING_StatsProductsNoPurchased->getDef('table_heading_number'); ?></th>
          <th><?php echo $CLICSHOPPING_StatsProductsNoPurchased->getDef('table_heading_products'); ?></th>
          <th
            class="text-center"><?php echo $CLICSHOPPING_StatsProductsNoPurchased->getDef('table_heading_no_purchased'); ?>
            &nbsp;
          </th>
        </tr>
        </thead>
        <tbody>
        <?php
          $rows = 0;

          $Qproducts = $CLICSHOPPING_StatsProductsNoPurchased->db->prepare('select SQL_CALC_FOUND_ROWS  p.products_id,
                                                                                                p.products_ordered,
                                                                                                p.products_image,
                                                                                                pd.products_name
                                                                  from :table_products p,
                                                                       :table_products_description pd
                                                                  where pd.products_id = p.products_id
                                                                  and pd.language_id = :language_id
                                                                  and p.products_archive = 0
                                                                  and p.products_ordered = 0
                                                                  group by pd.products_id
                                                                  order by p.products_ordered DESC,
                                                                           pd.products_name
                                                                  limit :page_set_offset,
                                                                       :page_set_max_results
                                                                 ');

          $Qproducts->bindInt(':language_id', $CLICSHOPPING_Language->getId());
          $Qproducts->setPageSet((int)MAX_DISPLAY_SEARCH_RESULTS_ADMIN);
          $Qproducts->execute();

          $listingTotalRow = $Qproducts->getPageSetTotalRows();

          if ($listingTotalRow > 0) {
            $row = 0;

            while ($Qproducts->fetch()) {
              $rows++;

              if (strlen($rows) < 2) {
                $rows = '0' . $rows;
              }
              ?>
              <tr>
                <th scope="row"
                    width="50px"><?php echo HTML::link(CLICSHOPPING::link(null, 'A&Catalog\Products&Preview&pID=' . $Qproducts->valueInt('products_id')), HTML::image($CLICSHOPPING_Template->getImageDirectory() . 'icons/preview.gif', $CLICSHOPPING_StatsProductsNoPurchased->getDef('text_preview'))); ?></th>
                <td><?php echo HTML::image($CLICSHOPPING_Template->getDirectoryShopTemplateImages() . $Qproducts->value('products_image'), $Qproducts->value('products_name'), (int)SMALL_IMAGE_WIDTH_ADMIN, (int)SMALL_IMAGE_HEIGHT_ADMIN); ?></td>
                <td><?php echo $rows; ?>.</td>
                <td><?php echo HTML::link(CLICSHOPPING::link(null, 'A&Catalog\Products&Preview&pID=' . $Qproducts->valueInt('products_id')), $Qproducts->value('products_name')); ?></td>
                <td class="text-center"><?php echo $Qproducts->valueInt('products_ordered'); ?>&nbsp;</td>
              </tr>
              <?php
            }
          } // end $listingTotalRow
        ?>
        </tbody>
      </table>
    </td>
    </tr>
  </table>
  <?php
    if ($listingTotalRow > 0) {
      ?>
      <div class="row">
        <div class="col-md-12">
          <div
            class="col-md-6 float-start pagenumber hidden-xs TextDisplayNumberOfLink"><?php echo $Qproducts->getPageSetLabel($CLICSHOPPING_StatsProductsNoPurchased->getDef('text_display_number_of_link')); ?></div>
          <div
            class="float-end text-end"> <?php echo $Qproducts->getPageSetLinks(CLICSHOPPING::getAllGET(array('page', 'info', 'x', 'y'))); ?></div>
        </div>
      </div>
      <?php
    } // end $listingTotalRow
  ?>

</div>


