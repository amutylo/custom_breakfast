<?php

/**
 * @file
 * Contains \Drupal\breakfast\Plugin\Breakfast\Idly.
 */

namespace Drupal\custom_breakfast\Plugin\BreakfastTypes;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Component\Annotation\Plugin;
use Drupal\custom_breakfast\BreakfastBase;


/**
 * Idly! can't imagine a south Indian breakfast without it.
 *
 *
 * @Plugin(
 *   id = "idly",

 *   label = @Translation("Idly"),
 *   image = "https://upload.wikimedia.org/wikipedia/commons/1/11/Idli_Sambar.JPG",
 *   ingredients = {
 *     "Rice Batter",
 *     "Black lentils"
 *   }
 * )
 */
class Idly extends BreakfastBase {
  public function servedWith() {
    return array("Sambar", "Coconut Chutney", "Onion Chutney", "Idli podi");
  }
}
