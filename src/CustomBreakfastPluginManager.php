<?php

namespace Drupal\custom_breakfast;


use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
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
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler, $plugin_interface = NULL, $plugin_definition_annotation_name = 'Drupal\Component\Annotation\Plugin', $additional_annotation_namespaces = []) {
    $subdir = 'Plugin/BreakfastTypes';

    parent::__construct($subdir, $namespaces, $module_handler, $plugin_definition_annotation_name);

    // Let the other modules to add something.
    $this->alterInfo('custom_breakfast_info');

    $this->setCacheBackend($cache_backend, 'custom_breakfast_choice');
  }
}
