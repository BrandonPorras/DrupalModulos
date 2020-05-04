<?php

namespace Drupal\country_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;


 /**
 * Plugin implementation of the 'country_field" widget.'
 *
 * @FieldWidget(
 *   id = "country_field_widget_type",
 *   label = @Translation("Country Field - Widget"),
 *   description = @Translation("Country Field - Widget"),
 *   field_types = {
 *     "country_field_type",
 *   }
 * )
 */

class CountryFieldWidget extends WidgetBase{
      /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
   
    $element+= [
        "#type" => 'select',
        "#default_value"=> isset($items[$delta]->value) ? $items[$delta]->value:'',
        "#title" => $this->t('Select country'),
        "#options" => \Drupal::service('country_manager')->getList(),
        "#element_validate"=>[
            [static :: class, 'validate']
        ]
    ];

    return ['value' => $element];
  }

    /**
     * validar
     * 
     * @param $element
     * @param FormStateInterface $form_state
     * @return void
     */
    public static function validate($element, FormStateInterface $form_state)
    {
        
    }
 }