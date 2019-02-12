<?php

namespace Drupal\custom_breakfast\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use \Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Field widget "custom_breakfast".
 *
 * @FieldWidget(
 *   id = "custom_breakfast_default",
 *   label = @Translation("Custom breakfast default"),
 *   field_types = {
  *     "custom_breakfast_choice",
 *   }
 * )
 */
class CustomBreakfastWidget extends WidgetBase{

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $options = array();
    $breakfast_items = \Drupal::service('plugin.manager.breakfast')->getDefinitions();
    foreach($breakfast_items as $plugin_id => $breakfast_item) {
      $options[$plugin_id] = $breakfast_item['label'];
    }

    $element = array(
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => $value,
      '#multiple' => FALSE,
    );

    return array('value' => $element);
  }
}
