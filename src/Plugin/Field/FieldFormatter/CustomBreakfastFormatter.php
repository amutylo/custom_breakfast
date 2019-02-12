<?php

namespace Drupal\custom_breakfast\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use \Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the breakfast formatter.
 *
 * @FieldFormatter(
 *   id = "custom_breakfast_formatter",
 *   module = "custom_breakfast",
 *   label = @Translation("Simple custom breakfast formatter"),
 *   field_types = {
 *     "custom_breakfast_choice"
 *   }
 * )
 */
class CustomBreakfastFormatter extends FormatterBase{

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return parent::defaultSettings();
  }

  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = array();

    foreach ($items as $delta => $item) {
      $item_value = $item->value;
      $breakfast_item = \Drupal::service('plugin.manager.custom_breakfast')->createInstance($item_value);
      $markup = '<h1>'. $breakfast_item->getName() . '</h1>';
      $markup .= '<img src="'. $breakfast_item->getImage() .'"/>';
      $markup .= '<h2>Goes well with:</h2>'. implode(", ", $breakfast_item->servedWith());
      $elements[$delta] = array(
        '#markup' => '<h1>'. $breakfast_item['label'] . '</h1>',
      );
    }

    return $elements;
  }


}
