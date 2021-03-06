<?php

namespace Drupal\custom_breakfast\Plugin\Field\FieldType;

use \Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'custom_breakfast_choice' field type.
 *
 * @FieldType(
 *   id = "custom_breakfast_choice",
 *   label = @Translation("Custom Breakfast Choice"),
 *   module = "custom_breakfast",
 *   description = @Translation("Select what you want for custom breakfast."),
 *   default_widget = "custom_breakfast_default",
 *   default_formatter = "custom_breakfast_formatter"
 * )
 */
class CustomBreakfast extends FieldItemBase{

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }


  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Breakfast Choice'));

    return $properties;
  }
}
