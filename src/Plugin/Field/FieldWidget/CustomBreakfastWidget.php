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

    //Hardcoded select options.
    $options = array(
      'idly' => 'Idly',
      'dosa' => 'Dosa',
      'uppuma' => 'Uppuma',
    );
    $element['value'] = $element + array(
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => $value,
      '#multiple' => FALSE,
    );

    return $element;
  }
}
