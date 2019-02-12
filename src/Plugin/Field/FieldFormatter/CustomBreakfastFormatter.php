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
      $breakfast_item = \Drupal::service('plugin.manager.custom_breakfast')->getDefinition($item->value);
      $elements[$delta] = array(
        '#markup' => '<h1>'. $breakfast_item['label'] . '</h1>',
      );
    }

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    //Hardcoded select options.
    $options = array(
      'idly' => 'Idly',
      'dosa' => 'Dosa',
      'uppuma' => 'Uppuma',
    );

    $default_value = $this->getSetting('custom_breakfast');

    $output['breakfast'] = array(
      '#title' => t('Custom breakfast types'),
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => $default_value,
    );

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {

    $summary = array();

    // Determine ingredients summary.
    $breakfast_summary = FALSE;
    $breakfast_settings = $this->getSetting('breakfast');


    // Display ingredients summary.
    if ($breakfast_settings) {
      $summary[] = t('Custom breakfast is: @format', array(
        '@format' => t($breakfast_summary),
      ));
    }

    return $summary;

  }
}
