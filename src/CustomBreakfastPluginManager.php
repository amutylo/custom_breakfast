<?php

namespace Drupal\custom_breakfast;


use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Language\LanguageManager;
use Drupal\Core\Plugin\DefaultPluginManager;

class CustomBreakfastPluginManager extends DefaultPluginManager{

  /**
   * CustomBreakfastPluginManager constructor.
   *
   * @param $subdir
   * @param \Traversable $namespaces
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   * @param null $plugin_interface
   * @param string $plugin_definition_annotation_name
   * @param array $additional_annotation_namespaces
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, LanguageManager $language_manager, ModuleHandlerInterface $module_handler) {
    $subdir = 'Plugin/BreakfastTypes';

    // The name of the annotation class that contains the plugin definition.
    $plugin_definition_annotation_name = 'Drupal\custom_breakfast\Annotation\Breakfast';

    parent::__construct($subdir, $namespaces, $module_handler, $plugin_definition_annotation_name);

    // Let the other modules to add something.
    $this->alterInfo('custom_breakfast_info');

    $this->setCacheBackend($cache_backend, 'custom_breakfast_choice');
  }
}
