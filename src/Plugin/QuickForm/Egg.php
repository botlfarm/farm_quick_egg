<?php

namespace Drupal\farm_egg\Plugin\QuickForm;

use Drupal\Core\Form\FormStateInterface;
use Drupal\farm_quick\Plugin\QuickForm\QuickFormBase;
use Drupal\farm_quick\Traits\QuickLogTrait;

/**
 * Egg harvest quick form.
 *
 * @QuickForm(
 *   id = "egg",
 *   label = @Translation("Egg harvest"),
 *   description = @Translation("Record when eggs are harvested."),
 *   helpText = @Translation("Use this form to record when eggs are havested."),
 *   permissions = {
 *     "create harvest log",
 *   }
 * )
 */
class Egg extends QuickFormBase {

  use QuickLogTrait;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, string $id = NULL) {

    // Egg quantity.
    $form['quantity'] = [
      '#type' => 'number',
      '#title' => $this->t('Quantity'),
      '#min' => 0,
      '#step' => 1,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Draft an egg harvest log from the user-submitted data.
    $quantity = $form_state->getValue('quantity');
    $log = [
      'name' => $this->t('Collected @count egg(s)', ['@count' => $quantity]),
      'type' => 'harvest',
      'quantity' => [
        [
          'measure' => 'count',
          'value' => $quantity,
          'unit' => $this->t('egg(s)'),
        ],
      ],
    ];

    // Create the log.
    $this->createLog($log);
  }

}
