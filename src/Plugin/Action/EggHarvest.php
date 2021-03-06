<?php

namespace Drupal\farm_egg\Plugin\Action;

use Drupal\farm_quick\Plugin\Action\QuickFormActionBase;

/**
 * Action for recording egg harvests.
 *
 * @Action(
 *   id = "egg_harvest",
 *   label = @Translation("Record egg harvest"),
 *   type = "asset",
 *   confirm_form_route_name = "farm.quick.egg"
 * )
 */
class EggHarvest extends QuickFormActionBase {

  /**
   * {@inheritdoc}
   */
  public function getQuckFormId(): string {
    return 'egg';
  }

}